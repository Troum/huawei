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

Route::get('/','IndexController@index');
Route::get('/cities', 'IndexController@cities');
Route::get('/districts', 'IndexController@districts');
Route::get('/regions', 'IndexController@regions');
Route::post('/register-in-game', 'IndexController@check');
Route::post('/send-feedback', 'IndexController@feedback');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home/{id}', 'HomeController@open');

Route::get('/home/mistakes/{mistakes}', 'HomeController@mistakes');
Route::get('/home/declined/{declined}', 'HomeController@declined');
Route::get('/home/check/{status}', 'HomeController@status');

Route::post('/home/send-sms', 'HomeController@approve');
Route::post('/home/decline-sms', 'HomeController@decline');
Route::post('/home/add-participant', 'HomeController@add');


Route::get('/home/find/{needle}', 'SearchController@search');

Route::get('/home/edit/{edit}', 'EditController@edit');
Route::post('/home/save-participant', 'EditController@save');
Route::post('/home/save-approved', 'EditController@saveApproved');
