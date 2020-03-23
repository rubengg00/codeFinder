<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

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

    //Relacion N:M entre Posts y Users --> A la hora de guardar como favoritos
    //Ya que un post puede ser guardado por muchas personas y una persona puede guardar, a su vez, muchos posts como favoritos.
    public function posts1(){
        return $this->belongsToMany('App\Post')->withPivot('user_id','post_id')->withTimestamps();
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
