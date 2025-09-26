<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('articles/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [\App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{id}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'] )->name('articles.index');
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');


Route::post('comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);

require __DIR__.'/auth.php';
