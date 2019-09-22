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
	// Verifikasi Pembayaran
    Route::get('Maqdis/verifikasi-pembayaran', [
        'uses' => 'KonfirmasiPembayaranController@index',
        'as' => 'konfirmasipem.index'
    ]);

    Route::get('Maqdis/pembayaran-terverifikasi', [
        'uses' => 'KonfirmasiPembayaranController@terverifikasi',
        'as' => 'terverifikasi.index'
    ]);

    Route::post('Maqdis/update/verifikasi-pembayaran', [
        'uses' => 'KonfirmasiPembayaranController@update',
        'as' => 'konfirmasipem.update'
    ]);

    Route::get('Maqdis/destroy/{pembayaran}/verifikasi-pembayaran', [
        'uses' => 'KonfirmasiPembayaranController@destroy',
        'as' => 'konfirmasipem.destroy'
    ]);

    Route::get('Maqdis/destroy/{pembayaran}/pembayaran-terverifikasi', [
        'uses' => 'KonfirmasiPembayaranController@destroyterverifikasi',
        'as' => 'terverifikasi.destroy'
    ]);

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

     // Data Pengguna
    Route::get('/Maqdis/data-pengguna', [
        'uses' => 'PenggunaController@index',
        'as' => 'pengguna.index'
    ]);

    Route::get('/Maqdis/tambah-pengguna', [
        'uses' => 'PenggunaController@create',
        'as' => 'pengguna.create'
    ]);

    Route::post('/Maqdis/store-pengguna', [
        'uses' => 'PenggunaController@store',
        'as' => 'pengguna.store'
    ]);

    Route::get('/Maqdis/reset/{id}/password', [
        'uses' => 'PenggunaController@resetpw',
        'as' => 'pengguna.reset'
    ]);

    Route::get('/Maqdis/edit/{user}/pengguna', [
        'uses' => 'PenggunaController@edit',
        'as' => 'pengguna.edit'
    ]);

    Route::post('/Maqdis/update/{user}/pengguna', [
        'uses' => 'PenggunaController@update',
        'as' => 'pengguna.update'
    ]);

    Route::get('/Maqdis/destroy/{user}/pengguna', [
        'uses' => 'PenggunaController@destroy',
        'as' => 'pengguna.destroy'
    ]);

    // Jadwal Peserta
    Route::get('/Maqdis/jadwal-peserta', [
        'uses' => 'JadwalPesertaController@index',
        'as' => 'jpeserta.index'
    ]);

    // Rekap Absensi
    Route::get('/Maqdis/rekap-kehadiran/peserta', [
        'uses' => 'AbsensiController@index',
        'as' => 'absen.index'
    ]);

    // Hapus Kelompok Peserta
    Route::get('/Maqdis/destroy-peserta/{kelompokpeserta}/kelompok', [
        'uses' => 'JadwalPesertaController@destroykelompok',
        'as' => 'kelompokpeserta.destroykelompok'
    ]);

    // Konfirmasi Lanjut Program
    Route::get('/Maqdis/konfirmasi-lanjut/program', [
        'uses' => 'KonfirmasiProgramController@index',
        'as' => 'konfirmasi.index'
    ]);
});

// Pengajar
Route::group(['middleware' => ['auth', 'checkRole:Admin,Pengajar']], function() {
    // Absensi Pengajar
    Route::get('Maqdis/absensi-pengajar', [
        'uses' => 'AbsensiController@absensipengajar',
        'as' => 'absen.pengajar'
    ]);

    Route::post('Maqdis/update/{id}/identitasguru', [
        'uses' => 'PengajarController@updateidentitas',
        'as' => 'update.identitasguru'
    ]);

    // Post Absensi Pengajar
    Route::post('Maqdis/store-absensi-pengajar', [
        'uses' => 'AbsensiController@store_pengajar',
        'as' => 'absen.store_pengajar'
    ]);

    Route::get('Maqdis/jadwal-mengajar', [
        'uses' => 'PembayaranController@jadwalpengajar',
        'as' => 'jadwal.pengajar'
    ]);

});

// Peserta
Route::group(['middleware' => ['auth', 'checkRole:Admin,Pengajar,Peserta']], function() {
	Route::get('/Maqdis/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

    // Update Identitas Peserta
    Route::post('Maqdis/update/{id}/identitas', [
        'uses' => 'PesertaController@update',
        'as' => 'update.identitas'
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
    Route::get('Maqdis/tambah/{users}/teman/{pembayaran}', [
        'uses' => 'PesertaController@cek',
        'as' => 'cek.peserta'
    ]);

    // Tambah Teman
    Route::post('Maqdis/store/{user}/teman/{pembayaran}', [
        'uses' => 'PesertaController@store',
        'as' => 'tambah.kelompok'
    ]);

    // Profile Pengguna
    Route::get('/Maqdis/profile/{user}/pengguna', [
        'uses' => 'PenggunaController@profile',
        'as' => 'pengguna.proflie'
    ]);

    // Konfirmasi Teman
    Route::post('/Maqdis/konfirm/teman', [
        'uses' => 'PesertaController@konfirmasigrup',
        'as' => 'konfir.grup'
    ]);

    Route::post('/Maqdis/konfirm/teman/delete', [
        'uses' => 'PesertaController@konfirmasidelete',
        'as' => 'konfir.delete'
    ]);

    // Ganti Foto Profile
    Route::post('foto-post/{id}', [
        'uses' => 'PesertaController@gantifoto',
        'as' => 'update.foto'
    ]);

    Route::get('/Maqdis/ubah/{user}/password-pengguna', [
        'uses' => 'PenggunaController@ubahpw',
        'as' => 'pengguna.ubahpw'
    ]);

    Route::post('/Maqdis/update/{id}/password-pengguna', [
        'uses' => 'PenggunaController@updatePassword',
        'as' => 'pengguna.up'
    ]);

    // Struk
    Route::post('struk-post/{id}', [
        'uses' => 'PembayaranController@update',
        'as' => 'update.struk'
    ]);

    // Absensi Peserta
    Route::get('Maqdis/absensi-peserta', [
        'uses' => 'AbsensiController@absensipeserta',
        'as' => 'absen.peserta'
    ]);

    // Kelompok Peserta
    Route::get('Maqdis/kelompok/{kelompok}/peserta', [
        'uses' => 'JadwalPesertaController@kelompok',
        'as' => 'kelompok.peserta'
    ]);

    // Post Absensi Peserta
    Route::post('Maqdis/store-absensi-peserta', [
        'uses' => 'AbsensiController@store',
        'as' => 'absen.store'
    ]);

    Route::post('Maqdis/store/absensi-peserta', [
        'uses' => 'AbsensiController@storepes',
        'as' => 'absen.storepes'
    ]);

});
