<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

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


    //Métodos para los posts
    public function postsList(){
        $posts = Post::orderBy('created_at','desc')->paginate (6);

        return view ('admin.posts.list', compact('posts'));
    }


    //Métodos para los comentarios
    public function commentsList(){
        $comments = Comment::orderBy('created_at','desc')->paginate(6);

        return view ('admin.comments.list', compact('comments'));
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
