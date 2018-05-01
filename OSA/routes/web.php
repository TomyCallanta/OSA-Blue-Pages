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
Route::get('/moreReviews/{id}', 'SupplierController@moreReviews');

Route::get('/', array('as'=>'search', 'uses' => 'HomeController@index'));

Route::post('/comment','HomeController@comment')->middleware('auth');

Route::get('/suggestion', 'FormsController@suggestionPage')->middleware('auth');

Route::post('/suggestion', array ('uses'=>'FormsController@newSuggestion'))->middleware('auth');

Route::resource('/supplier', 'SupplierController');

Route::get('/admin/view/{view}', 'AdminController@index')->middleware('auth');

Route::get('/Admin/Get/{id}', 'AdminController@view')->middleware('auth');

Route::get('/Reviews/{id}/{page}', 'ReviewsController@view');

Route::put('/Admin/Edit/{id}', 'AdminController@edit')->middleware('auth');

Route::put('/Admin/Change/{status}', 'AdminController@change')->middleware('auth');

Route::delete('Admin/Delete', 'AdminController@delete')->middleware('auth');

Route::get('/Admin/Add', 'AdminController@add')->middleware('auth');

Route::post('/Admin/Add', 'FormsController@newSupplier')->middleware('auth');

// Google
Route::get('/redirect/{provider}', 'Auth\AuthController@redirect');

Route::get('/callback/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::get('google', function () {
    return view('googleAuth');
});

// Authentication Routes
// Log in Routes...
Route::get('login', 'HomeController@mustLogin')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('logout', 'Auth\LoginController@logout');