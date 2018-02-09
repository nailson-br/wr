<?php

use \App\Workforce;

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
    return view('home');
});

// Rotas para Mão-de-obra
Route::get('create-workforce', function() {
	return view('pages.workforce.workforce');
});
Route::get('list-workforce', 'WorkforceController@index');
Route::post('create-workforce', 'WorkforceController@create');
Route::get('edit-workforce/{id}', 'WorkforceController@edit');
Route::post('edit-workforce/{id}', 'WorkforceController@update');
Route::get('delete-workforce/{id}', 'WorkforceController@destroy');

// Rotas para Códigos de Serviço
Route::get('create-cod_service', function() {
	return view('pages.cod_services.cod_service');
});
Route::get('list-cod_services', 'CodServiceController@index');
Route::post('create-cod_service', 'CodServiceController@create');
Route::get('edit-cod_service/{id}', 'CodServiceController@edit');
Route::post('edit-cod_service/{id}', 'CodServiceController@update');
Route::get('delete-cod_service/{id}', 'CodServiceController@destroy');

// Rotas para Serviço
Route::get('create-service', function() {
	return view('pages.services.service');
});
Route::get('list-services', 'ServiceController@index');
// Route::get('list-services', 'ServiceController@listServices');
Route::post('create-service', 'ServiceController@create');
Route::get('edit-service/{id}', 'ServiceController@edit');
Route::post('edit-service/{id}', 'ServiceController@update');
Route::get('delete-service/{id}', 'ServiceController@destroy');
// Route::get('add-service', function() {
// 	return view('pages.services.add-service');
// });
Route::get('add-service/{id}', 'ServiceController@addService');

// Rotas para Ordens de Serviço
Route::get('create-service_order', function() {
	return view('pages.service_orders.service_order');
});
Route::get('list-service_orders', 'ServiceOrderController@index');
Route::post('create-service_order', 'ServiceOrderController@create');
Route::get('edit-service_order/{id}', 'ServiceOrderController@edit');
Route::post('edit-service_order/{id}', 'ServiceOrderController@update');
Route::get('delete-service_order/{id}', 'ServiceOrderController@destroy');

// Rotas para Usuários WR (diferenciando do user criado pelo Laravel)
Route::get('create-wr_user', function() {
	return view('pages.wr_users.wr_user');
});
Route::get('list-wr_users', 'WR_UserController@index');
Route::post('create-wr_user', 'WR_UserController@create');
Route::get('edit-wr_user/{id}', 'WR_UserController@edit');
Route::post('edit-wr_user/{id}', 'WR_UserController@update');
Route::get('delete-wr_user/{id}', 'WR_UserController@destroy');

// Rotas para Feriados e Dias-Ponte
Route::get('create-holiday', function() {
	return view('pages.holidays.holiday');
});
Route::get('list-holidays', 'HolidayController@index');
Route::post('create-holiday', 'HolidayController@create');
Route::get('edit-holiday/{id}', 'HolidayController@edit');
Route::post('edit-holiday/{id}', 'HolidayController@update');
Route::get('delete-holiday/{id}', 'HolidayController@destroy');

// Rotas para Cadastro e edição de Ordens de Serviço
// Route::get('create-service_order', function() {
// 	return view('pages.service_orders.service_order');
// });
// Route::get('create-service_order', 'ServiceOrderController@index');
Route::get('create-service_order', function() {
	return view('pages.service_orders.service_order');
});

// Route::get('/create-workforce', function () {

//     $workforce                   = new Workforce;
//     $workforce->fullName         = "Nailson dos Santos";
//     $workforce->name             = "Nailson";
//     $workforce->contract         = "AT";
//     $workforce->mainPhone        = "11 9.7989-1717";
//     $workforce->alternativePhone = "11 4727-4814";
//     $workforce->save();

//     return view('pages.workforce.workforce');
// });

// Rotas para Alocação de Mão de Obra
Route::get('workforce-allocate', function() {
	return view('pages.allocations.workforce-allocation');
});