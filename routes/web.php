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

Route::group(['prefix'=>'admin', 'middleware'=>'login'],function(){
	
	Route::group(['prefix'=>'dashboard'],function(){
		Route::get('/','adminController@getAdminDashboard');
		
	});

	Route::group(['prefix'=>'topic'],function(){
		Route::get('list','topicController@getListTopic');
		Route::post('add','topicController@postAdd');
		Route::post('update/{idtopic}','topicController@postUpdate');
		Route::get('delete/{idtopic}','topicController@getDelete');
	});

	Route::group(['prefix'=>'post'],function(){
		Route::get('list','postController@getListPost');
		Route::get('create','postController@getCreate');
		Route::post('create','postController@postCreate');
		Route::get('update/{idpost}','postController@getUpdate');
		Route::post('update/{idpost}','postController@postUpdate');
		Route::get('delete/{idpost}','postController@getDelete');
	});

	Route::group(['prefix'=>'tag'],function(){
		Route::get('list','tagController@getListTag');
		Route::post('add','tagController@postAdd');
		Route::post('update/{idtag}','tagController@postUpdate');
		Route::get('delete/{idtag}','tagController@getDelete');
	});

	Route::group(['prefix'=>'adve'],function(){
		Route::get('list','adveController@getListAdve');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','userController@getList');
		Route::get('create','userController@getCreate');
		Route::post('create','userController@postCreate');
		Route::get('update/{iduser}','userController@getUpdate');
		Route::post('update/{iduser}','userController@postUpdate');
		Route::get('delete/{iduser}','userController@getDelete');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
