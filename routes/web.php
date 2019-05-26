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

// Home and Update Password Routes

Route::get('/', 'PagesController@index');
Route::get('/update-password', 'PagesController@showUpdatePasswordForm');
Route::put('/update-password', 'PagesController@updatePassword');

// Clients Routes
Route::resource('/clients', 'ClientsController');

// Invoice Routes
Route::resource('/clients.invoices', 'InvoicesController', ['except' => [
    'update', 'edit'
]]);

// Project Routes
Route::resource('/clients.projects', 'ProjectsController', ['except' => [
    'update', 'edit'
]]);
// Admin Routes
Route::resource('/admins', 'AdminsController', ['except' => [
    'show'
]]);

// Authentication Routes
Route::get('/signed-login/{user}{path?}', 'Auth\\LoginController@loginSignedUrl')->name('signedLogin')->middleware('signed');
Auth::routes();

// Routes for logged in clients only
Route::get('/invoices', 'ClientsOnlyController@allInvoices');
Route::get('/invoices/{id}', 'ClientsOnlyController@showInvoice');
Route::get('/invoices/{id}/pay', 'ClientsOnlyController@payInvoice');
Route::post('/invoices/{id}', 'ClientsOnlyController@paidInvoice');

Route::get('/projects', 'ClientsOnlyController@allProjects');
Route::get('/projects/{id}', 'ClientsOnlyController@showProject');
Route::get('/projects/{id}/accept', 'ClientsOnlyController@acceptProject');


// Project Chats Routes
Route::resource('/projects.chats', 'ChatController');
