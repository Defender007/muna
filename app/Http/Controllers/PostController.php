<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function store(){

        $this->validate(request(),[
            'body' => 'required'
        ]);

        Post::create([

            'body' => request('body')
        ]);

        return redirect('home');
    }
}
