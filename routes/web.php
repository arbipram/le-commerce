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

Route::get('/','Front\HomeController@index');
