<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    
    public function store(Post $post_id, Request $request){

        $this->validate(request(),[
            'body' => 'required'
        ]);

        Comment::create([

            'body' => $request->input('body'),
            'post_id' => $post_id->post_id
        ]);

        return redirect('home');
    }
}
