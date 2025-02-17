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
            'App\Http\Controllers\UserAuthController@SignUpProcess'
        );
        Route::get(
            'signin',
            'App\Http\Controllers\UserAuthController@SigninPage'
        );
        Route::post(
            'signin',
            'App\Http\Controllers\UserAuthController@SigninProcess'
        );
        Route::get(
            'signout',
            'App\Http\Controllers\UserAuthController@SigninOut'
        );
    });
});
Route::group(['prefix' => 'merchandise'], function(){
    Route::get(
        'create',
        'App\Http\Controllers\MerchandiseController@MerchandiseCreateProcess'
    );
    Route::get(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditPage'
    );
    Route::post(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess'
    );
});