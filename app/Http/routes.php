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

Route::get('create-workforce', function() {
	return view('pages.workforce.workforce');
});

Route::get('list-workforce', 'WorkforceController@index');
Route::post('create-workforce', 'WorkforceController@create');
Route::get('edit-workforce/{id}', 'WorkforceController@edit');
Route::post('edit-workforce/{id}', 'WorkforceController@update');
Route::get('delete-workforce/{id}', 'WorkforceController@destroy');

Route::get('create-service', function() {
	return view('pages.services.service');
});

Route::get('list-services', 'ServiceController@index');
Route::post('create-service', 'ServiceController@create');
Route::get('edit-service/{id}', 'ServiceController@edit');
Route::post('edit-service/{id}', 'ServiceController@update');
Route::get('delete-service/{id}', 'ServiceController@destroy');


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
