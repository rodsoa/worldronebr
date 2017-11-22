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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('news', 'NewsController');
    Route::resource('customers', 'CustomersController');
    Route::resource('events', 'CustomersController');
    Route::resource('event-categories', 'EventCategoriesController');
    Route::resource('products', 'ProductsController');
});
