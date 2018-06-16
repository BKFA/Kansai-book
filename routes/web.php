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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
	
	Route::group(['prefix'=>'dashboard'],function(){
		Route::get('/','adminController@getAdminDashboard');
		
	});

	Route::group(['prefix'=>'topic'],function(){
		Route::get('list','topicController@getList');
		Route::get('create','topicController@getCreate');
		Route::post('create','topicController@postCreate');
		Route::get('update/{idtopic}','topicController@getUpdate');
		Route::post('update/{idtopic}','topicController@postUpdate');
		Route::get('delete/{idtopic}','topicController@getDelete');
	});
});
