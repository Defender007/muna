<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request){
        Auth::user()->name = $request->input('name');
        Auth::user()->bio = $request->input('bio');
        Auth::user()->phone_number = $request->input('phone_number');
        Auth::user()->gender = $request->input('gender');
        Auth::user()->location = $request->input('location');

        if($request->hasFile('profile_picture')){

            $path = $request->profile_picture->storeAs('profilepics','profilepic'. Auth::user()->id .'.jpg');

            Auth()->user()->picture = $path;
        }
        Auth()->user()->save();

        return redirect('home');
    }
}
