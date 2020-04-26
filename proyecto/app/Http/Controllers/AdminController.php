<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Categoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Devolvemos tanto los usuarios, como los posts y los comentarios
        $users = User::orderBy('name')->paginate(6);
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        $posts->setPageName('posts');
        
        $comments = Comment::orderBy('created_at','desc')->paginate(6);
        
        
        return view ('admin.index',compact('users', 'posts', 'comments'));
    }

    // Métodos para los usuarios

    public function usersList(){
        $users = User::orderBy('name')->paginate(6);

        return view ('admin.users.list', compact('users'));
    }

    public function usersDestroy(User $user){
        $user->delete();
        Alert::info('Borrado', 'Usuario borrado correctamente');
        return \Redirect::back();
    }


    //Métodos para los posts
    public function postsList(){
        $posts = Post::orderBy('created_at','desc')->paginate (6);

        return view ('admin.posts.list', compact('posts'));
    }

    public function postsDestroy(Post $post){
        $post->delete();
        Alert::info('Borrado', 'Post borrado correctamente');
        return \Redirect::back();
    }
    

    //Métodos para los comentarios
    public function commentsList(){
        $comments = Comment::orderBy('created_at','desc')->paginate(6);

        return view ('admin.comments.list', compact('comments'));
    }

    public function commentsDestroy(Comment $comment)
    {
        $comment->delete();
        Alert::info('Borrado', 'Comentario borrado correctamente');
        return \Redirect::back();
    }


    //Métodos para las categorias
    public function categoriesList()
    {
        $categorias = Categoria::orderBy('nombre')->paginate(6);

        return view('admin.categories.list', compact('categorias'));
    }

















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
