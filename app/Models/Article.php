<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function canEditOrDelete(User $user): bool
    {
        // Admin users can always edit and delete all articles
        if($user->isAdmin()) {
            return true;
        }

        // Only the author can delete or edit his/her article
        if($this->author_id !== $user->id) {
            return false;
        }

        return true;
    }
}
