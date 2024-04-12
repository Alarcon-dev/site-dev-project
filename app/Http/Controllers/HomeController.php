<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publications = Publication::orderBy('id_publication', 'desc')->get();
        $comments = [];
        foreach ($publications as $publication) {
            $comments[$publication->id_publication] = Comment::where('public_comment_id', $publication->id_publication)->get();
        }
        return view('home', ['publications' => $publications], compact('publications', 'comments'));
    }
}
