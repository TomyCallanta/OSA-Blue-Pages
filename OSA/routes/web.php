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

Route::get('/Admin/Get/{id}', 'AdminController@view')->middleware('role:Admin');

Route::get('/Reviews/{id}/{page}', 'ReviewsController@view');

Route::put('/Admin/Edit/{id}', 'AdminController@edit')->middleware('role:Admin');

Route::put('/Admin/Change/{status}', 'AdminController@change')->middleware('role:Admin');

Route::delete('Admin/Delete', 'AdminController@delete')->middleware('role:Admin');

Route::get('/admin/add', 'AdminController@add')->middleware('role:Admin');

Route::post('/Admin/Add', 'FormsController@newSupplier')->middleware('role:Admin');

Route::post('/admin/new-admin', 'AdminController@newAdmin')->middleware('role:Admin');

Route::post('/admin/addTags', 'AdminController@addTags')->middleware('role:Admin');

Route::post('/admin/removeTags', 'AdminController@removeTags')->middleware('role:Admin');
Route::get('/admin/categories', 'AdminController@viewCategories');
// Google
Route::get('/redirect/{provider}', 'Auth\AuthController@redirect');

Route::get('/callback/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::get('google', function () {
    return view('googleAuth');
});

// Authentication Routes
// Log in Routes...
Route::get('must-log-in', 'HomeController@mustLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('logout', 'Auth\LoginController@logout');

// Admin side
Route::get('/admin/EditAdmin', 'AdminController@viewAdmin');
