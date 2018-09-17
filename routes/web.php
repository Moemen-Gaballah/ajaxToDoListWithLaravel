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

Route::get('products', function () {
    return view('welcome');
});

Route::get('/list','ItemController@index');
Route::post('/list','ItemController@store');
Route::post('/delete','ItemController@destroy');
Route::post('/update','ItemController@update');


Route::get('/search','ItemController@search');
