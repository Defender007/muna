<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{

    protected $fillable = ['body','post_id'];
    
    public function posts(){

        return $this->belongsTo(Post::class);
    }
}
