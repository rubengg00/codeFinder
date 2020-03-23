<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categoria;

class Post extends Model
{
    protected $fillable = [
        'titulo','descripcion','contenido','visitas','user_id'
    ];

    //Relación 1:N entre Posts y Users --> A la hora de publicar un post
    //Ya que el post será creado por un único usuario
    protected function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion N:M entre Posts y Users --> A la hora de guardar como favoritos
    //Ya que un post puede ser guardado por muchas personas y una persona puede guardar, a su vez, muchos posts como favoritos.
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('user_id','post_id')->withTimestamps();
    }

    //Relacion 1:N entre Posts y Categorias
    //Ya que un post solo podrá pertenecer a una categoria; en este caso la categoria, hace referencia al tipo de lenguaje del código
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    
}
