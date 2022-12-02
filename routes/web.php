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


Route::get('/access-restricted', function () {
    return view('access-restricted');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-to-cart/{productId}', 'HomeController@addtocart');
Route::get('/cart', 'HomeController@showcart');
Route::get('/productdetails/{productId}', 'productsController@productdetails');




Route::get('/products/create','productsController@showproductform')->middleware('auth','blockCustomer');
Route::post('/products/create','productsController@createproduct')->middleware('auth','blockCustomer');

Route::get('/products','productsController@listproducts')->middleware('auth','blockCustomer');

Route::get('products/{productId}/view','productsController@viewproduct')->middleware('auth','blockCustomer');

Route::get('products/{productId}/edit','productsController@editproduct')->middleware('auth','OnlyAdmin');
Route::post('products/{productId}/edit','productsController@updateproduct')->middleware('auth','OnlyAdmin');

Route::get('products/{productId}/delete','productsController@deleteproduct')->middleware('auth','OnlyAdmin');
Route::get('products/{productId}/approve','productsController@approveproduct')->middleware('auth','OnlyAdmin');

