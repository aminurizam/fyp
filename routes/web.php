<?php


// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', 'HomeController@index');

//Route::group(['middleware' => ['auth']], function() {
//    Route::get('/home', 'HomeController@index');
//});

Route::get('/','ProductController@catalog');
Route::get('/product/{product}', 'ProductController@productDetail');

Auth::routes();

//Route::group(['middleware' => ['auth','checkRole:admin']], function() {
//    Route::get('dashboard','AdminController@dashboard');
//});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/cart/{id}', 'ProductController@addToCart');
    Route::get('/shopping-cart','ProductController@viewCart');
    Route::delete('/cart/{id}','ProductController@removeProduct');
    Route::resource('profile', 'BuyerController');
    Route::get('/profile/{profile}/terms', 'BuyerController@terms');
    Route::get('/profile/{profile}', 'BuyerController@beSeller');
    Route::post('add/exchange-cart', 'ProductController@storeExchange');

    Route::get('checkout', [
       'uses' => 'ProductController@getCheckout',
        'as' => 'checkout'
    ]);

    Route::post('checkout', [
       'uses' => 'ProductController@postCheckout',
        'as' => 'checkout'
    ]);

    Route::get('order-history','ProductController@orderHistory');
    Route::get('receipt','ProductController@checkoutReceipt');
    Route::get('exchange-cart/receipt/{id}','ProductController@confirmExchange');
    Route::get('exchange-cart/receipt/print/{id}','ProductController@printExchange');

    Route::group(['middleware' => ['checkRole:seller']], function() { //checkRole middleware name registered in Kernel.php
//        Route::get('add/create','ProductController@create');
//        Route::post('add','ProductController@store');
        Route::get('add/create','ProductController@productType');
        Route::post('add','ProductController@store');
        Route::get('product-status','ProductController@viewProductStatus');
        Route::get('product-status/edit/{product}','ProductController@editProduct');
        Route::patch('product-status/{prod}', 'ProductController@updateProduct');
        Route::delete('product-status/delete/{product}', 'ProductController@deleteProduct');
//        Route::get('product/exchange-cart/{id}','ProductController@confirmExchange');
        Route::get('exchange-cart/list','ProductController@viewExchange');
        Route::get('exchange-cart/list/{id}','ProductController@viewExchangeDetail');
        Route::delete('exchange-cart/list/{id}','ProductController@deleteExchange');

    });

    Route::group(['middleware' => ['checkRole:buyer']], function() { //checkRole middleware name registered in Kernel.php
//        Route::resource('comment','CommentController');

    });

    Route::group(['middleware' => ['checkRole:admin']], function() { //checkRole middleware name registered in Kernel.php
        Route::get('dashboard','AdminController@dashboard');
        Route::get('list-users','AdminController@userList');
        Route::get('list-products','AdminController@productList');
        Route::get('confirm-product','AdminController@confirmProduct');
        Route::get('confirm-product/detail/{product}', 'AdminController@confirmProductDetail');
        Route::get('confirm-product/detail/{product}/accept', 'AdminController@acceptProduct');
        Route::get('confirm-product/detail/{product}/reject', 'AdminController@rejectProduct');
    });
});

Route::get('/home', 'HomeController@index');

// Route::get('/terms', function () {
//     return view('buyer.beSellerConfirm');
// });



