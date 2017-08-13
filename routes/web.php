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

Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('main');

//
Route::get('/home', 'HomeController@index')->name('home');
//
Route::resource('category', 'CategoriesController');
Route::resource('product', 'ProductsController');
Route::resource('order', 'OrdersController');
Route::resource('user', 'UsersController');
Route::post('/currentUser', 'UsersController@current');

Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
