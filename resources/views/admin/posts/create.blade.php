<h1>Cadastrar Novo Post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.store') }}" method="post">
    {{-- <input type="text" name="_token" value="{{ csrf_token() }}" /> --}}

    @csrf {{-- @csrf já coloca um input hiden com o token - --}}

    {{-- old é uma função que nos ajuda pegar os dados anteriores do formulário deposi do submit --}}
    <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúndo">{{ old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>
