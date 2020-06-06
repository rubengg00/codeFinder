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

        if (strlen($request->contenido) == 0) {
            Alert::error('Error al comentar', 'No puedes crear un comentario vacío');
            return \Redirect::back();
        }else{
            $comment->contenido = $request->contenido;
            $comment->parent_id = $request->parent_id;
            $comment->user_id = \auth()->id();
     
            $post->comments()->save($comment);
    
            Alert::success('Comentario creado', 'Tu comentario ha sido publicado');
            return \Redirect::back();        
        }
            
    }


    
}
