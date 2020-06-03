<div class="p-4 border-left my-3">
    <p>
        <img src="{{ asset($comment->user->fotoPerfil) }}" alt="Foto de {{ $comment->user->username }}" width="30px" height="30px" class="rounded-circle">
        <b class="ml-2"><a href="{{ route('users.show', $comment->user) }}" class="text-dark">{{ $comment->user->username }}</a>:</b>
        <span class="float-right">
            @if (Auth::check() && $comment->user_id == Auth::id())
                <a href="javascript:submitForm();" id="enviar" value="Borrar" class="text-danger font-weight-bold "  onclick="return confirm('¿Borrar comentario?')">
                    Borrar
                </a>
            @endif
        </span>
    </p>
    <form name="borrar" method='post' action='{{route('comments.destroy', $comment->id)}}' id="formBorrar">
        @csrf
        @method('DELETE')
    </form>
    <p>{{ $comment->contenido }}</p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#reply-{{$comment->id}}" aria-expanded="false" aria-controls="reply-{{$comment->id}}">
        Responder
    </button>
    <div class="collapse my-3" id="reply-{{$comment->id}}">
        <div class="card card-body">
            @include('comments.form', ['comment' => $comment])
        </div>
    </div>
    @if ($comment->replies)
    @include('comments.list', ['comments' => $comment->replies])
    @endif
</div>

<script>
    function submitForm()
    {
        document.getElementById('formBorrar').submit();
    }
</script>
