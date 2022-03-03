<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        //dd($posts); NOTA: para imprimir logs

        /*
        CASO 1

        return view('admin.posts.index', [
            'posts' => $posts
        ]);

        */

        return view('admin.posts.index',  compact('posts'));
        // compact: NOTA: para passar as variaveis do laravel no blade
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        //dd($request->all()); NOTA: imprime todos os dados do request 

        /*
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        */

        $post = Post::create($request->all());
        //$post Nota: Contem um objeto post criado 

        return redirect()->route('posts.index');
    }
}
