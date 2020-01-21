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
Route::get('/', 'ECfrontController@front1');
Route::get('/cart', 'ECfrontController@front2');//？
Route::post('/cart', 'ECfrontController@front2');
Route::get('/form', 'ECfrontController@front3');
Route::post('/form', 'ECfrontController@front3');


Route::post('/orderd', 'ECfrontController@front4');

//ECback
Route::get('/back', 'ECbackController@back1')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
