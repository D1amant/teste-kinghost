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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('rooms',['as' => 'rooms', 'uses' => 'RoomsController@index']);
Route::get('rooms/create',    'RoomsController@create');
Route::post('rooms/store',    'RoomsController@store');
Route::put('rooms/{id}',      'RoomsController@update');
Route::get('rooms/{id}/edit', 'RoomsController@edit');
Route::patch('rooms/{id}',    'RoomsController@destroy');

Route::get('reserve',['as' =>   'reserve', 'uses' => 'ReserveController@index']);
Route::get('reserve/create',    'ReserveController@create');
Route::post('reserve/store',    'ReserveController@store');
Route::put('reserve/{id}',      'ReserveController@update');
Route::patch('reserve/{id}',      'ReserveController@destroy');
Route::get('reserve/{id}/edit', 'ReserveController@edit');

