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

Route::get('/users', 'UserController@index')->name('users.index');
Route::post('/create', 'UserController@store')->name('users.store');
Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::put('/users/{id}/edit','UserController@edit')->name('users.edit');
Route::delete('/users/{id}/delete', 'UserController@destroy')->name('users.destroy');