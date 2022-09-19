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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::get('/all-product', 'ProductListController@show')->name('product-list');
//Route::get('/product', 'HomeController@index')->name('home');

Route::get('/cart', 'CartController@index')->name('cart-view');
Route::post('/cart/add','CartController@add')->name('add-to-cart');
Route::delete('/cart/remove/{id}','CartController@delete')->name('cart.delete');

Route::get('/checkout', 'CheckoutController@show')->name('checkout');

