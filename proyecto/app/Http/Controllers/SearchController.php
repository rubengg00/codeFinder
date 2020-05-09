<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;

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


    // Métodos para categorias

    public function listCategorias()
    {
        $categorias = Categoria::orderBy('nombre')->paginate(6);

        return view('categorias.listado', compact('categorias'));
    }



}
