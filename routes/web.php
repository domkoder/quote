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
Route::get('/{author?}', 'QuoteController@indext')->name('index');
Route::post('/doquote', 'QuoteController@save')->name('save');
Route::get('/delete/{id}', 'QuoteController@deleteQuote')->name('delete');