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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('login');
// });
Auth::routes();

// Route::get('login', 'AuthController@login')->name('login');
// Route::post('login', 'AuthController@auth')->name('auth');
// Route::get('logout', 'AuthController@logout')->name('logout');

// Route::get('/', 'HomeController@index')->name('homePage');



// Mutasi action
// Route::group(['prefix' => '/mutasi', 'as' => 'mutasi.'], function(){
//     Route::put('/store', ['as' => 'store', 'uses' => 'MutasiController@Store_Mutasi']);
//     Route::get('/{mutasi}/edit', ['as' => 'edit', 'uses' => 'MutasiController@StockView_EditMutasi']);
//     Route::put('/{mutasi}/penerimaan', ['as' => 'diterima', 'uses' => 'MutasiController@Update_PenerimaanStock']);
//     Route::delete('/{mutasi}', ['as' => 'destroy', 'uses' => 'MutasiController@Destroy_Mutasi']);
// });

//basic route login,register,reset-password
Auth::routes();

//route home
Route::get('/', 'HomeController@index')->name('home');

//route profil dan upload foto profil
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@uploadFoto')->name('uploadFotoProfile');

//route keanggotaan
Route::get('anggota', 'AnggotaController@index')->name('anggotaTerdaftar');
Route::get('anggota/verifikasi', 'AnggotaController@verifikasi')->name('anggotaVerifikasi');
Route::get('anggota/edit', 'AnggotaController@edit')->name('anggotaEdit');
