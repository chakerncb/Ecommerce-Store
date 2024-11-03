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

Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

    Route::group(['prefix' => 'admin' , 'namespace' => 'App\Http\Controllers\Admin'] , function() {
        Route::get('/' , 'AdminAuthController@index') -> name('admin.index') -> middleware('auth:admin');

        Route::get('login' , 'AdminAuthController@adminLogin');
        Route::post('login' , 'AdminAuthController@CheckAdminLogin') -> name('admin.login');
    });
    
});
