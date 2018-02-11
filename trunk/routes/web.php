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

/**
 * если не пашет поднять модуль перенаправлений
 * # a2enmod rewrite
 */


Route::get('/', function () {
    return view('welcome');
});

Route::post( 'usluga/{id}' , "UslugaController@update"  );//->where('id', '[A-Za-z-]+');
Route::get( 'usluga/{id}' , "UslugaController@edit"  );//->where('id', '[A-Za-z-]+');
Route::any( 'usluga' , "UslugaController@index" );

Route::post( 'filial/{id}' , "FilialController@update"  );//->where('id', '[A-Za-z-]+');
Route::get( 'filial/{id}' , "FilialController@edit"  );//->where('id', '[A-Za-z-]+');
Route::any( 'filial' , "FilialController@index" );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
