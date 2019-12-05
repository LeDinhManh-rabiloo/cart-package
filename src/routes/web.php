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

Route::Resource('/orders', 'OrderController');
Route::post('/orders/updatecart', 'OrderController@updatecart')->name('orders.updatecart');
Route::Resource('/cart', 'CartController');
