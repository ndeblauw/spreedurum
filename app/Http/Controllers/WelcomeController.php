<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch latest 2 articles
        $articles = \App\Models\Article::latest()->take(2)->get();

        return view('welcome', compact('articles'));
    }
}
