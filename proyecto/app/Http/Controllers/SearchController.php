<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $titulo = $request->get('titulo');
        
        $posts = Post::orderBy('id','DESC')
            ->titulo($titulo)
            ->paginate(4);

        
        return view ('posts.buscador', compact('posts','request'));
    }
}
