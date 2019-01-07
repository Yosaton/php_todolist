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


Route::get('todos', 'TodosController@index')->name('todos.index');
Route::get('/', 'TodosController@index')->name('root');
Route::get('todos/create', 'TodosController@create')->name('todos.create');
Route::post('todos', 'TodosController@store')->name('todos.store');