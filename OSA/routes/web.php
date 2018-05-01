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

Route::post('/comment','HomeController@comment');

Route::get('/suggestion', 'FormsController@suggestionPage');

Route::post('/suggestion', array ('uses'=>'FormsController@newSuggestion'));

Route::resource('/supplier', 'SupplierController');

Route::get('/Admin/View/{view}', 'AdminController@index');

Route::get('/Admin/Get/{id}', 'AdminController@view');

Route::get('/Reviews/{id}/{page}', 'ReviewsController@view');

Route::put('/Admin/Edit/{id}', 'AdminController@edit');

Route::put('/Admin/Change/{status}', 'AdminController@change');

Route::delete('Admin/Delete', 'AdminController@delete');

Route::get('/Admin/Add', 'AdminController@add');

Route::post('/Admin/Add', 'FormsController@newSupplier');

// Google
Route::get('/redirect/{provider}', 'Auth\AuthController@redirect');

Route::get('/callback/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::get('google', function () {
    return view('googleAuth');
});

// Authentication Routes
// Log in Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('logout', 'Auth\LoginController@logout');