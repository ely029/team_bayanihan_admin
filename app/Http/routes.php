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

Route::get('/', 'indexController@index');
Route::get('/dashboard', 'dashboardController@index');
Route::get('/riders/list', 'dashboardController@riders');
Route::post('/add/rider', 'dashboardController@addRider');
Route::post('/update/rider', 'dashboardController@updateRider');
Route::post('/delete/rider', 'dashboardController@deleteRider');
