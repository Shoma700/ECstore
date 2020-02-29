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

// Route::get('/', function () {
//     return view('welcome');
// });

//ECfront
Route::get('/', 'ECfrontController@index');
Route::post('/cart', 'ECfrontController@add_cart');
Route::post('/', 'ECfrontController@delete');
Route::get('/form', 'ECfrontController@order_form');
Route::post('/orderd', 'ECfrontController@order');

//ECback
Route::get('/back', 'ECbackController@back1')->middleware('auth');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
