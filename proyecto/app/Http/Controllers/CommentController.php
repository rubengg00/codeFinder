<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use RealRashid\SweetAlert\Facades\Alert;


class CommentController extends Controller
{

    public function create(Request $request,Post $post)
    {
        $comment = new Comment();
        $comment->contenido = $request->contenido;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = \auth()->id();
 
        $post->comments()->save($comment);

        Alert::success('Comentario creado', 'Tu comentario ha sido publicado');
        return redirect()->route('posts.show', ['post'=>$post]);        
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        Alert::info('Comentario borrado', 'Tu comentario ha sido borrado');
        return \Redirect::back();        
    }

    
}
