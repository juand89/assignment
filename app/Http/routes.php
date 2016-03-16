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

Route::get('/',['as' => 'home', 'uses' => 'PostController@index']);

Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function()
{
	
	Route::get('new-post','PostController@create');
	
	
	Route::post('new-post','PostController@store');
		
	
});
