<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit_profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'user_name' => ['string', 'max:255', 'alpha'],
            'last_name' => ['string', 'max:255', 'alpha'],
            'nick_name' => ['string', 'max:255', Rule::unique('users', 'nick_name')->ignore($id, 'id_user')],
            'email' => ['string', 'email', 'max:255',  Rule::unique('users', 'email')->ignore($id, 'id_user')],
            'user_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);


        $user = User::where('id_user', $id)->update([
            'user_name'  => $request->user_name,
            'last_name' =>  $request->last_name,
            'nick_name' => $request->nick_name,
            'email' => $request->email,
        ]);

        $user_image = Auth::user()->user_image;
        if ($request->hasFile('user_image') && $request->file('user_image')->isValid()) {
            // Eliminar imagen anterior
            if ($user_image) {
                Storage::disk('user_profile')->delete($user_image);
            }

            // Guardar nueva imagen
            $image = $request->file('user_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::disk('user_profile')->put($imageName, file_get_contents($image));

            $user_image_path = User::where('id_user', $id)->update([
                'user_image' => $imageName,
            ]);
        }

        if ($user || $user_image_path) {
            return redirect()->back()->with('success', 'datos actulizados');
        } else {
            return redirect()->back()->with('wrong', 'error de actualización');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::where('user_comment_id', $id)->delete();
        $publication = Publication::where('user_public_id', $id)->delete();
        $user = User::where('id_user', $id)->delete();

        if ($user && $publication && $comment) {
            return back()->with('success', 'userio eliminado');
        } else {
            return back()->with('wrong', 'userio eliminado');
        }
    }

    public function getAllusers()
    {
        $users = User::all();

        return view('administrador.gestion_usuarios.users_list', compact('users'));
    }

    public function getOneProfile(string $id)
    {
        $user = User::find($id);
        return view('users.show_profile', compact('user'));
    }

    public function getProfileImage($image_name)
    {
        $file = Storage::disk('user_profile')->get($image_name);
        return Response($file, 200);
    }

    
}
