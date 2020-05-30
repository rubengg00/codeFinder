<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Notifications\Notifiable;



class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->paginate(3);
        return view('users.perfil', compact('user','posts'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {        
        $datos = $request->validated();
        
        $user->name = ucwords($datos['name']);
        $user->username = $datos['username'];
        $user->email = $datos['email'];

        if (isset($datos['fotoPerfil'])) {
            $file = $datos['fotoPerfil'];
            $nombre = 'fotoUsuarios/'.time().'_'.$file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));

            $imagenOld = $user->fotoPerfil;
            if (basename($imagenOld)!="default.jpg") {
                unlink($imagenOld);
            }

            $user->fotoPerfil="img/$nombre";
        }

        $user->update();

        Alert::success('Perfil Modificado', 'Tu perfil ha sido modificado correctamente');
        return redirect()->route('users.show',$user);
    }


    public function contraseña(PasswordRequest $request, User $user)
    {
        $datos = $request->validated();
        $user->password = \Hash::make($datos['password']);
        $user->update();
        Alert::success('Contraseña cambiada', 'Tu contraseña ha sido cambiada correctamente');
        return redirect()->route('users.show',$user);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
    }



    // Métodos relacionads con las publicaciones favoritas

    public function favPost(Post $post)
    {
        $user = auth()->user();
        $user->addFavorite($post);
        Alert::success('Favorito Guardado', 'Has guardado el post como favorito');
        return \Redirect::back();
    }

    public function listFav()
    {
        $user = auth()->user();
        $posts = $user->favorite(Post::class);

        return view ('posts.fav', compact('user', 'posts'));
    }

    public function deleteFav(Post $post)
    {
        $user = auth()->user();
        $user->removeFavorite($post); // The user added to favorites this post
        Alert::info('Favorito borrado', 'Has borrado el post como favorito');
        return redirect()->route('posts.show',$post);
    }



}
