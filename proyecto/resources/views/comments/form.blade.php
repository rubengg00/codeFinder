<form action="{{route('comments.create', $post)}}" method="POST">
    {{ csrf_field() }}

    @if (isset($comment->id))
    <input type="hidden" name="parent_id" value="{{$comment->id}}">
    @endif

    <input type="hidden" name="user_id" value="{{\auth()->id()}}">

    <div class="form-group">
        <label for="contenido">Escribre tu comentario:</label>
        <textarea class="form-control" name="contenido" id="contenido"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publicar</button>
</form>
