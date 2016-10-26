<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('chart/{type}/{x}/{y}', function($type, $x, $y){
	return "Tipo de grafico: ".$type.", Valor x:".$x." Valor y: ".$y;
});

Route::get('callto','miControlador@miSolicitud');

//----------- con Rest
Route::resource('report', 'ReportController');
Auth::routes();

Route::get('/home', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('administradors', 'AdministradorController');

Route::resource('users', 'UserController');

Route::resource('tickets', 'TicketController');

Route::resource('sellers', 'SellerController');

Route::resource('sellers', 'SellerController');

Route::resource('roads', 'roadController');

Route::resource('buses', 'busController');

Route::resource('routeschedules', 'routescheduleController');

Route::resource('drivers', 'driverController');

Route::resource('stops', 'stopController');

Route::resource('passengers', 'passengerController');