<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController
};

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// essa rota create tem que ficar por sima, porque tem uma do mesmo tipo que recebe parametro, se não o get cai la na segunda

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//NOTA: usar  ->name('posts.create') para nomear as rotas (A comunidade usa isso)
// [PostController::class, 'create']

Route::get('/', function () {
    return view('welcome');
});
