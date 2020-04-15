<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comment extends Model
{
    protected $fillable = ['contenido', 'post_id', 'user_id'];

    //Ya que se produce una Relación 1:N en las tablas Posts y Users respecto a los comentarios:

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentsPerPost(){
        $sum = 0;
        foreach ($this->post as $item) {
            $sum++;
        }
        return $sum;
    }

}
