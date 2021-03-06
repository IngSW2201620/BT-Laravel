<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('buses', 'busesController');

Route::resource('routeStatuses', 'routeStatusesController');

Route::resource('drivers', 'driversController');

Route::resource('sellers', 'sellersController');

Route::resource('stops', 'stopsController');

Route::resource('busPositions', 'busPositionsController');

Route::resource('roads', 'roadsController');

Route::resource('roadStops', 'roadStopsController');

Route::resource('routes', 'routesController');

Route::resource('tickets', 'ticketsController');