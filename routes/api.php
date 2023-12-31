<?php

// auth
Route::group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/phone', 'AuthController@phone');
    Route::post('/code', 'AuthController@code');
});


Route::group(['prefix' => 'module', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ModuleController@get');
});

Route::group(['prefix' => 'day', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'DayController@get');
});


