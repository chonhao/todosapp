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

Route::any('todo_index/{user_id}', 'TodoController@index');
Route::post('todo_create', 'TodoController@create');
Route::post('todo_update', 'TodoController@update');
Route::post('todo_delete', 'TodoController@delete');

?>
