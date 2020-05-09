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

    public function listCategorias(Request $request)
    {
        $nombre = $request->get('nombre');

        $categorias = Categoria::orderBy('nombre')
        ->nombre($nombre)
        ->paginate(6);

        return view('categorias.listado', compact('categorias', 'request'));
    }


    public function postCategorias(Categoria $category, Request $request)
    {
        $titulo = $request->get('titulo');
        
        $posts = $category->posts()
        ->titulo($titulo)
        ->paginate(3);

        return view ('categorias.posts', compact('category', 'posts', 'request'));
    }



}
