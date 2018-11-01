<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['body','user_id'];

    //define relationship with comments
    public function comments(){

        return $this->hasMany(Comment::class);
    }

    //define relationship with users
    public function user(){

        return $this->belongsTo(User::class);
    }
}
