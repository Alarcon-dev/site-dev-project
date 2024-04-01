<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
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
        $articles = Article::orderBy('id_article')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'article_title' => ['required', 'string', 'max:300'],
            'article_content' => ['required', 'string'],
            'categorie_id' => ['required'],
        ]);
        // @dd($request);


        $article = Article::create([
            'user_article_id' => Auth::user()->id_user,
            'categorie_article_id' => $request->categorie_id,
            'article_title' => $request->article_title,
            'article_content' => $request->article_content,
        ]);

        if ($article) {
            return redirect()->route('article.show', ['article' => $article->id_article])->with('success', 'El artículo ha sido creado');
        } else {
            return redirect()->route('article.create')->with('wrong', 'El artículo no se ha creado');
            echo ("error");
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $article = Article::find($id);
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'article_title' => ['required', 'string', 'max:300'],
            'article_content' => ['required', 'string'],
        ]);

        $article = Article::where('id_article', $id)->update([
            'article_title' => $request->article_title,
            'article_content' => $request->article_content,
        ]);

        if ($article) {
            return redirect()->route('article.index')->with('success', 'Artículo actualizado');
        } else {
            return redirect()->route('article.create')->with('wrong', 'Artículo no actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // dd($article);
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Artículo eliminado');
    }
}
