<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function(){
    Route::get(
        'search/{user_id}',
        'App\Http\Controllers\UserAuthController@Search'
    );
    Route::group(['prefix' => 'auth'], function(){
        Route::get(
            'signup',
            'App\Http\Controllers\UserAuthController@SignUpPage'
        );
        Route::post(
            'signup',
            'App\Http\Controllers\UserAuthController@SignUpProcess');
        });
});