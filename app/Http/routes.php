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

Route::group(['domain' => 'seller.kopassus.kom'], function () {
	Route::group(['namespace' => 'Seller'], function () {
	    Route::get('/login', 'AuthenticationController@index');
		Route::post('/login', 'AuthenticationController@index');
		// Route::get('/home', 'Seller\HomeController@index');
		Route::get('/home', 'HomeController@index');
	});
});

Route::group(['domain' => 'buyer.kopassus.kom'], function () {
	Route::group(['namespace' => 'Buyer'], function () {
	    Route::get('/login', 'AuthenticationController@index');
		Route::post('/login', 'AuthenticationController@index');
		// Route::get('/home', 'Seller\HomeController@index');
		Route::get('/home', 'HomeController@index');
	});
});