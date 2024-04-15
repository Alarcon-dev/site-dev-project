<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comments = Comment::orderBy('created_at')->get();

        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function getImageComment($image_Comment){
        $comment_images= Storage::disk('comments')->get($image_Comment);
        return Response($comment_images, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => ['required', 'string', 'max:600'],
            'comment_image.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $commentContent = $request->input('comment_content');
        $comment_images = [];

        if ($request->hasFile('comment_image')) {
            foreach ($request->file('comment_image') as $image) {
                if ($image->isValid()){
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    Storage::disk('comments')->put($imageName, file_get_contents($image));
                    $comment_images[] = $imageName;
                }

                // $image->storeAs('comments', $imageName);
            }
        }

        $comment = Comment::create([
            'user_comment_id' => Auth::user()->id_user,
            'public_comment_id' => $request->publication_id,
            'comment_content' => $commentContent,
            'comment_image' => json_encode($comment_images),
        ]); 

        if ($comment) {
            return redirect()->route('home')->with('success', 'El comentario ha sido creado');
        } else {
            return redirect()->route('home')->with('wrong', 'El comentario no se ha creado');
        }
    }


    public function show(string $id)
    {
        $comment = Comment::find($id);
        return view('comments.show', compact('comment'));
    }

    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'comment_content' => ['required', 'string', 'max:600'],
            'comment_image.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $comment = Comment::findOrFail($id);

        $comment->comment_content = $request->input('comment_content');

        if ($request->hasFile('comment_image')) {
            $comment_images = [];
            foreach ($request->file('comment_image') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('comment_image', $imageName);
                $comment_images[] = $imageName;
            }
            $comment->comment_image = json_encode($comment_images);
        }
        $comment->save();

        return redirect()->route('home', $id)->with('success', 'El comentario ha sido actualizado');
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('home')->with('success', 'El comentario ha sido eliminado');
    }
}
