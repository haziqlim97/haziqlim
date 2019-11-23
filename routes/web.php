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

Route::get('/test', 'CartController@test');
Route::get('/pay', 'PaymentController@makePayment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/package', 'Manage\PackageController@all')->name('package:all');

// Manage Cart
Route::group(['prefix' => 'cart', 'as' => 'cart:', 'middleware' => ['CanUseCart']], function() {
    Route::get('/', 'CartController@index')->name('cart');

    Route::post('{package}', 'CartController@store')->name('add');
    Route::get('checkout', 'PaymentController@makePayment')->name('checkout');
});

// Payment
Route::group(['prefix' => 'payment', 'as' => 'payment:', 'middleware' => ['CanUseCart']], function() {
    // Route::get('checkout', 'PaymentController@makePayment')->name('checkout');

    Route::get('success', 'PaymentController@displaySuccessPage')->name('success');
});

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
            Route::get('{package}/show', 'PackageController@show')->name('show');
            Route::get('{package}/edit', 'PackageController@edit')->name('edit');

            Route::post('store', 'PackageController@store')->name('store');
            Route::put('{package}/update', 'PackageController@update')->name('update');
            Route::delete('{package}/destroy', 'PackageController@destroy')->name('destroy');
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

// Payment
Route::group(['prefix' => 'webhooks', 'as' => 'webhooks:'], function() {
    Route::post('oneTimePaymentWebhook', 'PaymentController@oneTimePaymentWebhook')->name('paymentSuccess');
});