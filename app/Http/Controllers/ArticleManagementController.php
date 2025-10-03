<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleManagementController extends Controller
{
    public function index()
    {
        // fetch articles from DB that I am allowed to edit
        $articles = \App\Models\Article::where('author_id', auth()->user()->id)->get();

        //dd($articles); // to quickly analyse what you loaded

        // send articles to the view
        // return response
        return view('management.articles.index', compact('articles'));

    }

    public function show($id)
    {
        // fetch the one article that is requested
        $article = \App\Models\Article::find($id);

        // send article to its view
        // return response
        return view('management.articles.show', compact('article'));
    }

    public function create()
    {
        return view('management.articles.create');
    }

    public function store(Request $request)
    {
        // Step 1: validate the incoming request data
        $request->validate([
            'title' => ['required', 'string', 'max:25', 'min:10'],
            'content' => ['required', 'string'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->user()->id,
        ]);

        return redirect()->route('articles.show', $article->id);
    }

    public function edit($id)
    {
        // Get the article
        $article = \App\Models\Article::find($id);

        // Check access rights
        if (! $article->canEditOrDelete( auth()->user() )) {
            return redirect()->route('articles.show', ['id' => $article->id]);
        }

        return view('management.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        // Step 1: load the correct article from MODEL
        $article = \App\Models\Article::find($id);

        // Check access rights
        if (! $article->canEditOrDelete( auth()->user() )) {
            abort(403);
        }

        // Step 2: validate the incoming request data
        $request->validate([
            'title' => ['required', 'string', 'max:25', 'min:10'],
            'content' => ['required', 'string'],
        ]);

        // Step 3: Update the changes
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        session()->flash('specialMessage', 'Your update of the article was successful');

        // Redirect to show
        return redirect()->route('articles.show', $article->id);
    }

    public function destroy($id)
    {
        // fetch the one article that is requested
        $article = \App\Models\Article::find($id);

        // Check access rights
        if (! $article->canEditOrDelete( auth()->user() )) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index');
    }

}
