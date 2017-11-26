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

Route::get('/','HomeController@index')->name('main');

//Cache::flush();

//
Route::get('/home', 'HomeController@index')->name('home');
//
Route::resource('category', 'CategoriesController');
Route::resource('product', 'ProductsController');
Route::resource('order', 'OrdersController');
Route::put('/user/password', 'UsersController@updatePassword');
Route::resource('user', 'UsersController');
Route::post('/currentUser', 'UsersController@current');

//shopping cart controller
Route::post('cart', 'ShoppingCartController@store')->name('cart.store');
Route::delete('cart', 'ShoppingCartController@destroy')->name('cart.destroy');

//admin controller
Route::prefix('admin665')->group(function (){
    Route::get('/', 'AdminsController@index');

    //admin users controller
    Route::get('users', 'AdminsController@getUsersIndex')->name('admin.users.index');
    Route::post('users', 'AdminsController@postUsersStore')->name('admin.users.store');
    Route::get('users/create', 'AdminsController@getUsersCreate')->name('admin.users.create');
    Route::post('users/{id}/update', 'AdminsController@postUsersUpdate')->name('admin.users.update');
    Route::get('users/{id}', 'AdminsController@getUsersEdit')->name('admin.users.edit');

    //admin orders controller
    Route::get('orders', 'AdminsController@getOrdersHome')->name('admin.orders.home');
    Route::get('users/{id}/orders', 'AdminsController@getOrdersIndex')->name('admin.orders.index');
    Route::post('users/{id}/orders', 'AdminsController@postOrdersStore')->name('admin.orders.store');
    Route::get('users/{id}/orders/create', 'AdminsController@getOrdersCreate')->name('admin.orders.create');
    Route::get('users/orders/{orderId}/edit', 'AdminsController@getOrdersEdit')->name('admin.orders.edit');
    Route::post('users/orders/{orderId}/update', 'AdminsController@postOrdersUpdate')->name('admin.orders.update');

    //admin categories controller
    Route::get('categories', 'AdminsController@getCategoriesIndex')->name('admin.categories.index');
    Route::post('categories', 'AdminsController@postCategoriesStore')->name('admin.categories.store');
    Route::get('categories/create', 'AdminsController@getCategoriesCreate')->name('admin.categories.create');
    Route::post('categories/{id}/update', 'AdminsController@postCategoriesUpdate')->name('admin.categories.update');
    Route::get('categories/{id}', 'AdminsController@getCategoriesEdit')->name('admin.categories.edit');

    //admin products controller
    Route::get('categories/{id}/products/create', 'AdminsController@getProductsCreate')->name('admin.products.create');
    Route::post('categories/{id}/products', 'AdminsController@postProductsStore')->name('admin.products.store');
    Route::get('categories/products/{productId}', 'AdminsController@getProductsEdit')->name('admin.products.edit');
    Route::post('categories/{id}/products/{productId}', 'AdminsController@postProductsUpdate')->name('admin.products.update');
    Route::get('categories/{id}/products', 'AdminsController@getProductsIndex')->name('admin.products.index');
    
    //admin carousels controller
    Route::get('carousels', 'AdminsController@getCarouselsIndex')->name('admin.carousels.index');
    Route::post('carousels', 'AdminsController@postCarouselsStore')->name('admin.carousels.store');
    Route::get('carousels/create', 'AdminsController@getCarouselsCreate')->name('admin.carousels.create');
    Route::post('carousels/{id}/update', 'AdminsController@postCarouselsUpdate')->name('admin.carousels.update');
    Route::get('carousels/{id}', 'AdminsController@getCarouselsEdit')->name('admin.carousels.edit');
    
    //admin banners controller
    Route::get('banners', 'AdminsController@getBannersIndex')->name('admin.banners.index');
    Route::post('banners', 'AdminsController@postBannersStore')->name('admin.banners.store');
    Route::get('banners/create', 'AdminsController@getBannersCreate')->name('admin.banners.create');
    Route::post('banners/{id}/update', 'AdminsController@postBannersUpdate')->name('admin.banners.update');
    Route::get('banners/{id}', 'AdminsController@getBannersEdit')->name('admin.banners.edit');

});

//Route::get('/{vue_capture?}', function () {
//    return view('home');
//})->where('vue_capture', '[\/\w\.-]*');
