@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf {{-- @csrf já coloca um input hiden com o token - --}}
<input type="file" name="image" id="image">
<input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title ?? old('title') }}">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúndo">{{ $post->title ?? old('content') }}</textarea>
<button type="submit">Enviar</button>