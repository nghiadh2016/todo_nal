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
// todo router
Route::get('/', 'AdminTodoController@showFullList');// view all list todo
Route::get('/todo/showupdate/{id_todo}', 'AdminTodoController@showUpdateView');// view update one work
Route::get('/todo/showadd', 'AdminTodoController@showAddView');// view add work
Route::get('/todo/delete/{id_todo}', 'AdminTodoController@delete'); // delete a work

Route::get('/todo/work/day', 'AdminTodoController@showWorkOfDayView');// view find work of day
Route::get('/todo/work/month', 'AdminTodoController@showWorkOfMonthView');// view find work of month
Route::get('/todo/work/week', 'AdminTodoController@showWorkOfWeekView');// view find work of week

Route::post('/todo/update', 'AdminTodoController@update');// update one work todo
Route::post('/todo/add', 'AdminTodoController@add');// update one work todo

Route::post('/todo/work/daylist', 'AdminTodoController@showListWorkOfDay');// list work todo a day
Route::post('/todo/work/monthlist', 'AdminTodoController@showListWorkOfMonth');// list work todo a month
Route::post('/todo/work/weeklist', 'AdminTodoController@showListWorkOfWeek');// list work todo a week



