<?php

Route::get('/admin/login','Admin\LoginController@login');
Route::get('/admin/logout','Admin\LoginController@logout');
Route::post('/admin/login/auth','Admin\LoginController@auth');

Route::group([
    'middleware' => 'Logged', //jika ada middleware
    'prefix' => 'admin'
    ], function () {
    Route::get('/','Admin\DashboardController@index');
    Route::get('dashboard','Admin\DashboardController@index');

    Route::get('customers','Admin\CustomerController@index');
    Route::get('customers/create','Admin\CustomerController@create');
    Route::post('customers/store','Admin\CustomerController@store');
    Route::get('customers/edit/{id}','Admin\CustomerController@edit');
    Route::post('customers/update/{id}','Admin\CustomerController@update');
    Route::get('customers/delete/{id}','Admin\CustomerController@destroy');

    Route::get('products','Admin\ProductController@index');
    Route::get('products/{id}.json','Admin\ProductController@getJson');
    Route::get('products/create','Admin\ProductController@create');
    Route::post('products/store','Admin\ProductController@store');
    Route::get('products/edit/{id}','Admin\ProductController@edit');
    Route::post('products/update/{id}','Admin\ProductController@update');
    Route::get('products/delete/{id}','Admin\ProductController@destroy');

    Route::get('product-categories','Admin\ProductCategoryController@index');
    Route::get('product-categories/create','Admin\ProductCategoryController@create');
    Route::post('product-categories/store','Admin\ProductCategoryController@store');
    Route::get('product-categories/edit/{id}','Admin\ProductCategoryController@edit');
    Route::post('product-categories/update/{id}','Admin\ProductCategoryController@update');
    Route::get('product-categories/delete/{id}','Admin\ProductCategoryController@destroy');

    Route::get('banners','Admin\BannerController@index');
    Route::get('banners/create','Admin\BannerController@create');
    Route::post('banners/store','Admin\BannerController@store');
    Route::get('banners/edit/{id}','Admin\BannerController@edit');
    Route::post('banners/update/{id}','Admin\BannerController@update');
    Route::get('banners/delete/{id}','Admin\BannerController@destroy');

    Route::get('contacts','Admin\ContactController@index');
    Route::get('contacts/create','Admin\ContactController@create');
    Route::post('contacts/store','Admin\ContactController@store');
    Route::get('contacts/edit/{id}','Admin\ContactController@edit');
    Route::post('contacts/update/{id}','Admin\ContactController@update');
    Route::get('contacts/delete/{id}','Admin\ContactController@destroy');

    Route::get('newsletters','Admin\NewsletterController@index');
    Route::get('newsletters/create','Admin\NewsletterController@create');
    Route::post('newsletters/store','Admin\NewsletterController@store');
    Route::get('newsletters/edit/{id}','Admin\NewsletterController@edit');
    Route::post('newsletters/update/{id}','Admin\NewsletterController@update');
    Route::get('newsletters/delete/{id}','Admin\NewsletterController@destroy');

    Route::get('medias','Admin\MediaController@index');
    Route::get('medias/create','Admin\MediaController@create');
    Route::post('medias/store','Admin\MediaController@store');
    Route::get('medias/edit/{id}','Admin\MediaController@edit');
    Route::post('medias/update/{id}','Admin\MediaController@update');
    Route::get('medias/delete/{id}','Admin\MediaController@destroy');

    Route::get('pages','Admin\PageController@index');
    Route::get('pages/create','Admin\PageController@create');
    Route::post('pages/store','Admin\PageController@store');
    Route::get('pages/edit/{id}','Admin\PageController@edit');
    Route::post('pages/update/{id}','Admin\PageController@update');
    Route::get('pages/delete/{id}','Admin\PageController@destroy');

    Route::get('scripts','Admin\ScriptController@index');
    Route::get('scripts/create','Admin\ScriptController@create');
    Route::post('scripts/store','Admin\ScriptController@store');
    Route::get('scripts/edit/{id}','Admin\ScriptController@edit');
    Route::post('scripts/update/{id}','Admin\ScriptController@update');
    Route::get('scripts/delete/{id}','Admin\ScriptController@destroy');

    Route::get('widgets','Admin\WidgetController@index');
    Route::get('widgets/create','Admin\WidgetController@create');
    Route::post('widgets/store','Admin\WidgetController@store');
    Route::get('widgets/edit/{id}','Admin\WidgetController@edit');
    Route::post('widgets/update/{id}','Admin\WidgetController@update');
    Route::get('widgets/delete/{id}','Admin\WidgetController@destroy');

    Route::get('users','Admin\UserController@index');
    Route::get('users/create','Admin\UserController@create');
    Route::post('users/store','Admin\UserController@store');
    Route::get('users/edit/{id}','Admin\UserController@edit');
    Route::post('users/update/{id}','Admin\UserController@update');
    Route::get('users/delete/{id}','Admin\UserController@destroy');

    Route::get('store/settings','Admin\StoreSettingController@index');
    Route::get('store/settings/payment-cod','Admin\StoreSettingController@paymentCod');
    Route::get('store/settings/payment-direct-bank-transfer','Admin\StoreSettingController@paymentDirectBankTransfer');
    Route::post('store/settings/payment-direct-bank-transfer','Admin\StoreSettingController@storePaymentDirectBankTransfer');
    Route::post('store/settings/store','Admin\StoreSettingController@store');

    Route::get('settings','Admin\SettingController@index');
    Route::post('settings/store','Admin\SettingController@store');

    Route::get('orders','Admin\OrderController@index');
    Route::get('orders/create','Admin\OrderController@create');
    Route::get('orders/edit/{id}','Admin\OrderController@edit');
    Route::post('orders/store','Admin\OrderController@store');
    Route::post('orders/update/{id}','Admin\OrderController@update');
    Route::get('orders/delete/{id}','Admin\OrderController@destroy');

    Route::get('payment-confirmations','Admin\PaymentConfirmationController@index');
    Route::get('payment-confirmations/create','Admin\PaymentConfirmationController@create');
    Route::get('payment-confirmations/edit/{id}','Admin\PaymentConfirmationController@edit');
    Route::post('payment-confirmations/store','Admin\PaymentConfirmationController@store');
    Route::post('payment-confirmations/update/{id}','Admin\PaymentConfirmationController@update');
    Route::get('payment-confirmations/delete/{id}','Admin\PaymentConfirmationController@destroy');
});