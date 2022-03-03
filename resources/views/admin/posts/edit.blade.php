<h1>Editar Post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post">
    {{-- <input type="text" name="_token" value="{{ csrf_token() }}" /> --}}

    @csrf {{-- @csrf já coloca um input hiden com o token - --}}
    @method('PUT')

    {{-- old é uma função que nos ajuda pegar os dados anteriores do formulário deposi do submit --}}
    <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') ? old('title') : $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúndo">{{ old('content') ? old('content') : $post->content }}</textarea>
    <button type="submit">Enviar</button>
</form>
