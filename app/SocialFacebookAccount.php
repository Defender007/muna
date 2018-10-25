<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{
    protected $fillable = ['user_id','provider_user_id','provider'];

    public function user(){

        return $this->belongsTo(User::class);
        //defines relationship between this model and the user model
    }
}
