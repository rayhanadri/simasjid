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

    //route home
    Route::get('/', 'HomeController@index')->name('home');

    // group untuk anggota aktif
    Route::middleware('CheckStatus')->group(function () {
        Route::get('anggota', 'Anggota\AnggotaController@dasbor')->name('anggotaDasbor');
        //route keanggotaan
        Route::get('anggota/terdaftar', 'Anggota\AnggotaController@index')->name('anggotaTerdaftar');
        Route::get('anggota/detail/{id}', 'Anggota\AnggotaController@getDetail')->name('anggotaDetail');
        //edit, delete anggota
        Route::post('anggota/delete', 'Anggota\AnggotaController@delete')->name('anggotaDelete');
        Route::post('anggota/edit', 'Anggota\AnggotaController@edit')->name('anggotaEdit');
        
        //verifikasi anggota
        Route::get('anggota/verifikasi', 'Anggota\VerifikasiController@index')->name('anggotaBlmVerifikasi');
        Route::post('anggota/verifikasi/tolak', 'Anggota\VerifikasiController@tolak')->name('anggotaTolakVerif');
        Route::post('anggota/verifikasi/terima', 'Anggota\VerifikasiController@terima')->name('anggotaTerimaVerif');

        //anggota pengelola aset
        Route::get('anggota/pengelola-aset', 'Anggota\PengelolaAsetController@index')->name('anggotaPengelolaAset');
        Route::post('anggota/pengelola-aset/delete', 'Anggota\PengelolaAsetController@delete')->name('anggotaPengelolaAsetDelete');
        Route::post('anggota/pengelola-aset/add', 'Anggota\PengelolaAsetController@create')->name('anggotaPengelolaAsetAdd');

        //route aset
        Route::get('aset', 'DasborAsetController@dasbor')->name('asetDasbor');

        //route usulan
        Route::get('aset/usulan', 'UsulanController@index')->name('usulanTerdaftar');
        Route::post('aset/usulan/create', 'UsulanController@create')->name('usulanCreate');
        Route::post('aset/usulan/update', 'UsulanController@update')->name('usulanUpdate');
        Route::post('aset/usulan/delete', 'UsulanController@delete')->name('usulanDelete');
        Route::post('aset/usulan/edit', 'UsulanController@edit')->name('usulanEdit');
        Route::get('aset/usulan/detail/{id}', 'UsulanController@getDetail')->name('usulanDetail');
        Route::get('aset/usulan/view/{id}', 'UsulanController@getView')->name('usulanView');
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

        //route kategori
        Route::get('aset/kategori', 'KategoriController@index')->name('kategoriTerdaftar');
        Route::get('aset/kategori/list', 'KategoriController@list')->name('kategoriList');
        Route::post('aset/kategori/create', 'KategoriController@create')->name('kategoriCreate');
        Route::get('aset/kategori/delete', 'KategoriController@delete')->name('kategoriDelete');

        //route katalog
        Route::get('aset/katalog', 'KatalogController@index')->name('katalogTerdaftar');
        Route::get('aset/katalog/byKategori/{id}', 'KatalogController@byKategori')->name('katalogByKategori');
        Route::post('aset/katalog', 'KatalogController@indexSelected')->name('katalogSelected');

        //route katalog
        Route::get('aset/lokasi', 'LokasiController@index')->name('lokasiTerdaftar');

        // Route::get('aset', 'AsetController@index')->name('asetMaster');
        // Route::post('aset', 'AsetController@selectKategori')->name('asetMasterSelectKategori');
        // Route::get('aset/kategori','AsetController@kategori')->name('asetKategori');
    });

    //route profil
    Route::get('/profile', 'ProfileController@index')->name('profile');
    //route upload foto profil
    Route::post('/profile', 'ProfileController@uploadFoto')->name('uploadFotoProfile');
});


// //route home
// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', '')->redirect(route('home'));
