<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    public function store(){

        $user = Auth::user();
        
        $this->validate(request(),[
            'body' => 'required'
        ]);

        Post::create([

            'body' => request('body'),
            'user_id' => $user->id
        ]);

        return redirect('home');
    }
}
