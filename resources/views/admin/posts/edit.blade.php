@extends('admin.layouts.app')

@section('content')

    <h1>Editar Post</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="post"> 
        @method('PUT')
        @include('admin.posts._partirals.form', []) 
    </form>

@endsection
