<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController
};

Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//NOTA: usar  ->name('posts.create') para nomear as rotas (A comunidade usa isso)

Route::get('/', function () {
    return view('welcome');
});
