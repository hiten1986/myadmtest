<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::group(['prefix' => 'admin_seller'], function() {
// 	Route::get('/', function() {
// 		dd('This is the AdminSeller module index page.');
// 	});
// });

Route::group(['domain' => 'seller.kopassus.kom'], function () {
	Route::get('/', function() {
		dd('This is the AdminSeller module index page.');
	});

	Route::get('/login', 'AuthenticationController@index');
	Route::post('/login', 'AuthenticationController@index');

	Route::get('/home', 'HomeController@index');
});