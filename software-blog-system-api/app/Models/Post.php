<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['userID', 'categoryID', 'title', 'content', 'status'];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class , 'post_tags');
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function likes(){

        return $this->hasMany(Like::class);
    }

    public function media(){

        return $this->hasMany(PostMedia::class);
    }
}
