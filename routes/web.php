<?php


Route::get('/', function () {
    return view('layout');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');
    Route::get('/post', 'PostsController@index');
});

Route::get('/product','ProductController@catalog');
Route::get('/product/{product}', 'ProductController@productDetail');

