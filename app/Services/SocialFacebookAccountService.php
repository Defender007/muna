<?php

namespace App\Services;

use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService{

    public function createOrGetUser(ProviderUser $providerUser){//will hold return object from facebook

        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())//use instance of the facebook object to get userid
            ->first();

        if($account){
            return $account->user;//if account exists then return it
        }else{
            //create a new account in social_facebook_accounts table
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            
            //check if user is already present in users table using email address
            $user = User::whereEmail($providerUser->getEmail())->first();

            if(!$user){//if user is not yet existing, create a new user in users table

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000))//encrpyt password
                ]);
            }

            $account->user()->associate($user);//associate account with user
            $account->save();

            return $user;
        }
    }
}