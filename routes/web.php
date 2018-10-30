<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@store');

//define route for social(facebook) authentication and callback
Route::get('/redirect', 'Auth\FacebookController@redirectToFacebook')->name('redirect');//for login
Route::get('/callback', 'Auth\FacebookController@handleFacebookCallback');//for callback
