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

Route::get('/', 'TicketsController@index')->name('ticket.index')->middleware('auth');
Route::get('/ticket/create/', 'TicketsController@create')->name('ticket.create')->middleware('auth');
Route::post('/ticket/store/', 'TicketsController@store')->name('ticket.store')->middleware('auth');
Route::get('/ticket/{id}/edit/', 'TicketsController@edit')->name('ticket.edit')->where(['id'=>'[0-9]+'])->middleware('auth');
Route::post('/ticket/{id}/update/', 'TicketsController@update')->name('ticket.update')->where(['id'=>'[0-9]+'])->middleware('auth');
Auth::routes();
