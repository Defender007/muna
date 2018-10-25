<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use App\Http\Controllers\Controller;


class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()//redirects user to facebook authentication
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback(SocialFacebookAccountService $service)//inject dependency
    {
        //use created $service variable to call createorgetuser function
        //socialite driver returns an object from facebook
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);//log the user in

        return redirect()->to('home');
    }
}