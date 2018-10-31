<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['body'];

    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
