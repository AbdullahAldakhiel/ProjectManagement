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

Route::get('/', 'PagesController@index');

Route::resource('dash/tasks', 'TasksController');
Route::get('/dash/show-tasks', 'TasksController@report');

Route::resource('dash/resource', 'ResourceController');
Route::get('/dash/show-resource', 'ResourceController@report');

Route::resource('dash/allocate', 'AllocateController');
Route::get('/dash/show-allocate', 'AllocateController@report');

Route::get('dash/tasks-cost', 'CostController@taskCost');
Route::get('dash/total-cost', 'CostController@totalCost');



Auth::routes();
