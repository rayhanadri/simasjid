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
Route::middleware('auth')->group(function () {

    // group untuk anggota aktif
    Route::middleware('CheckStatus')->group( function () {
        //route keanggotaan
        Route::get('anggota', 'AnggotaController@index')->name('anggotaTerdaftar');
        // Route::get('anggota/edit/', 'AnggotaController@editList')->name('anggotaEditList');
        Route::post('anggota/delete', 'AnggotaController@delete')->name('anggotaDelete');
        Route::post('anggota/edit', 'AnggotaController@edit')->name('anggotaEdit');
        Route::get('anggota/detail/{id}', 'AnggotaController@getDetail')->name('anggotaDetail');
        //Route::get('anggota/all', 'AnggotaController@getAllUn');
        Route::get('anggota/verifikasi', 'AnggotaController@getUnverifiedList')->name('anggotaBlmVerifikasi');
        // Route::get('anggota/verifikasi/{id}', 'AnggotaController@verify')->name('anggotaSetujuVerif');
        Route::post('anggota/verifikasi/tolak', 'AnggotaController@tolak')->name('anggotaTolakVerif');
        Route::post('anggota/verifikasi/terima', 'AnggotaController@verif')->name('anggotaAccVerif');
    });

    //route profil
    Route::get('/profile', 'ProfileController@index')->name('profile');
    //route upload foto profil
    Route::post('/profile', 'ProfileController@uploadFoto')->name('uploadFotoProfile');
});


//route home
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', '')->redirect(route('home'));
Route::get('/kurban','KurbanController@index')->name('pekerjaan');
Route::get('/panitia','PanitiaKurbanController@index')->name('manajPanitia');
Route::patch('/panitia','PanitiaKurbanController@store')->name('tambahpanitia');
Route::post('/panitia/hapus','PanitiaKurbanController@destroy')->name('hapuspanitia');
Route::patch('/panitia/edit','PanitiaKurbanController@update')->name('editPanitia');