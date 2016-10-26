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


Route::resource('administradors', 'AdministradorAPIController');

Route::resource('users', 'UserAPIController');

Route::resource('tickets', 'TicketAPIController');

Route::resource('sellers', 'SellerAPIController');

Route::resource('sellers', 'SellerAPIController');

Route::resource('roads', 'roadAPIController');

Route::resource('buses', 'busAPIController');

Route::resource('routeschedules', 'routescheduleAPIController');

Route::resource('drivers', 'driverAPIController');

Route::resource('stops', 'stopAPIController');

Route::resource('passengers', 'passengerAPIController');