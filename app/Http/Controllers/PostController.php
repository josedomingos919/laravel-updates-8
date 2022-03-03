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

    public function show($id)
    {
        //$post = Post::where('id', $id)->first();
        if (!$post = Post::find($id))
            return redirect()->route('posts.index');


        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $message = '';

        if ($post = Post::find($id)) {
            $post->delete();
            $message = 'Post elimindado com sucesso!';
        } else
            $message = 'Post Não eliminado!';

        return
            redirect()
            ->route('posts.index')
            ->with('message', $message);

        /*
        NOTA: ->with('message', $message) cria uma sessão flax que pode ser chamado 
        assim no blade: session('message)
        */
    }
}
