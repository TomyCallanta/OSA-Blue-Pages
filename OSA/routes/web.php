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
Route::get('/page-not-found', function(){
	return abort(404);
});

Route::resource('/supplier', 'SupplierController');

Route::get('/moreReviews/{id}', 'SupplierController@moreReviews');

Route::get('/', array('as'=>'search', 'uses' => 'HomeController@index'));

Route::post('/rate', 'HomeController@rate')->middleware('auth');

Route::post('/comment','HomeController@comment')->middleware('auth');

Route::get('/suggestion', 'FormsController@suggestionPage')->middleware('role:User');

Route::post('/suggestion', array ('uses'=>'FormsController@newSuggestion'))->middleware('role:User');

Route::get('/admin/view/{view}', 'AdminController@index')->middleware('role:Admin');

// Authentication Routes
// Log in Routes...
Route::get('must-log-in', 'HomeController@mustLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('logout', 'Auth\LoginController@logout');

// Admin side
Route::get('/admin/EditAdmin', 'AdminController@viewAdmin');

//google to be moved
Route::get('/callback/{provider}', 'Auth\AuthController@handleProviderCallback');