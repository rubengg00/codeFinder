<div class="p-4 border-left my-3">
    <p>
        <img src="{{ asset($comment->user->fotoPerfil) }}" alt="Foto de {{ $comment->user->username }}" width="30px" height="30px" class="rounded-circle">
        <b>{{ $comment->user->username }}:</b>
    </p>
    {{-- <p class="font-weight-bold float-left mr-1">{{ $comment->user->username }}: </p> --}}
    <div class="float-right">
        @if (Auth::check() && $comment->user_id == Auth::id())
        <form name="borrar" method='post' action='{{route('comments.destroy', $comment->id)}}'>
            @csrf
            @method('DELETE')
            <button type='submit' class="btn btn-danger btn-fab btn-fab-mini btn-round d-none d-sm-none d-md-block float-right" onclick="return confirm('¿Borrar post?')">
                <i class="material-icons">delete</i>
            </button>
            <div class="float-right">
                <button type='submit' class="btn btn-danger btn-fab btn-fab-mini btn-round d-block d-sm-block d-md-none float-right" onclick="return confirm('¿Borrar post?')">
                    <i class="material-icons">delete</i>
                </button>
            </div>
        </form>
        @endif
    </div>
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
