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
        // return view('comments.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => ['required', 'string', 'max:600'],
            'comment_image.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $commentContent = $request->input('comment_content');
        $comment_images = []; // Renombrado de $comment_image a $comment_images

        if ($request->hasFile('comment_image')) {
            foreach ($request->file('comment_image') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // $image->storeAs('public/comment_image', $imageName);
                $image->storeAs('comment_image', $imageName);
                // Storage::disk('comments')->put($imageName, file_get_contents($image));
                $comment_images[] = $imageName;
            }
        }

        // Crear el comentario en la base de datos con el contenido y las imágenes almacenadas
        $comment = Comment::create([
            'user_comment_id' => Auth::user()->id_user,
            'public_comment_id' => $request->publication_id,
            'comment_content' => $commentContent,
            'comment_image' => json_encode($comment_images), // Almacenar las imágenes como un JSON
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

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
