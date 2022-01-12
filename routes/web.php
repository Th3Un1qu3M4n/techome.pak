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

// Route::get('/', function(){
//     return view('frontend.index');
// });
Route::get('/', 'frontendController@index');
Route::get('/shop', 'frontendController@shop');
Route::get('/shop/{slug}', 'frontendController@viewCategory');
Route::get('/shop/{slug}/{prod_id}', 'frontendController@viewProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
});