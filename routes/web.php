<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });

    Auth::routes();
    Route::get('/', 'Front\HomeController@index')-> name('index');

    Route::group(['prefix' => 'product'], function() {
        Route::get('/{name}' , 'Front\ProductController@index') -> name('product.details');
    });

    Route::get('cart' , 'Front\CartController@index') -> name('cart.store');
    Route::get('wishlist', 'Front\WishlistController@index') -> name('wishlist.index');        

    Route::get('checkout' , 'Front\CheckoutController@index') -> name('checkout.index');
    Route::post('checkout' , 'Front\CheckoutController@store') -> name('checkout.store');
    // Route::get('checkout/success' , 'Front\CheckoutController@success') -> name('checkout.success');
    Route::get('invoice/{id}' , 'Front\CheckoutController@invoice') -> name('invoice');
});
