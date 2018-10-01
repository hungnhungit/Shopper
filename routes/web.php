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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tester',function(){
	return "hungit";
});

Route::resource('product','Admin\ProductController');

Route::resource('cart','Admin\CartController');

Route::get('clear/cart',[
	'uses' => 'Admin\CartController@clear',
	'as' => 'cart.clear'
]);