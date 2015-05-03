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

Route::get('/', 'HomeController@index');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('prefix'=>'/api'),function(){
    //Route::get('users','UserController@index', ['middleware' => 'auth']);
    Route::get('users',['middleware' => 'auth.basic', 'uses' => 'UserController@index']);
    Route::post('users/test',['middleware' => 'auth.basic', 'uses' => 'UserController@postTest']);
});

//Route::any( '{catchall}', 'HomeController@index')->where('catchall', '(.*)');

Route::any('{url?}', 'HomeController@index')->where(['url' => '[-a-z0-9/]+']);