<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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

Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'web']], function() {

    Route::group(['prefix' => 'admin' , 'namespace' => 'App\Http\Controllers'] , function() {
        Route::get('/dashboard' , 'Admin\AdminHomeController@index') -> name('admin.index') -> middleware('auth:admin');

        Route::get('/login' , 'Auth\AdminLoginController@adminLogin');
        Route::post('/login' , 'Auth\AdminLoginController@CheckAdminLogin') -> name('admin.login');
        Route::Post('/logout' , 'Auth\AdminLoginController@logout') -> name('admin.logout');

        Route::get('products' , 'Admin\ProductsController@index') -> name('admin.products.index');
        Route::get('products/create' , 'Admin\ProductsController@create') -> name('admin.products.create');
        Route::post('products/store' , 'Admin\ProductsController@store') -> name('admin.products.store');
    });
    
});
