<?php

//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');
    Route::get('/post', 'PostsController@index');
});

Route::get('/', 'PostsController@index');
