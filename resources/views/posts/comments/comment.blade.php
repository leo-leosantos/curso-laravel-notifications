@if (auth()->check())

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('comment.store') }}" method="post" class="form">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <input type="text" name="title" placeholder="Título" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="body" cols="30" rows="5" class="form-control" placeholder="Comentario"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Enviar</button>
        </div>
    </form>
@else
    <p>Precisa estar logado para fazer os comentários

        <a href="{{ route('login') }}">Fazer Login!</a>
    </p>
@endif

<hr>

<h3>Comentários ({{ $post->comments->count() }})</h3>

@forelse ($post->comments as $comment )
<p>
    <b> Comentado por:</b> {{ $comment->user->name }}
    titulo do Comentário: {{ $comment->title }} 
    Comentário:  {{ $comment->body }}

</p>
<hr>    
@empty
    <p>Esse post ainda não tem comentário</p>
@endforelse