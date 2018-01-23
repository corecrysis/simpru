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

Route::get('/', ['as' => 'simpruHome', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'app', 'uses' => 'HomeController@index']);
Route::get('/flush', ['as' => 'flush', 'uses' => 'BookingController@flush']);
Route::get('/faq', ['as' => 'Faq', 'uses' => 'PageController@faq']);
Route::get('/about', ['as' => 'About', 'uses' => 'PageController@about']);
Route::get('/cek/{id_ruangan}', ['as' => 'cek', 'uses' => 'BookingController@getJadwal']);

Auth::routes();

Route::get('loginInternal', 'Auth\LoginIntegraController@showLoginForm')->name('integra.login');
Route::get('registerInternal', 'Auth\RegisterIntegraController@showRegisterForm')->name('integra.register');
Route::post('registerInternal', 'Auth\RegisterIntegraController@register')->name('integra.register.submit');
Route::post('loginInternal', 'Auth\LoginIntegraController@login')->name('integra.login.submit');

Route::group(['prefix' => 'layanan'], function () {
    Route::get('/', ['as' => 'Layanan', 'uses' => 'LayananController@index']);
    Route::get('/kategori/{id}', ['as' => 'Layanan', 'uses' => 'LayananController@kategori']);
    Route::get('/searchDate', ['as' => 'SerachDate', 'uses' => 'LayananController@searchDate']);
    Route::get('/searchQuery', ['as' => 'SearchQuery', 'uses' => 'LayananController@searchQuery']);
    Route::get('/searchKapasitas', ['as' => 'SearchKapasitas', 'uses' => 'LayananController@searchKapasitas']);
//    Route::get('/detail_choose/{id_ruangan}', ['as' => 'Detail', 'uses' => 'LayananController@detail'])->middleware('auth');
    Route::get('/detail/{id_ruangan}', ['as' => 'Detail', 'uses' => 'LayananController@detail']);
});

Route::group(['prefix' => 'pengguna'], function () {
    Route::get('/', ['as' => 'penggunaHome', 'uses' => 'DashboardController@index']);
    Route::get('/transaksi', ['as' => 'transaksi', 'uses' => 'DashboardController@transaksi']);
    Route::put('/update', ['as' => 'updatePengguna', 'uses' => 'DashboardController@update']);
    Route::put('/uploadSurat/{id}', ['as' => 'uploadSurat', 'uses' => 'DashboardController@uploadSurat']);
//    Route::put('/uploadBukti', ['as' => 'uploadBukti', 'uses' => 'LayananController@uploadBukti']);
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/', ['as' => 'CreateBooking', 'uses' => 'BookingController@index']);
    Route::post('/addBooking', ['as' => 'AddBooking', 'uses' => 'BookingController@addBooking']);
    Route::get('/updateCartBook', ['as' => 'UpdateBooking', 'uses' => 'BookingController@updateCartBook']);
    Route::post('/storeBooking', ['as' => 'Booking', 'uses' => 'BookingController@storeBooking']);
    Route::delete('/hapusBook/{rowId}', ['as' => 'deleteBook', 'uses' => 'BookingController@deleteBook']);
    Route::get('/getPilihJadwal/{id_ruangan}', ['as' => 'getPilihJadwal', 'uses' => 'BookingController@getPilihJadwal']);
    Route::get('/getPilihEditJadwal/{rowId}/{id_ruangan}', ['as' => 'getPilihEditJadwal', 'uses' => 'BookingController@getPilihEditJadwal']);
    Route::get('/lihatDaftar', ['as' => 'lihatDaftar', 'uses' => 'BookingController@daftarPeminjaman']);
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/home', ['as' => 'homepageAdmin', 'uses' => 'KategoriController@home']);
    Route::get('/', 'KategoriController@home')->name('admin.home');
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register.submit');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group(['prefix' => 'blacklistpengguna'], function () {
        Route::get('/create', ['as' => 'createBlacklistpengguna', 'uses' => 'BlacklistController@createBlacklistpengguna']);
        Route::get('/', ['as' => 'Index', 'uses' => 'BlacklistController@index']);
        Route::post('/insert', ['as' => 'insertblpengguna', 'uses' => 'BlacklistController@insertblpengguna']);
        Route::get('/edit/{id}', ['as' => 'editblpengguna', 'uses' => 'BlacklistController@editblpengguna']);
        Route::put('/update/{id}', ['as' => 'updateblpengguna', 'uses' => 'BlacklistController@updateblpengguna']);
        Route::delete('/destroy/{id}', ['as' => 'deleteblpengguna', 'uses' => 'BlacklistController@deleteblpengguna']);
    });
    Route::group(['prefix' => 'booking'], function () {
        Route::get('/', ['as' => 'Index', 'uses' => 'BookingController@index']);
        Route::get('/validview', ['as' => 'Index', 'uses' => 'BookingController@validviewbook']);
        Route::get('/create', ['as' => 'createBooking', 'uses' => 'BookingController@create']);
        Route::get('/getDisabledIntervals/{id_ruang}/{tanggal}', ['as' => 'getDisabledIntervals', 'uses' => 'BookingController@getDisabledIntervals']);
        Route::get('/getPilihJadwal/{id_ruangan}', ['as' => 'getPilihJadwal', 'uses' => 'BookingController@getPilihJadwal']);
        Route::get('/getPilihEditJadwal/{rowId}/{id_ruangan}', ['as' => 'getPilihEditJadwal', 'uses' => 'BookingController@getPilihEditJadwal']);
        Route::post('/insert', ['as' => 'insertBooking', 'uses' => 'BookingController@insert']);
        Route::get('/edit/{id}', ['as' => 'editBooking', 'uses' => 'BookingController@edit']);
        Route::put('/update/{id}', ['as' => 'updateBooking', 'uses' => 'BookingController@update']);
        Route::put('/verif', ['as' => 'validasiBooking', 'uses' => 'BookingController@verifikasiBooking']);
//        Route::put('/terima', ['as' => 'validasiBooking', 'uses' => 'BookingController@terimaBooking']);
        Route::delete('/destroy', ['as' => 'deleteBooking', 'uses' => 'BookingController@destroy']);
        Route::post('/addBooking', ['as' => 'AddAdminBooking', 'uses' => 'BookingController@addBooking']);
        Route::get('/updateAdminBook', ['as' => 'UpdateAdminBooking', 'uses' => 'BookingController@updateAdminBook']);
        Route::delete('/hapusBook/{rowId}', ['as' => 'deleteAdminBook', 'uses' => 'BookingController@deleteBook']);
    });
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/create', ['as' => 'createkategori', 'uses' => 'KategoriController@createKategori']);
        Route::get('/createdept', ['as' => 'createkategori', 'uses' => 'KategoriController@createdeptKategori']);
        Route::put('/aktif/{id_kategori_ruangan}', ['as' => 'aktifkategori', 'uses' => 'KategoriController@aktifKategori']);
        Route::put('/nonaktif/{id_kategori_ruangan}', ['as' => 'nonaktifKategori', 'uses' => 'KategoriController@nonaktifKategori']);
        Route::get('/', ['as' => 'Index', 'uses' => 'KategoriController@index']);
        Route::post('/insert', ['as' => 'insertkategori', 'uses' => 'KategoriController@insertKategori']);
        Route::get('/edit/{id}', ['as' => 'editKategori', 'uses' => 'KategoriController@editKategori']);
        Route::put('/update/{id}', ['as' => 'updateKategori', 'uses' => 'KategoriController@updateKategori']);
        Route::delete('/destroy/{id}', ['as' => 'deleteKategori', 'uses' => 'KategoriController@deleteKategori']);
    });
    Route::group(['prefix' => 'rekap'], function () {
        Route::get('/create', ['as' => 'createkategori', 'uses' => 'KategoriController@createKategori']);
        Route::get('/createdept', ['as' => 'createkategori', 'uses' => 'KategoriController@createdeptKategori']);
        Route::put('/aktif/{id_kategori_ruangan}', ['as' => 'aktifkategori', 'uses' => 'KategoriController@aktifKategori']);
        Route::get('/detail', ['as' => 'nonaktifKategori', 'uses' => 'RekapController@detail']);
        Route::get('/', ['as' => 'Index', 'uses' => 'RekapController@index']);
        Route::post('/insert', ['as' => 'insertkategori', 'uses' => 'KategoriController@insertKategori']);
        Route::get('/edit/{id}', ['as' => 'editKategori', 'uses' => 'KategoriController@editKategori']);
        Route::put('/update/{id}', ['as' => 'updateKategori', 'uses' => 'KategoriController@updateKategori']);
        Route::delete('/destroy/{id}', ['as' => 'deleteKategori', 'uses' => 'KategoriController@deleteKategori']);
    });
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/create', ['as' => 'createpengguna', 'uses' => 'PenggunaController@createPengguna']);
        Route::put('/aktif/{id_pengguna}', ['as' => 'aktifpengguna', 'uses' => 'PenggunaController@aktifPengguna']);
        Route::put('/nonaktif/{id_pengguna}', ['as' => 'nonaktifpenggunapengguna', 'uses' => 'PenggunaController@nonaktifPengguna']);
        Route::get('/', ['as' => 'Index', 'uses' => 'PenggunaController@index']);
        Route::post('/insert', ['as' => 'insertpengguna', 'uses' => 'PenggunaController@insertPengguna']);
        Route::get('/edit/{id}', ['as' => 'editpengguna', 'uses' => 'PenggunaController@editPengguna']);
        Route::put('/update/{id}', ['as' => 'updatepengguna', 'uses' => 'PenggunaController@updatePenggunaPengguna']);
        Route::delete('/destroy/{id}', ['as' => 'deletepengguna', 'uses' => 'PenggunaController@deletePengguna']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/create', ['as' => 'createAdmin', 'uses' => 'AdminController@createAdmin']);
        Route::put('/aktif/{id_admin}', ['as' => 'aktifAdmin', 'uses' => 'AdminController@aktifAdmin']);
        Route::put('/nonaktif/{id_admin}', ['as' => 'nonaktifAdmin', 'uses' => 'AdminController@nonaktifAdmin']);
        Route::get('/', ['as' => 'Index', 'uses' => 'AdminController@index']);
        Route::post('/insert', ['as' => 'insertAdmin', 'uses' => 'AdminController@insertAdmin']);
        Route::get('/edit/{id}', ['as' => 'editAdmin', 'uses' => 'AdminController@editAdmin']);
        Route::put('/update/{id}', ['as' => 'updateAdmin', 'uses' => 'AdminController@updateAdmin']);
        Route::delete('/destroy/{id}', ['as' => 'deleteAdmin', 'uses' => 'AdminController@deleteAdmin']);
    });
    Route::group(['prefix' => 'ruang'], function () {
        Route::get('/create', ['as' => 'createRuangan', 'uses' => 'RuangController@createRuangan']);
        Route::get('/createaturan/{id}', ['as' => 'createaturanRuangan', 'uses' => 'RuangController@createaturanRuangan']);
        Route::get('/viewruangan/{id}', ['as' => 'viewRuangan', 'uses' => 'RuangController@viewdetailRuangan']);
        Route::put('/aktif/{id_ruangan}', ['as' => 'aktifRuangan', 'uses' => 'RuangController@aktifRuangan']);
        Route::put('/nonaktif/{id_ruangan}', ['as' => 'nonaktifRuangan', 'uses' => 'RuangController@nonaktifRuangan']);
        Route::get('/', ['as' => 'Index', 'uses' => 'RuangController@index']);
        Route::post('/insert', ['as' => 'insertRuangan', 'uses' => 'RuangController@insertRuangan']);
        Route::post('/insertaturan', ['as' => 'insertRuangan', 'uses' => 'RuangController@insertaturanRuangan']);
        Route::get('/edit/{id}', ['as' => 'editRuangan', 'uses' => 'RuangController@editRuangan']);
        Route::put('/update/{id}', ['as' => 'updateRuangan', 'uses' => 'RuangController@updateRuangan']);
        Route::delete('/destroy/{id}', ['as' => 'deleteRuangan', 'uses' => 'RuangController@deleteRuangan']);
        Route::delete('/destroyAturan/{id}', ['as' => 'deleteAturan', 'uses' => 'RuangController@deleteAturan']);
        Route::get('/editAturan/{id}', ['as' => 'editAturan', 'uses' => 'RuangController@editAturan']);
        Route::put('/updateAturan/{id}', ['as' => 'updateAturan', 'uses' => 'RuangController@updateAturan']);
    });
});
