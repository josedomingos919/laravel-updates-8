<a href="{{ route('posts.create') }}">Criar Novo Post</a>

<hr>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
    <hr>
@endif

<h1>Posts</h1>

@foreach ($posts as $post)
    {{--NOTA: para passar mais de 1 parametro: route('posts.show', [ 'id'=> 34, 'test'=> 78 ] ) --}}
    <p>
        {{ $post->title }} 
        [ <a href="{{ route('posts.show', $post->id) }}">Ver</a> ]
    </p>
@endforeach
