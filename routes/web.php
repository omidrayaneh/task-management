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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks','TaskController');

Route::get('get-all-task','TaskController@getAllTask');
Route::get('task-sort-byNameDesc','TaskController@getTaskSortNameDesc');
Route::get('task-sort-byNameAsc','TaskController@getTaskSortNameAsc');
Route::get('task-sort-byTimeDesc','TaskController@getTaskSortTimeDesc');
Route::get('task-sort-byTimeAsc','TaskController@getTaskSortTimeAsc');
Route::get('task-sort-byPriorityDesc','TaskController@getTaskSortPriorityDesc');
Route::get('task-sort-byPriorityAsc','TaskController@getTaskSortPriorityAsc');
