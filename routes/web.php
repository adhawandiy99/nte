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


Route::get('/login', function () {
    return view('login');
});
Route::post('/login','LoginController@ceklogin');
Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function () {
    return view('welcome');
	});
	//user
	Route::get('/user','UserController@index');
  Route::get('/user/{id}','UserController@input');
  Route::post('/user/{id}','UserController@save');
  Route::post('/deleteUser/{id}','UserController@delete');

  //do
	Route::get('/do','DoController@index');
  Route::get('/do/{id}','DoController@input');
  Route::post('/do/{id}','DoController@save');

  //pengeluaran
  Route::get('/out','PengeluaranController@index');
  Route::get('/out/{id}','PengeluaranController@input');
  Route::post('/out/{id}','PengeluaranController@save');

  //opname
  Route::get('/opname','OpnameController@index');
  Route::get('/opname/{id}','OpnameController@input');
  Route::post('/opname/{id}','OpnameController@save');
  Route::post('/opnameListItem/{id}','OpnameController@saveItem');
  Route::get('/opnameListItem/{id}','OpnameController@listItem');


  //info

  Route::get('/searchitem','SearchController@item');
  Route::get('/searchdo','SearchController@do');
  Route::get('/infoout','SearchController@pengeluaran');
  Route::get('/infostok','SearchController@stok');

	Route::get('/logout','LoginController@logout');
});