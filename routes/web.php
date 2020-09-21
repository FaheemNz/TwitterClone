<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['name' => 'tweets', 'middleware' => 'auth'], function () {
    Route::get('tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store')->name('tweets');
    Route::get('profile/{user:username}', 'ProfileController@show')->name('profile');
    
    Route::post('/tweets/{tweet}/like', 'TweetLikeController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikeController@destroy');
    
    Route::group(['name' => 'profile.edit', 'middleware' => 'can:edit,user'], function(){
        Route::get('profile/{user:username}/edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('profile/{user:username}/edit', 'ProfileController@update')->name('profile.update');
    });
    
    Route::get('explore', 'ExploreController@index');
    
    Route::post('/profile/{user:username}/follow', 'FollowController@store')->name('follow');
});
