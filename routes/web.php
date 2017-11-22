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

Route::resource('news', 'NewsController');
Route::resource('customers', 'CustomersController');
Route::resource('events', 'EventsController');
Route::resource('products', 'ProductsController');

Route::get('teste', function () {
    return 'testando';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
