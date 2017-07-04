<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'posts'], function() {

    /*Route::get('/', 'PostController@index');
    Route::delete('/{id}', 'PostController@destroy');
    Route::post('/', 'PostController@store');*/

    Route::resource('/', 'PostController');
    Route::delete('/{id}', 'PostController@destroy');
});