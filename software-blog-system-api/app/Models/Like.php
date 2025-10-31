<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['userID', 'postID'];

    public function user(){

        return $this->belongsTo(User::class);
    }

     public function posts(){

        return $this->belongsTo(Post::class);
    }
}
