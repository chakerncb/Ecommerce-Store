<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale() ,'namespace' => 'App\Http\Controllers', 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

    Auth::routes();
    Route::get('/', 'Front\HomeController@index')-> name('index');

    Route::group(['prefix' => 'product'], function() {

        Route::get('/{name}' , 'Front\ProductController@index') -> name('product.details');
        Route::post('/{id}/add-to-cart' , 'Front\ProductController@addToCart') -> name('product.add.to.cart');
    });

    Route::post('cart' , 'Front\CartController@store') -> name('cart.store');
});
