<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/gif', function(){
    return view('frontend.gify');
});

//////////////////////////////////////
//        FRONTEND ROUTES
/////////////////////////////////////

Route::get('/', 'frontendController@index');
Route::get('/shop', 'frontendController@shop');
Route::get('/shop/{slug}', 'frontendController@viewCategory');
Route::get('/shop/{slug}/{prod_id}', 'frontendController@viewProduct');
Route::get('/search', 'SearchController@search');
Route::post('/searching', 'SearchController@searching');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//////////////////////////////////////
//        USER ROUTES
/////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::post('/add-to-cart', 'CartController@add');
    Route::get('/cart', 'CartController@viewCart');
    Route::post('/cart/delete-item', 'CartController@delete');
    Route::post('/cart/update', 'CartController@update');

    Route::get('/cart/checkout', 'CheckoutController@viewCheckout');
    Route::post('/cart/checkout/place-order', 'CheckoutController@placeOrder');
    
    Route::get('/orders', 'OrdersController@index');

    Route::get('/add-review/{id}', 'ReviewController@add');
    Route::post('/add-review/{id}', 'ReviewController@submit');
});


//////////////////////////////////////
//        BACKEND ROUTES
/////////////////////////////////////

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.index');
    });

    Route::get('/dashboard/categories', 'Admin\CategoryController@index');
    Route::get('/dashboard/categories/add-category', 'Admin\CategoryController@add');
    Route::post('/dashboard/categories/insert-category', 'Admin\CategoryController@insert');
    Route::get('/dashboard/categories/edit-category/{id}', 'Admin\CategoryController@edit');
    Route::put('/dashboard/categories/edit-category/{id}', 'Admin\CategoryController@update');
    Route::get('/dashboard/categories/delete-category/{id}','Admin\CategoryController@delete');

    Route::get('/dashboard/products', 'Admin\ProductController@index');
    Route::get('/dashboard/products/getProducts', 'Admin\ProductController@getProducts');
    Route::get('/dashboard/products/add-product', 'Admin\ProductController@add');
    Route::post('/dashboard/products/insert-product', 'Admin\ProductController@insert');
    Route::get('/dashboard/products/edit-product/{id}', 'Admin\ProductController@edit');
    Route::put('/dashboard/products/edit-product/{id}', 'Admin\ProductController@update');
    Route::get('/dashboard/products/delete-product/{id}','Admin\ProductController@delete');

    Route::get('/dashboard/orders', 'Admin\OrdersController@index');
    Route::get('/dashboard/orders/edit-order/{id}', 'Admin\OrdersController@edit');
    Route::put('/dashboard/orders/edit-order/{id}', 'Admin\OrdersController@update');
    Route::get('/dashboard/orders/delete-order/{id}','Admin\OrdersController@delete');
});