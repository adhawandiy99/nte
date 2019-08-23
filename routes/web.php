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
	Route::get('/','HomeController@index');

	//user
    Route::get('/teknisi','TeknisiController@index');
    Route::get('/teknisi/{id}','TeknisiController@input');
    Route::post('/teknisi/{id}','TeknisiController@save');
    Route::post('/deleteTeknisi/{id}','TeknisiController@delete');
	//order
    Route::get('/order','OrderController@index');
    Route::get('/order/{id}','OrderController@input');
    Route::post('/order/{id}','OrderController@save');
    Route::post('/deleteOrder/{id}','OrderController@delete');
	//material
    Route::get('/material','MaterialController@index');
    Route::get('/material/{id}','MaterialController@input');
    Route::post('/material/{id}','MaterialController@save');
    Route::post('/deleteMaterial/{id}','MaterialController@delete');
    //inbox teknisi
    Route::get('/inbox_order','TeknisiController@inbox');
    Route::get('/getDetail/{id}','OrderController@detail');
    Route::get('/progress/{id}','OrderController@progress');
    Route::post('/progress/{id}','OrderController@saveprogress');

    //report
    Route::get('/report1/{day}','ReportController@index');
    Route::get('/report2','ReportController@rekapMaterial');
    Route::get('/printpdf/{id}','ReportController@pdf');
    




    //so
    Route::get('/do','DoController@index');
    Route::get('/do/{id}','DoController@input');
    Route::post('/do/{id}','DoController@save');

    //pengeluaran
    Route::get('/out','PengeluaranController@index');
    Route::get('/cekNte/{sn}','PengeluaranController@cekNte');
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
    Route::get('/stokByModel/{model}','SearchController@stokByModel');

    Route::get('/logout','LoginController@logout');
});