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

Route::model('user', 'Jde\User');
Route::resource('user', 'UsersController');

Route::get('/', 
[
	'as' => 'survey.index',
	'uses' => 'SurveysController@index'
]);

Route::get('/notification', 
[
	'as' => 'survey.notification',
	'uses' => 'SurveysController@displayNotification'
]);

Route::get('/dashboard', 
[
	'as' => 'dashboard.survey',
	'uses' => 'SurveysController@dashboard'
]);

Route::get('/dashboard/export', 
[
	'as' => 'dashboard.survey.export',
	'uses' => 'SurveysController@export'
]);

Route::get('/dashboard/users', 
[
	'as' => 'dashboard.users',
	'uses' => 'UsersController@index'
]);




