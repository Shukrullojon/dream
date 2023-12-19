<?php

// auth
Route::group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/phone', 'AuthController@phone');
    Route::post('/code', 'AuthController@code');
});

// Category
Route::group(['prefix' => 'category', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/get', 'CategoryController@get');
    Route::post('/sub', 'CategoryController@sub');
});


