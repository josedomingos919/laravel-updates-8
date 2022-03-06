@extends('admin.layouts.app') 

@section('content')  

    <h1>Cadastrar Novo Post</h1>
    
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" >
        @include('admin.posts._partirals.form', []) 
    </form>

@endsection

