<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username','fotoPerfil', 'password',
    ];

    //Relación 1:N entre Posts y Users --> A la hora de publicar un post
    //Ya que un usuario podrá crear varios posts
    public function posts(){
        return $this->hasMany(Post::class);
    }

    //Relación 1:N entre Users y Comments
    //Un usuario podrá crear uno o varios comentarios.
    public function comments(){
        return $this->hasMany(Comment::class);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
