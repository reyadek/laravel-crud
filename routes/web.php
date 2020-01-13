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
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form-create', 'HomeController@formCreate')->name('form-create');
Route::post('/store-create', 'HomeController@storeCreate')->name('store-create');
Route::get('/form-edit/{id}', 'HomeController@formEdit')->name('form-edit');
Route::post('/store-edit/{id}', 'HomeController@storeEdit')->name('store-edit');
Route::get('delete/{id}', 'HomeController@delete')->name('delete');
