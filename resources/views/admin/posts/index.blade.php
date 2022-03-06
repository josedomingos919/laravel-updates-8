@extends('admin.layouts.app')

@section('title', 'Listagem dos Posts')

@section('content')
    <a href="{{ route('posts.create') }}">Criar Novo Post</a>

    <hr>

    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
        <hr>
    @endif


    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" id="" placeholder="Filtrar" >
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <h1>Posts</h1>

    @foreach ($posts as $post)
        {{--NOTA: para passar mais de 1 parametro: route('posts.show', [ 'id'=> 34, 'test'=> 78 ] ) --}}
        <p>
            {{ $post->title }} 
            [
                <a href="{{ route('posts.show', $post->id) }}">Ver</a> | 
                <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
            ]
        </p>
    @endforeach

    <hr>

    @if(isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif

@endsection