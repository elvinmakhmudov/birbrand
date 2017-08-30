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
Route::put('/user/password', 'UsersController@updatePassword');
Route::resource('user', 'UsersController');
Route::post('/currentUser', 'UsersController@current');

//admin controller
Route::prefix('admin665')->group(function (){
    Route::get('/', 'AdminsController@index');

    //admin categories controller
    Route::get('categories', 'AdminsController@getCategoriesIndex')->name('admin.categories.index');
    Route::post('categories', 'AdminsController@postCategoriesStore')->name('admin.categories.store');
    Route::get('categories/create', 'AdminsController@getCategoriesCreate')->name('admin.categories.create');
    Route::post('categories/{id}/update', 'AdminsController@postCategoriesUpdate')->name('admin.categories.update');
    Route::get('categories/{id}', 'AdminsController@getCategoriesEdit')->name('admin.categories.edit');

    //admin products controller
    Route::get('categories/{id}/products/create', 'AdminsController@getProductsCreate')->name('admin.products.create');
    Route::post('categories/{id}/products/store', 'AdminsController@postProductsStore')->name('admin.products.store');
    Route::get('categories/{id}/products/{productId}', 'AdminsController@getProductsEdit')->name('admin.products.edit');
    Route::post('categories/{id}/products/{productId}', 'AdminsController@postProductsUpdate')->name('admin.products.update');
    Route::get('categories/{id}/products', 'AdminsController@getProductsIndex')->name('admin.products.index');
    Route::post('products', 'AdminsController@postProducts')->name('admin.products');
});

//Route::get('/{vue_capture?}', function () {
//    return view('home');
//})->where('vue_capture', '[\/\w\.-]*');
