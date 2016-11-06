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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


<<<<<<< HEAD
Route::resource('buses', 'busesAPIController');

Route::resource('route_statuses', 'route_statusesAPIController');

Route::resource('route_statuses', 'route_statusesAPIController');

Route::resource('buses', 'busesAPIController');

Route::resource('route_statuses', 'route_statusesAPIController');

Route::resource('route_statuses', 'routeStatusesAPIController');

Route::resource('drivers', 'driversAPIController');

Route::resource('sellers', 'sellersAPIController');

Route::resource('stops', 'stopsAPIController');

Route::resource('bus_positions', 'busPositionsAPIController');

Route::resource('roads', 'roadsAPIController');

Route::resource('road_stops', 'roadStopsAPIController');

Route::resource('routes', 'routesAPIController');

Route::resource('tickets', 'ticketsAPIController');
=======
>>>>>>> parent of 7bd08dc... MigracionesBasicas
