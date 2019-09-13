<?php


/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|Route::get('/url', [
|	'uses' => 'NamaController@function',
|	'as' => 'name'
|]);
|
*/

// Home User Interface
Route::get('/', [
	'uses' => 'LandingpageController@welcome',
	'as' => 'welcome'
]);

Route::get('/formPendaftaran', function () {
    return view('formPendaftaran.formPendaftaran');
});

Route::get('/master', function () {
    return view('layouts.master');
});

Route::post('/cari', [
    'uses' => 'PilihKecamatanController@loadData',
    'as' => 'cari'
]);

// Register
Route::get('/register', [
	'uses' => 'AuthController@register',
	'as' => 'register'
]);
Route::post('/post-register', [
	'uses' => 'AuthController@postRegister',
	'as' => 'post.register'
]);

// Login
Route::get('/login', [
	'uses' => 'AuthController@login',
	'as' => 'login'
]);

Route::post('/post-login', [
	'uses' => 'AuthController@postlogin',
	'as' => 'post.login'
]);

Route::get('/logout', [
	'uses' => 'AuthController@logout',
	'as' => 'logout'
]);


// Admin
Route::group(['middleware' => ['auth', 'checkRole:Admin']], function() {
	// Data Pengajar
    Route::get('/Maqdis/data-pengajar', [
        'uses' => 'PengajarController@index',
        'as' => 'dp.index'
    ]);

    Route::get('/Maqdis/tambah-pengajar', [
        'uses' => 'PengajarController@create',
        'as' => 'dp.create'
    ]);

    Route::post('/Maqdis/store-pengajar', [
        'uses' => 'PengajarController@store',
        'as' => 'dp.store'
    ]);

    Route::get('/Maqdis/edit/{pengajar}/pengajar', [
        'uses' => 'PengajarController@edit',
        'as' => 'dp.edit'
    ]);

    Route::post('/Maqdis/update/{pengajar}/pengajar', [
        'uses' => 'PengajarController@update',
        'as' => 'dp.update'
    ]);

    Route::get('/Maqdis/destroy/{pengajar}/pengajar', [
        'uses' => 'PengajarController@destroy',
        'as' => 'dp.destroy'
    ]);

    // Jadwal Pengajar
    Route::get('/Maqdis/jadwal-pengajar', [
        'uses' => 'JadwalPengajarController@index',
        'as' => 'jp.index'
    ]);

    Route::get('/Maqdis/tambah-jadwal', [
        'uses' => 'JadwalPengajarController@create',
        'as' => 'jp.create'
    ]);

    Route::POST('/cari', [
        'uses' => 'JadwalPengajarController@show',
        'as' => 'autocomplete.fetch'
    ]);

    Route::post('/Maqdis/store-jadwal', [
        'uses' => 'JadwalPengajarController@store',
        'as' => 'jp.store'
    ]);

    Route::get('/Maqdis/edit/{jadwal}/jadwal-pengajar', [
        'uses' => 'JadwalPengajarController@edit',
        'as' => 'jp.edit'
    ]);

    Route::post('/Maqdis/update/{jadwal}/jadwal-pengajar', [
        'uses' => 'JadwalPengajarController@update',
        'as' => 'jp.update'
    ]);

    Route::get('/Maqdis/destroy/{jadwal}/jadwal-pengajar', [
        'uses' => 'JadwalPengajarController@destroy',
        'as' => 'jp.destroy'
    ]);

    // Data Peserta
    Route::get('/Maqdis/data-peserta', [
        'uses' => 'PesertaController@index',
        'as' => 'ds.index'
    ]);

    Route::get('/Maqdis/destroy/{user}/peserta', [
        'uses' => 'PesertaController@destroy',
        'as' => 'ds.destroy'
    ]);

    // Jadwal Peserta
    Route::get('/Maqdis/jadwal-peserta', [
        'uses' => 'JadwalPesertaController@index',
        'as' => 'jpeserta.index'
    ]);

});

// Pengajar
Route::group(['middleware' => ['auth', 'checkRole:Admin,Pengajar']], function() {

});

// Peserta
Route::group(['middleware' => ['auth', 'checkRole:Admin,Pengajar,Peserta']], function() {
	Route::get('/Maqdis/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

    Route::get('Maqdis/daftar-program', [
        'uses' => 'ProgramController@index',
        'as' => 'daftar.index'
    ]);

    Route::get('Maqdis/search-pengajar', [
        'uses' => 'PengajarController@search',
        'as' => 'search.pengajar'
    ]);

    Route::get('/test/{id}', [
        'uses' => 'PilihKecamatanController@show',
        'as' => 'test.prog'
    ]);

    Route::post('Maqdis/cari-pengajar',[
        'uses' => 'PengajarController@show',
        'as' => 'cp'
    ]);

    Route::post('Maqdis/pembayaran',[
        'uses' => 'PembayaranController@index',
        'as' => 'cobaan'
    ]);

    Route::post('Maqdis/store-pembayaran',[
        'uses' => 'PembayaranController@store',
        'as' => 'bayar'
    ]);

    // Jadwal Pertemuan

    Route::get('Maqdis/jadwal-pertemuan', [
        'uses' => 'PembayaranController@jadwalpertemuan',
        'as' => 'jadwal.pertemuan'
    ]);

    // Jadwal Pertemuan ID

    Route::get('Maqdis/jadwal-pertemuan/{id}', [
        'uses' => 'JadwalPesertaController@kelompok',
        'as' => 'jadwal.temuid'
    ]);

    // Status Pembayaran
    Route::get('Maqdis/status-pembayaran', [
        'uses' => 'PembayaranController@statuspembayaran',
        'as' => 'status.pembayaran'
    ]);

    // Cek Peserta
    Route::get('Maqdis/tambah/{id}/teman', [
        'uses' => 'PesertaController@cek',
        'as' => 'cek.peserta'
    ]);

    // Tambah Teman
    Route::post('Maqdis/store/{id}/teman', [
        'uses' => 'PesertaController@store',
        'as' => 'tambah.kelompok'
    ]);

});
