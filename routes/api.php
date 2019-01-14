<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('todos', 'TodosController@store');

// List articles
Route::get('todos', 'TodosController@index')->name('');

// List single article
Route::get('todo/{id}', 'TodosController@show');

// Create new article


// Update article
Route::put('todos/{todo}', 'TodosController@update');

// Delete article
Route::delete('todos/{todo}', 'TodosController@destroy');

// todos / {todo}
// laravel knows that when we give the {todo} model name to pass in the id. So, when we use url: `api/todos/${this.todo.id}`
// in the TodosIndexComponent, it will fill up the {this.todo.id} with {todo} stuff.