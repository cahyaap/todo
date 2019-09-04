<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Todo@index');
Route::get('/to-do-list', 'Todo@index')->name('to-do-list');
Route::get('/to-do-list/get-to-do-list', 'Todo@getTodoList')->name('get-to-do-list');
Route::get('/to-do-list/change-status', 'Todo@changeStatus')->name('change-status');
Route::post('/to-do-list/add', 'Todo@add')->name('add');
Route::post('/to-do-list/delete', 'Todo@delete')->name('delete');
