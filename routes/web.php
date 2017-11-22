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

<<<<<<< HEAD
=======
Route::resource('news', 'NewsController');
Route::resource('customers', 'CustomersController');
Route::resource('events', 'EventsController');
Route::resource('products', 'ProductsController');

Route::get('teste', function () {
    return 'testando';
});

>>>>>>> 32bcc226bb612339012fa7a6e10ef926bc5dea68
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('news', 'NewsController');
    Route::resource('customers', 'CustomersController');
    Route::resource('events', 'CustomersController');
    Route::resource('event-categories', 'EventCategoriesController');
    Route::resource('products', 'ProductsController');
});
