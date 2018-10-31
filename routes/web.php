<?php

//defined route using closure for website public home page
Route::get('/', function () {
    return view('welcome');
});

//authentication routes
Auth::routes();

//route to logged in user homepage
Route::get('/home', 'HomeController@index')->name('home');

//defined routes for profile completion and updates
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@store');

//define route for social(facebook) authentication and callback
Route::get('/redirect', 'Auth\FacebookController@redirectToFacebook')->name('redirect');//for login
Route::get('/callback', 'Auth\FacebookController@handleFacebookCallback');//for callback

//routes for handling posts
Route::post('/post','PostController@store');

//routes for handling comments to posts
Route::post('/comment/{post_id}','CommentsController@store');
