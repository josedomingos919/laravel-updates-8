<h1>Detalhes do post << {{ $post->title }} >> </h1>

<ul>
    <li><b>Titulo:</b> {{ $post->title }}</li>
    <li><b>Conteudo:</b> {{ $post->content }}</li>
</ul>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" >
    <button type="submit">Eliminar</button>
</form>