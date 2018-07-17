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


Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::get('/dashboard', function() {
		return view('admin.traffic');

	});

	Route::group(['prefix'=>'topic'],function(){
		Route::get('list','topicController@getList');
		Route::get('create','topicController@getCreate');
		Route::post('create','topicController@postCreate');
		Route::get('update/{idtopic}','topicController@getUpdate');
		Route::post('update/{idtopic}','topicController@postUpdate');
		Route::get('delete/{idtopic}','topicController@getDelete');
	});

	Route::group(['prefix'=>'post'],function(){
		Route::get('list','postController@getList');
		Route::get('create','postController@getCreate');
		Route::post('create','postController@postCreate');
		Route::get('update/{idtopic}','postController@getUpdate');
		Route::post('update/{idtopic}','postController@postUpdate');
		Route::get('delete/{idtopic}','postController@getDelete');
	});

	Route::group(['prefix'=>'advertisement'],function(){
		Route::get('list','advertisementController@getList');
		Route::get('create','advertisementController@getCreate');
		Route::post('create','advertisementController@postCreate');
		Route::get('update/{idadvertisement}','advertisementController@getUpdate');
		Route::post('update/{idadvertisement}','advertisementController@postUpdate');
		Route::get('delete/{idadvertisement}','advertisementController@getDelete');
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
Route::get('/','pagesController@getHome');
Route::get('posts/{idpost}/{ansititle}.html','pagesController@getPosts');
Route::get('posts/create','pagesController@getCreatePost');
Route::post('posts/create','pagesController@postCreatePost');

Route::get('posts/update/{idpost}/{ansititle}','pagesController@getUpdatePost');
Route::post('posts/update/{idpost}/{ansititle}','pagesController@postUpdatePost');
Route::get('posts/delete/{idpost}','pagesController@getDelete');
// Route::get('/detail/{ansititle}','pagesController@detailPost');
// Route::get('/search/{content}','pagesController@searchIndex');
// Route::get('search-like/{content}','pagesController@searchLike');
Route::get('/testmail', 'testMailController@test');
Route::post('/testmail', 'testMailController@hanldeMail');
