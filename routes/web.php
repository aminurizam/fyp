<?php


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');
});

Route::get('/product','ProductController@catalog');
Route::get('/product/{product}', 'ProductController@productDetail');

Auth::routes();

Route::group(['middleware' => ['auth','checkRole:seller']], function() { //checkRole middleware name registered in Kernel.php
    Route::get('test', 'BuyerController@index');
    Route::get('add/create','ProductController@create');
    Route::post('add','ProductController@store');
});

Route::group(['middleware' => ['auth','checkRole:buyer']], function() { //checkRole middleware name registered in Kernel.php
    Route::resource('cart','CartController');
    Route::resource('comment','CommentController');
    Route::resource('profile', 'BuyerController');
});

Route::get('/home', 'HomeController@index');



