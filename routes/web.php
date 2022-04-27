<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\WebController;

// use App\Http\Controllers\FrontController;

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



// Route::resource('checkin','Admin\CheckInController');
// Route::get('checkin/listcheckin', 'Admin\CheckInController@listcheckin');
// Auth::routes();


Route::get('/', 'Front\FrontController@index');
Route::get('/about', 'Front\FrontController@about');
Route::get('/service', 'Front\FrontController@service');
Route::get('/room', 'Front\FrontController@room');
Route::get('/ruang-makan', 'Front\FrontController@ruangmakan');
Route::get('/contact', 'Front\FrontController@contact');
Route::get('/book', 'Front\FrontController@book')->name('front.book');
Route::get('/book/{id}', 'Front\FrontController@bookId')->name('front.book.id');
// Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/email', 'EmailController@index');

//midtrans
Route::get('/booking-payment', 'WebController@index');
Route::get('/payment', 'WebController@payment');
Route::post('/payment', 'WebController@send_payment');

Auth::routes();



Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin']], function () {
	Route::get('dashboard', 'Admin\DashboardController@index');
	Route::get('checkin', 'Admin\CheckInController@index');
	Route::get('checkin/listcheckin', 'Admin\CheckInController@listcheckin');
	Route::get('checkin/create/{id}', 'Admin\CheckInController@create');
	Route::post('checkin/store', 'Admin\CheckInController@store');
	Route::get('checkin/edit/{id}', 'Admin\CheckInController@edit');
	Route::post('checkin/edit/', 'Admin\CheckInController@update');
	Route::delete('checkin/{id}', 'Admin\CheckInController@destroy');


	Route::get('checkout', 'Admin\CheckOutController@index');
	Route::get('checkout/cetak_invoice/{id}', 'Admin\CheckOutController@cetak_invoice');
	Route::post('checkout/store', 'Admin\CheckOutController@store');
	Route::get('checkout/edit/{id}', 'Admin\CheckOutController@edit');
	Route::post('checkout/edit/', 'Admin\CheckOutController@update');
	Route::delete('checkout/{id}', 'Admin\CheckOutController@destroy');

	Route::get('kamar', 'Admin\KamarController@index');

	Route::get('kamar/create/', 'Admin\KamarController@create');
	Route::post('kamar/store', 'Admin\KamarController@store');
	Route::get('kamar/edit/{id}', 'Admin\KamarController@edit');
	Route::post('kamar/update/{id}', 'Admin\KamarController@update');
	Route::delete('kamar/{id}', 'Admin\KamarController@destroy');
	Route::get('kamar/terpakai/', 'Admin\KamarController@terpakai');
	Route::get('kamar/kotor/', 'Admin\KamarController@kotor');
	Route::get('kamar/tersedia/', 'Admin\KamarController@tersedia');
	Route::get('type-kamar', 'Admin\TypeKamarController@index');

	Route::get('type-kamar/create/', 'Admin\TypeKamarController@create');
	Route::post('type-kamar/store', 'Admin\TypeKamarController@store');

	Route::post('type-kamar/update/{id}', 'Admin\TypeKamarController@update');
	Route::delete('type-kamar/{id}', 'Admin\TypeKamarController@destroy');

	Route::get('lantai', 'Admin\LantaiController@index');
	Route::get('lantai/create/{id}', 'Admin\LantaiController@create');
	Route::post('lantai/store', 'Admin\LantaiController@store');
	Route::get('lantai/edit/{id}', 'Admin\LantaiController@edit');
	Route::post('lantai/update/{id}', 'Admin\LantaiController@update');
	Route::delete('lantai/{id}', 'Admin\LantaiController@destroy');

	Route::get('layanan', 'Admin\LayananController@index');
	Route::get('layanan/create/{id}', 'Admin\LayananController@create');
	Route::post('layanan/store', 'Admin\LayananController@store');
	Route::get('layanan/edit/{id}', 'Admin\LayananController@edit');
	Route::post('layanan/update/{id}', 'Admin\LayananController@update');
	Route::delete('layanan/{id}', 'Admin\LayananController@destroy');


	Route::get('kategori-layanan', 'Admin\LayananKategoriController@index');
	Route::get('kategori-layanan/create/{id}', 'Admin\LayananKategoriController@create');
	Route::post('kategori-layanan/store', 'Admin\LayananKategoriController@store');
	Route::get('kategori-layanan/edit/{id}', 'Admin\LayananKategoriController@edit');
	Route::post('kategori-layanan/update/{id}', 'Admin\LayananKategoriController@update');
	Route::delete('kategori-layanan/{id}', 'Admin\LayananKategoriController@destroy');


	Route::get('transaksi-layanan', 'Admin\TransaksiLayananController@index');
	Route::get('transaksi-layanan/create/', 'Admin\TransaksiLayananController@create');
	Route::post('transaksi-layanan/store', 'Admin\TransaksiLayananController@store');
	Route::get('transaksi-layanan/edit/{id}', 'Admin\TransaksiLayananController@edit');
	Route::get('transaksi-layanan/show/{id}', 'Admin\TransaksiLayananController@show');
	Route::post('transaksi-layanan/update/{id}', 'Admin\TransaksiLayananController@update');
	Route::delete('transaksi-layanan/{id}', 'Admin\TransaksiLayananController@destroy');
	 Route::get('transaksi-layanan/getLayanan/{id}','Admin\TransaksiLayananController@getLayanan')->name('api.transaksilayanan');

	Route::get('perusahaan', 'Admin\PerusahaanController@index');

	Route::get('perusahaan/create/', 'Admin\PerusahaanController@create');
	Route::post('perusahaan/store', 'Admin\PerusahaanController@store');
	Route::get('perusahaan/edit/{id}', 'Admin\PerusahaanController@edit');
	Route::post('perusahaan/update/{id}', 'Admin\PerusahaanController@update');
	Route::delete('perusahaan/{id}', 'Admin\PerusahaanController@destroy');

	Route::get('tamu', 'Admin\TamuController@index');

	Route::get('tamu/create/', 'Admin\TamuController@create');
	Route::post('tamu/store', 'Admin\TamuController@store');
	Route::get('tamu/edit/{id}', 'Admin\TamuController@edit');
	Route::post('tamu/update/{id}', 'Admin\TamuController@update');
	Route::delete('tamu/{id}', 'Admin\TamuController@destroy');

	Route::get('user', 'Admin\UserController@index');

	Route::get('user/create/', 'Admin\UserController@create');
	Route::post('user/store', 'Admin\UserController@store');
	Route::get('user/edit/{id}', 'Admin\UserController@edit');
	Route::post('user/update/{id}', 'Admin\UserController@update');
	Route::delete('user/{id}', 'Admin\UserController@destroy');

	Route::get('berita', 'Admin\BeritaController@index');

	Route::get('berita/create/', 'Admin\BeritaController@create');
	Route::post('berita/store', 'Admin\BeritaController@store');
	Route::get('berita/edit/{id}', 'Admin\BeritaController@edit');
	Route::post('berita/update/{id}', 'Admin\BeritaController@update');
	Route::delete('berita/{id}', 'Admin\BeritaController@destroy');

	Route::get('laporan', 'Admin\LaporanController@index');
	Route::post('laporan/kamar', 'Admin\LaporanController@kamar');
	Route::post('laporan/layanan', 'Admin\LaporanController@layanan');
	Route::get('laporan/layanan', 'Admin\LaporanController@layanan');

});
// Route::get('/', 'HomeController@index');



