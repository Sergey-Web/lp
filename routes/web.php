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

Route::middleware([])->group(function() {
    Route::get('/', 'IndexController@index')->name('home');
    Route::post('/', 'IndexController@contact')->name('contact');
    Route::get('/page/{alias}', 'PageController@index')->name('page');
});

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/pages', 'PagesController');
    Route::resource('/services', 'ServicesController');
    Route::resource('/portfolio', 'PortfolioController');
    Route::resource('/employees', 'EmployeesController');
});

Auth::routes();
