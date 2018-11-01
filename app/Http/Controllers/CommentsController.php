<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    
    public function store(Post $post_id, Request $request){

        $user = Auth::user();
        
        $this->validate(request(),[
            'body' => 'required'
        ]);

        Comment::create([

            'body' => $request->input('body'),
            'post_id' => $post_id->id,
            'user_id' => $user->id
        ]);

        return redirect('home');
    }
}
