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

// Auth is handled by the middleware when the
// HomeController is constructed.
// If you are not logged in you get the login page.
// If you are you get the Angular page (resources/views/index.php)
Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Api routes that can only be called from Auth users
Route::group(array('prefix'=>'/api'),function(){
    Route::get('users',['middleware' => 'auth.basic', 'uses' => 'UserController@index']);
    Route::post('users/test',['middleware' => 'auth.basic', 'uses' => 'UserController@postTest']);
});

// Catch all route send you to the homeController. (index page)
Route::any('{url?}', 'HomeController@index')->where(['url' => '[-a-z0-9/]+']);