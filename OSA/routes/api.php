<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/Reviews/{id}/{page}', 'ReviewsController@view');

Route::get('/Admin/Get/{id}', 'AdminController@view')->middleware('role:Admin');

Route::put('/Admin/Edit/{id}', 'AdminController@edit')->middleware('role:Admin');

Route::put('/Admin/Change/{status}', 'AdminController@change')->middleware('role:Admin');

Route::delete('/Admin/Delete', 'AdminController@delete')->middleware('role:Admin');

Route::get('/admin/add', 'AdminController@add')->middleware('role:Admin');

Route::post('/Admin/Add', 'FormsController@newSupplier')->middleware('role:Admin');

Route::post('/admin/new-admin', 'AdminController@newAdmin')->middleware('role:Admin');

Route::post('/admin/changeTags', 'AdminController@addTags')->middleware('role:Admin');

// Google
Route::get('/redirect/{provider}', 'Auth\AuthController@redirect');

Route::get('/google', function () {
    return view('googleAuth');
});