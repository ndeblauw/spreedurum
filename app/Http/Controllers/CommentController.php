<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Step 1: validate the incoming request data
        $request->validate([
            'article_id' => ['required', 'numeric'],
            'content' => ['required', 'string'],
        ]);

        // Step 2: store the comment
        Comment::create([
            'article_id' => $request->article_id,
            'author' => 'random name',
            'content' => $request->content,
        ]);

        session()->flash('specialMessage', 'Your comment has been posted!');

        return redirect()->route('articles.show', $request->article_id);
    }


}
