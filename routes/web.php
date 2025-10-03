<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;


/*
 * Publicly accessible routes
 */
Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);

Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'] )->name('articles.index');
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');


/*
 * Routes that require authentication
 */
Route::middleware('auth')->group(function () {
    Route::get('management/articles', [\App\Http\Controllers\ArticleManagementController::class, 'index'])->name('articles.index');
    Route::get('management/articles/create', [\App\Http\Controllers\ArticleManagementController::class, 'create'])->name('articles.create');
    Route::post('management/articles', [\App\Http\Controllers\ArticleManagementController::class, 'store'])->name('articles.store');
    Route::get('management/articles/{id}/edit', [\App\Http\Controllers\ArticleManagementController::class, 'edit'])->name('articles.edit');
    Route::put('management/articles/{id}', [\App\Http\Controllers\ArticleManagementController::class, 'update'])->name('articles.update');
    Route::delete('management/articles/{id}', [\App\Http\Controllers\ArticleManagementController::class, 'destroy'])->name('articles.destroy');
});

Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'] )->name('articles.index');
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');


Route::post('comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');


require __DIR__.'/auth.php';
