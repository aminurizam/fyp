<?php


 Route::get('/', function () {
     return view('welcome');
 });

//Route::get('/home', 'HomeController@index');

//Route::group(['middleware' => ['auth']], function() {
//    Route::get('/home', 'HomeController@index');
//});

Route::get('/product','ProductController@catalog');
Route::get('/product/{product}', 'ProductController@productDetail');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/cart/{id}', 'ProductController@addToCart');
    Route::get('/shopping-cart','ProductController@viewCart');
    Route::delete('/cart/{id}','ProductController@removeProduct');

    Route::group(['middleware' => ['checkRole:seller']], function() { //checkRole middleware name registered in Kernel.php
    //    Route::get('test', 'BuyerController@index');
        Route::get('add/create','ProductController@create');
        Route::post('add','ProductController@store');
    });

    Route::group(['middleware' => ['checkRole:buyer']], function() { //checkRole middleware name registered in Kernel.php
        Route::resource('comment','CommentController');
        Route::resource('profile', 'BuyerController');
    });
});

Route::get('/home', 'HomeController@index');



