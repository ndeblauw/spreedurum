<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'] );
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show']);

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);

require __DIR__.'/auth.php';
