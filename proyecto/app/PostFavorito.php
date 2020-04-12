<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFavorito extends Model
{
    protected $fillable = ['user_id','post_id'];
}
