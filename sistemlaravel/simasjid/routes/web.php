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
    Route::middleware('CheckStatus')->group(function () {
        //route keanggotaan
        Route::get('anggota', 'AnggotaController@index')->name('anggotaTerdaftar');
        Route::post('anggota/delete', 'AnggotaController@delete')->name('anggotaDelete');
        Route::post('anggota/edit', 'AnggotaController@edit')->name('anggotaEdit');
        Route::get('anggota/detail/{id}', 'AnggotaController@getDetail')->name('anggotaDetail');
        //Route::get('anggota/all', 'AnggotaController@getAllUn');
        Route::get('anggota/verifikasi', 'AnggotaController@getUnverifiedList')->name('anggotaBlmVerifikasi');
        // Route::get('anggota/verifikasi/{id}', 'AnggotaController@verify')->name('anggotaSetujuVerif');
        Route::post('anggota/verifikasi/tolak', 'AnggotaController@tolak')->name('anggotaTolakVerif');
        Route::post('anggota/verifikasi/terima', 'AnggotaController@terima')->name('anggotaTerimaVerif');
        Route::get('anggota/pengelolaaset', 'AnggotaController@pengelola_aset_index')->name('anggotaPengelolaAset');
        Route::post('anggota/pengelolaaset/delete', 'AnggotaController@pengelola_aset_delete')->name('anggotaPengelolaAsetDelete');
        Route::post('anggota/pengelolaaset/add', 'AnggotaController@pengelola_aset_add')->name('anggotaPengelolaAsetAdd');

        //route usulan
        Route::get('aset/usulan', 'UsulanController@index')->name('usulanTerdaftar');
        Route::post('aset/usulan/create', 'UsulanController@create')->name('usulanCreate');
        Route::post('aset/usulan/update', 'UsulanController@update')->name('usulanUpdate');
        Route::post('aset/usulan/delete', 'UsulanController@delete')->name('usulanDelete');
        Route::post('aset/usulan/edit', 'UsulanController@edit')->name('usulanEdit');
        Route::get('aset/usulan/detail/{id}', 'UsulanController@getDetail')->name('usulanDetail');
        Route::get('aset/usulan/show/{id}', 'UsulanController@getDetail')->name('usulanDetail');
        Route::post('aset/usulan/verifikasi/tolak', 'UsulanController@tolak')->name('usulanTolak');
        Route::post('aset/usulan/verifikasi/terima', 'UsulanController@verif')->name('usulanAcc');

        //route pembelian
        Route::get('aset/pembelian', 'PembelianController@index')->name('pembelianTerdaftar');
        Route::post('aset/pembelian/create', 'PembelianController@create')->name('pembelianCreate');
        Route::post('aset/pembelian/update', 'PembelianController@update')->name('pembelianUpdate');
        Route::post('aset/pembelian/delete', 'PembelianController@delete')->name('pembelianDelete');
        Route::post('aset/pembelian/edit', 'PembelianController@edit')->name('pembelianEdit');
        Route::get('aset/pembelian/detail/{id}', 'PembelianController@getDetail')->name('pembelianDetail');
        Route::post('aset/pembelian/sudahDibeli', 'PembelianController@sudahDibeli')->name('pembelianSudahBeli');
        Route::post('aset/pembelian/sudahDiterima', 'PembelianController@sudahDiterima')->name('pembelianSudahDiterima');





        //route kategori_aset
        Route::get('aset/kategori', 'Kategori_asetController@index')->name('kategoriTerdaftar');
        Route::get('aset/kategori/get/{jenis_aset}', 'Kategori_asetController@get')->name('kategoriGetByJenis');
        Route::post('aset/kategori/create', 'Kategori_asetController@create')->name('kategoriCreate');
        Route::get('aset/kategori/delete', 'Kategori_asetController@delete')->name('kategoriDelete');

        Route::get('aset', 'AsetController@index')->name('asetMaster');
        Route::post('aset', 'AsetController@selectKategori')->name('asetMasterSelectKategori');
        // Route::get('aset/kategori','AsetController@kategori')->name('asetKategori');
    });

    //route profil
    Route::get('/profile', 'ProfileController@index')->name('profile');
    //route upload foto profil
    Route::post('/profile', 'ProfileController@uploadFoto')->name('uploadFotoProfile');
});


//route home
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', '')->redirect(route('home'));
