<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $titulo = $request->get('titulo');
        
        $posts = Post::orderBy('id','DESC')
            ->titulo($titulo)
            ->paginate(4);

        $postMostViewed = Post::orderBy('visitas', 'desc')->first();
        
        return view ('posts.buscador', compact('posts','request', 'postMostViewed'));
    }


    // Métodos para categorias

    public function listCategorias(Request $request)
    {
        $nombre = $request->get('nombre');

        $categorias = Categoria::orderBy('nombre')
        ->nombre($nombre)
        ->paginate(6);

        $postMostViewed = Post::orderBy('visitas', 'desc')->first();

        return view('categorias.listado', compact('categorias', 'request', 'postMostViewed'));
    }


    public function postCategorias(Categoria $categoria, Request $request)
    {
        $titulo = $request->get('titulo');
        
        $posts = $categoria->posts()->where('titulo','like', "%$titulo%")->paginate(3);

        $postMostViewed = Post::orderBy('visitas', 'desc')->first();
        
        return view ('categorias.posts', compact('categoria', 'posts', 'request', 'postMostViewed'));

    }

}
