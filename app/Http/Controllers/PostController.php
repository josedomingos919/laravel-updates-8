<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function  search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
            ->orWhere('content', 'LIKE', "%{$request->search}%")
            ->latest()
            ->paginate(1);

        return view('admin.posts.index', compact('posts', 'filters'));
    }

    public function index()
    {
        //$posts = Post::orderBy('id', 'DESC')->paginate();
        $posts = Post::latest()->paginate(1);

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
        $data = $request->all();

        if ($request->image->isValid()) {

            $fileName = Str::slug($request->title, '-') . '.' . $request->image->getClientOriginalExtension();

            $path = $request->image->storeAs('image/post', $fileName);

            //$request->image->move(public_path('image/post'), $fileName);
            // $path = 'image/post/' . $fileName;

            $data['image'] = $path;
        }

        //dd($request->all()); NOTA: imprime todos os dados do request 

        /*
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        */

        $post = Post::create($data);
        //$post Nota: Contem um objeto post criado 

        return
            redirect()
            ->route('posts.index')
            ->with('message', 'Ciado com sucesso!');;
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

            if (Storage::exists($post->image))
                Storage::delete($post->image);

            $post->delete();

            $message = 'Post elimindado com sucesso!';
        } else
            $message = 'Post N??o eliminado!';

        return
            redirect()
            ->route('posts.index')
            ->with('message', $message);

        /*
        NOTA: ->with('message', $message) cria uma sess??o flax que pode ser chamado 
        assim no blade: session('message)
        */
    }

    public function edit($id)
    {
        if (!$post = Post::find($id))
            return redirect()->back();

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {

        $data = $request->all();

        if (!$post = Post::find($id))
            return redirect()->back();


        if ($request->image && $request->image->isValid()) {

            if (Storage::exists($post->image))
                Storage::delete($post->image);

            $fileName = Str::slug($request->title, '-') . '.' . $request->image->getClientOriginalExtension();

            $path = $request->image->storeAs('image/post', $fileName);

            $data['image'] = $path;
        }

        $post->update($data);

        return
            redirect()
            ->route('posts.index')
            ->with('message', 'Editado com sucesso!');
    }
}
