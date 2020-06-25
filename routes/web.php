<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/login/auth','Admin\LoginController@auth');

Route::get('/admin/dashboard','Admin\DashboardController@index');

Route::get('/admin/customers','Admin\CustomerController@index');
Route::get('/admin/customers/create','Admin\CustomerController@create');
Route::post('/admin/customers/store','Admin\CustomerController@store');
Route::get('/admin/customers/edit/{id}','Admin\CustomerController@edit');
Route::post('/admin/customers/update/{id}','Admin\CustomerController@update');
Route::get('/admin/customers/delete/{id}','Admin\CustomerController@destroy');

Route::get('/admin/products','Admin\ProductController@index');
Route::get('/admin/products/{id}.json','Admin\ProductController@getJson');
Route::get('/admin/products/create','Admin\ProductController@create');
Route::post('/admin/products/store','Admin\ProductController@store');
Route::get('/admin/products/edit/{id}','Admin\ProductController@edit');
Route::post('/admin/products/update/{id}','Admin\ProductController@update');
Route::get('/admin/products/delete/{id}','Admin\ProductController@destroy');

Route::get('/admin/product-categories','Admin\ProductCategoryController@index');
Route::get('/admin/product-categories/create','Admin\ProductCategoryController@create');
Route::post('/admin/product-categories/store','Admin\ProductCategoryController@store');
Route::get('/admin/product-categories/edit/{id}','Admin\ProductCategoryController@edit');
Route::post('/admin/product-categories/update/{id}','Admin\ProductCategoryController@update');
Route::get('/admin/product-categories/delete/{id}','Admin\ProductCategoryController@destroy');

Route::get('/admin/banners','Admin\BannerController@index');
Route::get('/admin/banners/create','Admin\BannerController@create');
Route::post('/admin/banners/store','Admin\BannerController@store');
Route::get('/admin/banners/edit/{id}','Admin\BannerController@edit');
Route::post('/admin/banners/update/{id}','Admin\BannerController@update');
Route::get('/admin/banners/delete/{id}','Admin\BannerController@destroy');

Route::get('/admin/medias','Admin\MediaController@index');
Route::get('/admin/medias/create','Admin\MediaController@create');
Route::post('/admin/medias/store','Admin\MediaController@store');
Route::get('/admin/medias/edit/{id}','Admin\MediaController@edit');
Route::post('/admin/medias/update/{id}','Admin\MediaController@update');
Route::get('/admin/medias/delete/{id}','Admin\MediaController@destroy');

Route::get('/admin/pages','Admin\PageController@index');
Route::get('/admin/pages/create','Admin\PageController@create');
Route::post('/admin/pages/store','Admin\PageController@store');
Route::get('/admin/pages/edit/{id}','Admin\PageController@edit');
Route::post('/admin/pages/update/{id}','Admin\PageController@update');
Route::get('/admin/pages/delete/{id}','Admin\PageController@destroy');

Route::get('/admin/scripts','Admin\ScriptController@index');
Route::get('/admin/scripts/create','Admin\ScriptController@create');
Route::post('/admin/scripts/store','Admin\ScriptController@store');
Route::get('/admin/scripts/edit/{id}','Admin\ScriptController@edit');
Route::post('/admin/scripts/update/{id}','Admin\ScriptController@update');
Route::get('/admin/scripts/delete/{id}','Admin\ScriptController@destroy');

Route::get('/admin/widgets','Admin\WidgetController@index');
Route::get('/admin/widgets/create','Admin\WidgetController@create');
Route::post('/admin/widgets/store','Admin\WidgetController@store');
Route::get('/admin/widgets/edit/{id}','Admin\WidgetController@edit');
Route::post('/admin/widgets/update/{id}','Admin\WidgetController@update');
Route::get('/admin/widgets/delete/{id}','Admin\WidgetController@destroy');

Route::get('/admin/users','Admin\UserController@index');
Route::get('/admin/users/create','Admin\UserController@create');
Route::post('/admin/users/store','Admin\UserController@store');
Route::get('/admin/users/edit/{id}','Admin\UserController@edit');
Route::post('/admin/users/update/{id}','Admin\UserController@update');
Route::get('/admin/users/delete/{id}','Admin\UserController@destroy');

Route::get('/admin/store/settings','Admin\StoreSettingController@index');
Route::get('/admin/store/settings/payment-cod','Admin\StoreSettingController@paymentCod');
Route::get('/admin/store/settings/payment-direct-bank-transfer','Admin\StoreSettingController@paymentDirectBankTransfer');
Route::post('/admin/store/settings/payment-direct-bank-transfer','Admin\StoreSettingController@storePaymentDirectBankTransfer');
Route::post('/admin/store/settings/store','Admin\StoreSettingController@store');

Route::get('/admin/settings','Admin\SettingController@index');
Route::post('/admin/settings/store','Admin\SettingController@store');

Route::get('/admin/orders','Admin\OrderController@index');
Route::get('/admin/orders/create','Admin\OrderController@create');
Route::get('/admin/orders/edit/{id}','Admin\OrderController@edit');
Route::post('/admin/orders/store','Admin\OrderController@store');
Route::post('/admin/orders/update/{id}','Admin\OrderController@update');
Route::get('/admin/orders/delete/{id}','Admin\OrderController@destroy');

Route::get('/','Front\HomeController@index');
