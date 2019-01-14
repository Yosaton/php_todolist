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

Route::middleware('test')->group(function(){
    Route::get('/', function () {
        return view('todos.index');
    })->name('todos.index');
});

// Route::get('/create', function () {
//     return view('todos.create');
// });

// Route::get('/create', 'TodosController@create');

//Authentication Routes
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
//first part url in search bar, 2nd part is the controller + function, 3rd part so we can reference it in other parts of our code ""return redirect(route('login'));""
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

//Registration Routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register')->name('register');