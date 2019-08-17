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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Mutasi action
Route::group(['prefix' => '/mutasi', 'as' => 'mutasi.'], function(){
    Route::put('/store', ['as' => 'store', 'uses' => 'MutasiController@Store_Mutasi']);
    Route::get('/{mutasi}/edit', ['as' => 'edit', 'uses' => 'MutasiController@StockView_EditMutasi']);
    Route::put('/{mutasi}/penerimaan', ['as' => 'diterima', 'uses' => 'MutasiController@Update_PenerimaanStock']);
    Route::delete('/{mutasi}', ['as' => 'destroy', 'uses' => 'MutasiController@Destroy_Mutasi']);
});
