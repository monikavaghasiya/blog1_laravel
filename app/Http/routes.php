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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function(){


	Route::get('addBlog','blogController@index');
	Route::post('addBlog','blogController@index');

	Route::get('delete/{id}','deleteController@destroy');
	Route::get('edit/{id}','editController@edit');
	Route::post('edit/{id}','editController@update');
	Route::get('editComment/{id}','editComment@editCommentStatus');
	Route::post('editComment','editComment@updateCommentStatus');


});

Route::get('viewMore/{id}','viewMoreController@viewMOre');
Route::post('viewMore/{id}','viewMoreController@addComment');
Route::get('ajaxAddComment/{comment}/{id}','viewMoreController@ajaxAddComment');
Route::get('guestAjaxAddComment/{comment}/{id}/{guestName}','viewMoreController@guestAjaxAddComment');


Route::get('searchBlog','blogController@search');
Route::post('search','blogController@search');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::any('/{all}', function () {
	return view('errors.503');
})->where('all', '.*');