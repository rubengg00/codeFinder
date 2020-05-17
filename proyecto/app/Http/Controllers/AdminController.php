<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
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


    /**
     * 
     * Métodos para los usuarios
     * 
     */


    public function usersList()
    {
        $users = User::orderBy('name')->paginate(6);

        return view ('admin.users.list', compact('users'));
    }

    public function usersDestroy(User $user)
    {
        $user->delete();
        Alert::info('Borrado', 'Usuario borrado correctamente');
        return \Redirect::back();
    }


    
    /**
     * 
     * Métodos para los posts
     * 
     */


    public function postsList()
    {
        $posts = Post::orderBy('created_at','desc')->paginate (6);

        return view ('admin.posts.list', compact('posts'));
    }

    public function postsDestroy(Post $post)
    {
        $post->delete();
        Alert::info('Borrado', 'Post borrado correctamente');
        return \Redirect::back();
    }
    

    /**
     * 
     * Métodos para los comentarios
     * 
     */


    public function commentsList()
    {
        $comments = Comment::orderBy('created_at','desc')->paginate(6);

        return view ('admin.comments.list', compact('comments'));
    }

    public function commentsDestroy(Comment $comment)
    {
        $comment->delete();
        Alert::info('Borrado', 'Comentario borrado correctamente');
        return \Redirect::back();
    }


    /**
     * 
     * Métodos para las categorias
     * 
     */


    public function categoriesList()
    {
        $categorias = Categoria::orderBy('nombre')->paginate(6);

        return view('admin.categories.list', compact('categorias'));
    }


    public function categoriesStore(CategoriaRequest $request)
    {
        $datos = $request->validated();
        $categoria = new Categoria();
        $categoria->nombre = \ucwords($datos['nombre']);

        if (isset($datos['logo']) && $datos['logo']!=null) {

            $file = $datos['logo'];
            $nombre = 'lenguajes/'.time().'_'.$file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));
            $categoria->logo="img/$nombre";
        }

        $categoria->save();
        Alert::success('Creación', 'Categoría creada correctamente');
        return \Redirect::back();
    }




    public function categoriesEdit(Categoria $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    
    public function categoriesUpdate(CategoriaRequest $request, Categoria $category)
    {
        $datos = $request->validated();
        $category->nombre = ucwords($datos['nombre']);
        if (isset($datos['logo'])) {
            $file = $datos['logo'];
            $nombre = 'lenguajes/'.time().'_'.$file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));

            $imagenOld = $category->logo;
            if (basename($imagenOld)!="default.jpg") {
                unlink($imagenOld);
            }

            $category->logo="img/$nombre";
        }
        $category->update();
        Alert::success('Actualizada', 'Categoría actualizada correctamente');
        return redirect()->route('admin.categories');
    }

    public function categoriesDestroy(Categoria $category)
    {
        $foto = $category->logo;
        if (basename($foto)!="default.jpg") {
            unlink($foto);
        }
        
        $category->delete();
        Alert::info('Borrado', 'Categoría borrada correctamente');
        return \Redirect::back();
    }

}
