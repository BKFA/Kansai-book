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
		Route::get('list','TopicController@getList');
		Route::get('create','TopicController@getCreate');
		Route::post('create','TopicController@postCreate');
		Route::get('update/{id}','TopicController@getUpdate');
		Route::post('update/{id}','TopicController@postUpdate');
		Route::get('delete/{id}','TopicController@getDelete');
	});

	Route::group(['prefix'=>'post'],function(){
		Route::get('list','PostController@getList');
		Route::get('create','PostController@getCreate');
		Route::post('create','PostController@postCreate');
		Route::get('update/{id}','PostController@getUpdate');
		Route::post('update/{id}','PostController@postUpdate');
		Route::get('delete/{id}','PostController@getDelete');
	});

	Route::group(['prefix'=>'advertisement'],function(){
		Route::get('list','AdvertisementController@getList');
		Route::get('create','AdvertisementController@getCreate');
		Route::post('create','AdvertisementController@postCreate');
		Route::get('update/{id}','AdvertisementController@getUpdate');
		Route::post('update/{id}','AdvertisementController@postUpdate');
		Route::get('delete/{id}','AdvertisementController@getDelete');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','UserController@getList');
		Route::get('create','UserController@getCreate');
		Route::post('create','UserController@postCreate');
		Route::get('update/{id}','UserController@getUpdate');
		Route::post('update/{id}','UserController@postUpdate');
		Route::get('delete/{id}','UserController@getDelete');
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','PagesController@getHome');
Route::get('posts/{id}/{ansititle}.html','PagesController@getPosts');
Route::get('posts/create','PagesController@getCreatePost');
Route::post('posts/create','PagesController@postCreatePost');

Route::get('posts/update/{id}/{ansititle}','PagesController@getUpdatePost');
Route::post('posts/update/{id}/{ansititle}','PagesController@postUpdatePost');
Route::get('posts/delete/{id}','PagesController@getDelete');


// Route::get('/detail/{ansititle}','pagesController@detailPost');
Route::get('/search/{content}','PagesController@searchIndex');
Route::get('search-like/{content}','PagesController@searchLike');
