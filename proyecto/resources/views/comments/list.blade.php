@foreach($comments as $comment)
	@include('comments.comentario', ['comment' => $comment])
@endforeach