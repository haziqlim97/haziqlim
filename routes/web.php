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

Route::get('/', function () {
    return view('customer.main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart','CartController@index')->name('cart');

Route::group(['middleware' => 'auth', 'namespace' => 'Manage'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Admin and Staff
	Route::group(['middleware' => ['role:admin|staff']], function() {

        // Manage User
        Route::group(['prefix' => 'customer', 'as' => 'customer:'], function() {
            Route::get('index', 'UserController@customer')->name('index');
        });

        // Manage Package
        Route::group(['prefix' => 'package', 'as' => 'package:'], function() {
            Route::get('index', 'PackageController@index')->name('index');
            Route::get('create', 'PackageController@create')->name('create');
            Route::get('show', 'PackageController@show')->name('show');
            Route::post('edit', 'PackageController@edit')->name('edit');

            Route::post('store', 'PackageController@store')->name('store');
        });
    });
    
    // Admin
	Route::group(['middleware' => ['role:admin']], function() {

        // Manage User
        Route::group(['prefix' => 'user', 'as' => 'user:'], function() {
            Route::get('index', 'UserController@index')->name('index');
            Route::get('{user}/show', 'UserController@show')->name('show');
            Route::get('{user}/edit', 'UserController@edit')->name('edit');

            route::put('{user}/update', 'UserController@update')->name('update');
            route::delete('{user}/destroy', 'UserController@destroy')->name('destroy');
        });

        // Manage Role
        Route::group(['prefix' => 'role', 'as' => 'role:'], function() {
            Route::get('index', 'RoleController@index')->name('index');
            Route::get('{role}/show', 'RoleController@show')->name('show');
        });

        // Manage Permission
        Route::group(['prefix' => 'permission', 'as' => 'permission:'], function() {
            Route::get('index', 'PermissionController@index')->name('index');
        });
	});
});