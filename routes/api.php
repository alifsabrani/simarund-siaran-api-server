<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', 'AuthController@login');
Route::get('siaran/download/{siaran}', 'SiaranController@download');
Route::group(['middleware' => 'jwt.auth'], function () {
   Route::get('jadwal/siaran_lokal', 'JadwalController@lokal');
   Route::get('jadwal/siaran_non_lokal', 'JadwalController@nonLokal');
   Route::put('jadwal', 'JadwalController@update');
   Route::get('jadwal', 'JadwalController@index');

   Route::get('item', 'ItemController@index');
   Route::get('item/{item}', 'ItemController@show');
   Route::post('item', 'ItemController@store');
   Route::put('item/{item}', 'ItemController@update');
   Route::delete('item/{item}', 'ItemController@delete');

   Route::get('berita_daerah', 'BeritaDaerahController@index');
   Route::get('berita_daerah/{berita}', 'BeritaDaerahController@show');
   Route::post('berita_daerah', 'BeritaDaerahController@store');
   Route::put('berita_daerah/{berita}', 'BeritaDaerahController@update');
   Route::delete('berita_daerah/{berita}', 'BeritaDaerahController@delete');

   Route::get('berita', 'BeritaController@index');
   Route::get('berita/{berita}', 'BeritaController@show');
   Route::post('berita', 'BeritaController@store');
   Route::put('berita/{berita}', 'BeritaController@update');
   Route::delete('berita/{berita}', 'BeritaController@delete');

   Route::delete('berita', 'ItemController@destroyMany');

   Route::get('siaran/utama/{tanggal}', 'SiaranController@show_utama');
   Route::get('siaran/tambahan/{tanggal}', 'SiaranController@show_tambahan');
   Route::get('siaran/{siaran}/item/{item}', 'SiaranController@show');
   Route::post('siaran/item/{siaran?}', 'SiaranController@store');
   Route::put('siaran/{siaran}/item/{item}', 'SiaranController@update');
   Route::delete('siaran/{siaran}/item/{item}', 'SiaranController@delete');

   Route::get('pegawai/alias', 'PegawaiController@alias');
   Route::get('pegawai', 'PegawaiController@index');
   Route::get('pegawai/{pegawai}', 'PegawaiController@show');
   Route::post('pegawai', 'PegawaiController@store');
   Route::put('pegawai/{pegawai}', 'PegawaiController@update');
   Route::delete('pegawai/{pegawai}', 'PegawaiController@delete');

   Route::get('pengguna', 'PenggunaController@index');
   Route::get('pengguna/{pengguna}', 'PenggunaController@show');
   Route::post('pengguna', 'PenggunaController@store');
   Route::put('pengguna/{pengguna}', 'PenggunaController@update');
   Route::delete('pengguna/{pengguna}', 'PenggunaController@delete');

   Route::get('kategori/nama_siaran_lokal', 'KategoriController@namaSiaranLokal');
   Route::get('kategori/nama_siaran_non_utama', 'KategoriController@namaSiaranNonUtama');
   Route::get('kategori/nama_siaran_non_lokal', 'KategoriController@namaSiaranNonLokal');
   Route::get('kategori', 'KategoriController@index');
   Route::get('kategori/{kategori}', 'KategoriController@show');
   Route::post('kategori', 'KategoriController@store');
   Route::put('kategori/{kategori}', 'KategoriController@update');
   Route::delete('kategori/{kategori}', 'KategoriController@delete');

   Route::get('petugas_siaran/{siaran}', 'PetugasSiaranController@show');
   Route::post('petugas_siaran/{siaran}', 'PetugasSiaranController@store');
});





