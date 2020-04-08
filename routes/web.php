<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UsersController@index')->name('index');
Route::get('/users/{id}/edit/', 'UsersController@edit')->name('edit')->where(['id'=>'[0-9]+']);
Route::post('/users/{id}/update/', 'UsersController@update')->name('update')->where(['id'=>'[0-9]+']);
