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

Route::get('/','Front\HomeController@index');
