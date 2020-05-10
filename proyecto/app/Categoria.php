<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Categoria extends Model
{
    protected $fillable = ['nombre','logo'];

    //Relacion 1:N entre Posts y Categorias
    //Ya que dentro de cada categoria, puede haber 1 o varios posts
    public function posts(){
        return $this->hasMany(Post::class);
    }


    public function totalPosts(){
        $sum = 0;
        foreach ($this->posts as $item) {
            $sum++;
        }
        return $sum;
    }


    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('nombre', 'LIKE', "%$nombre%");
        }
    }
}
