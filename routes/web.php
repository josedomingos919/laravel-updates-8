<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController
};

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//NOTA: usar  ->name('posts.create') para nomear as rotas (A comunidade usa isso)

Route::get('/', function () {
    return view('welcome');
});
