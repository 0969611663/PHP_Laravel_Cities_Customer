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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//tao group route customers
Route::group(['prefix' => 'customers'], function () {

    Route::get('/','CustomerController@index')->name('customer_index');

    Route::get('/create', 'CustomerController@create')->name('customer_create');

    Route::post('/create', 'CustomerController@store')->name('customer_store');

    Route::get('/edit/{id}', 'CustomerController@edit')->name('customer_edit');

    Route::post('/edit/{id}', 'CustomerController@update')->name('customer_update');

    Route::get('/{id}/destroy','CustomerController@destroy')->name('customer_destroy');

});

//tao group route tasks
Route::group(['prefix' => 'tasks'], function (){

    Route::get('/','TaskController@index')->name('tasks_index');

    Route::get('/create','TaskController@create')->name('tasks_create');

    Route::post('/create','TaskController@store')->name('tasks_store');

    Route::get('/{id}/edit','TaskController@edit')->name('tasks_edit');

    Route::post('/{id}/edit','TaskController@update')->name('tasks_update');

    Route::get('/{id}/destroy','TaskController@destroy')->name('tasks_destroy');
});
