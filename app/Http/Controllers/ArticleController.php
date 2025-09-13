<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // fetch articles from DB
        $articles = \App\Models\Article::all();

        //dd($articles); // to quickly analyse what you loaded

        // send articles to the view
        // return response
        return view('articles.index', compact('articles'));

    }

    public function show($id)
    {
        // fetch the one article that is requested
        $article = \App\Models\Article::find($id);

        // send article to its view
        // return response
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => 1, // quick fix for now
        ]);

        return redirect()->route('articles.show', $article->id);
    }
    //
}
