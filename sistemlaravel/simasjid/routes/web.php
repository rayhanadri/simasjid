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

// basic route login,register,reset-password
Auth::routes();


//pakai middleware auth
Route::middleware(['auth', 'CheckStatus'])->group(function () {
    //route keanggotaan
    Route::get('anggota', 'AnggotaController@index')->name('anggotaTerdaftar');
    Route::get('anggota/all', 'AnggotaController@getAllUn');
    Route::get('anggota/detail/{id}', 'AnggotaController@getDetail')->name('anggotaDetail');
    Route::get('anggota/verifikasi', 'AnggotaController@getUnverifiedList')->name('anggotaBlmVerifikasi');
    // Route::get('anggota/verifikasi/{id}', 'AnggotaController@verify')->name('anggotaSetujuVerif');
    Route::post('anggota/verifikasi/tolak', 'AnggotaController@tolak')->name('anggotaTolakVerif');
    Route::post('anggota/verifikasi/terima', 'AnggotaController@verif')->name('anggotaAccVerif');
    Route::get('anggota/edit/{id}', 'AnggotaController@edit')->name('anggotaDelete');

});

//route profil
Route::get('/profile', 'ProfileController@index')->name('profile');
//route upload foto profil
Route::post('/profile', 'ProfileController@uploadFoto')->name('uploadFotoProfile');

//route home
Route::get('/', 'HomeController@index')->name('home');
