<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('home', 'HomeController');
Route::post('home/addComment', 'HomeController@store')->name('home.store');
Route::get('/category/{slug}', 'HomeController@showCategory')->name('category');
Route::get('/products/{slug}', 'HomeController@showProduct')->name('product');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/news', 'HomeController@showNewsIndex')->name('news');
Route::get('/news/{slug}', 'HomeController@showNews')->name('news.showNews');

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('cart.index');
    // Route::get('/order/{slug}', 'CartController@paymentProduct')->name('cart.paymentProduct');
    Route::get('/order', 'CartController@paymentProduct')->name('cart.paymentProduct');
    Route::get('/payment', 'CartController@payment')->name('cart.payment');
    Route::get('/checkout', 'CartController@getCheckout')->name('cart.getCheckout');
    Route::post('/checkout', 'CartController@postCheckout')->name('cart.postCheckout');
    Route::post('/', 'CartController@add')->name('cart.add');
    Route::delete('/', 'CartController@remove')->name('cart.remove');
    Route::put('/', 'CartController@update')->name('cart.update');
    Route::post('/applyCoupon', 'CartController@applyCoupon')->name('cart.applyCoupon');
    Route::delete('/applyCoupon', 'CartController@removeCoupon')->name('cart.removeCoupon');
    Route::post('/getListDistrict', 'CartController@getListDistrict')->name('cart.getListDistrict');
    Route::post('/getListWard', 'CartController@getListWard')->name('cart.getListWard');
    Route::post('/updateShipping', 'CartController@updateShipping')->name('cart.updateShipping');
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');

    // Categories
    Route::resource('categories', 'CategoryController');
    // Products
    Route::resource('products', 'ProductController');
    Route::get('/product/trashed', 'ProductController@trashed')->name('product.trashed');
    Route::put('/products/{id}/restore', 'ProductController@restore')->name('products.restore');
    Route::delete('/products/{id}/forceDelete', 'ProductController@forceDelete')->name('products.forceDelete');
    Route::get('/products/{product}/images', 'ProductController@editImages')->name('products.editImages');
    Route::post('/products/{product}/images', 'ProductController@addImages')->name('products.addImages');
    Route::delete('/products/{product}/images/{image}', 'ProductController@deleteImage')->name('products.deleteImage');
    
    // NewsOfEvent
    Route::resource('news', 'NewsController');
    Route::get('/new/trashed', 'NewsController@trashed')->name('new.trashed');
    Route::put('/news/{id}/restore', 'NewsController@restore')->name('news.restore');
    Route::delete('/news/{id}/forceDelete', 'NewsController@forceDelete')->name('news.forceDelete');

    // Customers
    Route::resource('customers', 'CustomerController');
    Route::get('/customer/trashed', 'CustomerController@trashed')->name('customer.trashed');
    Route::put('/customers/{id}/restore', 'CustomerController@restore')->name('customer.restore');
    Route::delete('/customers/{id}/forceDelete', 'CustomerController@forceDelete')->name('customer.forceDelete');
    
    // profiles
    Route::resource('profiles', 'ProfileController');

    Route::put('/orders/{order}/updatePartial', 'OrderController@updatePartial')->name('orders.updatePartial');
    Route::resource('orders', 'OrderController');
    Route::resource('coupons', 'CouponController');

    // comments
    Route::resource('comments', 'CommentController');
    Route::get('/comment/trashed', 'CommentController@trashed')->name('comment.trashed');
    Route::put('/comments/{id}/restore', 'CommentController@restore')->name('comments.restore');
    Route::delete('/comments/{id}/forceDelete', 'CommentController@forceDelete')->name('comments.forceDelete');

    // Order
    Route::resource('orders', 'OrderController');
    Route::post('/order', 'OrderController@showOrderDetail')->name('orders.showOrderDetail');
    Route::post('/orders/update-shipping', 'OrderController@updateShipping')->name('orders.updateShipping');
    Route::post('/orders/update-payment', 'OrderController@updatePayment')->name('orders.updatePayment');
    Route::get('/order/trashed', 'OrderController@trashed')->name('order.trashed');
    Route::put('/orders/{id}/restore', 'OrderController@restore')->name('orders.restore');
    Route::delete('/orders/{id}/forceDelete', 'OrderController@forceDelete')->name('orders.forceDelete');

});

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
// Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

