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

        /////////////////////////// Products Routes ///////////////////////////
        Route::get('products' , 'Admin\ProductsController@index') -> name('admin.products.index');
        Route::get('products/create' , 'Admin\ProductsController@create') -> name('admin.products.create');
        Route::post('products/store' , 'Admin\ProductsController@store') -> name('admin.products.store');
        Route::get('product/edit/{id}' , 'Admin\ProductsController@edit') -> name('admin.products.edit');
        Route::post('product/update/{id}' , 'Admin\ProductsController@update') -> name('admin.products.update');
        Route::Post('product/delete' , 'Admin\ProductsController@delete') -> name('admin.products.delete');

        /////////////////////////// Profile Routes ///////////////////////////
        Route::get('profile' , 'Admin\AdminProfileController@index') -> name('admin.profile.settings');
        Route::post('profile/update' , 'Admin\AdminProfileController@update') -> name('admin.profile.update');

        ///////////////////////// Orders Routes //////////////////////////////
        Route::get('orders' , 'Admin\OrdersController@index') -> name('admin.orders.index');
        Route::get('order/show/{id}' , 'Admin\OrdersController@show') -> name('admin.orders.show');
        Route::post('order/delete' , 'Admin\OrdersController@delete') -> name('admin.orders.delete');
        Route::post('order/update' , 'Admin\OrdersController@update') -> name('admin.orders.update');
        

        ///////////////////////// Categories Routes //////////////////////////

        Route::get('categories' , 'Admin\CategoriesController@index') -> name('admin.categories.index');
        Route::post('category/create' , 'Admin\CategoriesController@create') -> name('admin.categories.create');
        Route::post('category/update' , 'Admin\CategoriesController@update') -> name('admin.categories.update');
    });
    
});
