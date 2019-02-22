<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* User Auth */
Route::get('/', ['as'=>'login', 'uses'=>'DashboardController@index']);
Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
Route::post('login', array('as' => 'post-login', 'uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
Route::get('reset-password', ['as' => 'reset-password', 'uses' => 'AuthController@getResetPassword']);
Route::post('reset-password', array('as' => 'reset-password', 'uses' => 'AuthController@postResetPassword'));


Route::group(['middleware'=>'sentinel_auth'], function () {
	Route::resource('news', 'NewsController');
	Route::resource('editor', 'EditorController');
});