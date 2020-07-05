<?php

Route::get('/','Front\HomeController@index');
Route::get('/login','Front\LoginController@index');
Route::get('/tracking','Front\TrackingController@index');
Route::get('/contact','Front\ContactController@index');
Route::post('/contact/store','Front\ContactController@store');
Route::post('/contact/newsletter','Front\ContactController@newsletter');
Route::get('/products','Front\ProductController@index');
Route::get('/products/{slug}','Front\ProductController@detail');
Route::get('/products/category/{slug}','Front\ProductController@category');
Route::get('/carts','Front\CartController@index');
Route::get('/cart/add','Front\CartController@store');
Route::get('/cart/update','Front\CartController@update');
Route::get('/cart/delete/{id}','Front\CartController@delete');
Route::get('/checkout','Front\CheckoutController@index');
Route::post('/checkout/store','Front\CheckoutController@store');
Route::get('/confirmation','Front\ConfirmationController@index');
Route::get('/page/{slug}','Front\PageController@index');
Route::get('/payment-confirmation','Front\PaymentConfirmationController@index');
Route::post('/payment-confirmation/store','Front\PaymentConfirmationController@store');
