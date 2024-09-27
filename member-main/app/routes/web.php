<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('index'));
});

Route::get('login-driver', [PageController::class, 'loginDriver'])->name('loginDriver');
Route::get('login-admin', [PageController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('login-driver', [LoginController::class, 'loginDriver'])->name('aksi.loginDriver');
Route::post('login-admin', [LoginController::class, 'loginAdmin'])->name('aksi.loginAdmin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('preview/{memberid}', [QRController::class, 'preview'])->name('preview');
Route::get('kartu-anggota/{memberid}', [QRController::class, 'kartuAnggota'])->name('kartuAnggota');
Route::get('qrcode/{id}', [QRController::class, 'qrcode'])->name('qrcode');
Route::get('search/drivers', [DriverController::class, 'searchDriver'])->name('searchDriver');

//ROLE ADMIN
Route::group(['middleware' => 'admin'], function () {
    Route::get('data-client', [PageController::class, 'pageClient'])->name('pageClient');
    Route::get('konfigurasi', [PageController::class, 'konfigurasi'])->name('konfigurasi');
    Route::post('konfigurasi-edit', [PageController::class, 'editkonfigurasi'])->name('konfigurasi.edit');
    Route::get('data-truck-reguler', [PageController::class, 'pageDataTruckReguler'])->name('pageDataTruckReguler');
    Route::get('data-ongkir', [PageController::class, 'pageDataOngkir'])->name('pageDataOngkir');

    //ORDER
    Route::get('data-order-reguler', [PageController::class, 'pageDataOrderReg'])->name('pageDataOrderReg');
    Route::get('data-order-private', [PageController::class, 'pageDataOrderPr'])->name('pageDataOrderPr');
    Route::get('bukti-pembayaran/{filename}', [OrderController::class, 'buktiPembayaran'])->name('buktiPembayaran');
    Route::get('orderan-private-diterima/{order}', [OrderController::class, 'orderPrivateDiterima'])->name('orderPrivateDiterima');
    Route::post('orderan-private-ditolak/{order}', [OrderController::class, 'orderPrivateDitolak'])->name('orderPrivateDitolak');


    //DATA-DRIVER
    Route::get('data-driver', [PageController::class, 'pageDataDriver'])->name('pageDataDriver');
    Route::get('tambah-driver', [DriverController::class, 'tambahDriver'])->name('tambahDriver');
    Route::post('tambah-driver', [DriverController::class, 'aksiTambahDriver'])->name('aksi.tambahDriver');
    Route::get('edit-driver/{id}', [DriverController::class, 'editDriver'])->name('editDriver');
    Route::delete('edit-driver-truck/{id}', [DriverController::class, 'deleteTruck'])->name('deleteTruck');
    Route::post('edit-driver/{driver}/admin', [DriverController::class, 'aksiEditDriverByAdmin'])->name('aksi.editDriver.admin');
    Route::delete('delete-driver/{driver}', [DriverController::class, 'deleteDriver'])->name('deleteDriver');
    Route::post('tambah-truck/{driver}', [DriverController::class, 'tambahTruck'])->name('tambahTruck');

    //ARMADA
    Route::get('tambah-armada', [OrderController::class, 'tambahArmada'])->name('tambahArmada');
    Route::get('get-truck-image/{driverid}', [OrderController::class, 'getTruckImage']);
    Route::post('tambah-armada', [OrderController::class, 'aksiTambahArmada'])->name('aksi.tambahArmada');

    //VALIDASI
    Route::get('validasi-akun', [PageController::class, 'pageValidasiAkun'])->name('pageValidasiAkun');
    Route::get('validasi-pendaftaran-driver', [PageController::class, 'pageValidasiDriver'])->name('pageValidasiDriver');
    Route::get('detail-pendaftaran-driver/{driver}', [PageController::class, 'pageDetailDriver'])->name('pageDetailDriver');
    Route::post('validasi-akun-approved/{validation}', [ValidationController::class, 'approvedAccountValidation'])->name('approvedAccountValidation');
    Route::delete('validasi-akun-rejected/{validation}', [ValidationController::class, 'rejectedAccountValidation'])->name('rejectedAccountValidation');
    Route::get('validasi-driver-approved/{driver}', [ValidationController::class, 'approvedDriverValidation'])->name('approvedDriverValidation');
    Route::get('validasi-driver-rejected/{driver}', [ValidationController::class, 'rejectedDriverValidation'])->name('rejectedDriverValidation');
});

//ROLE DRIVER
Route::get('profile-driver', [DriverController::class, 'profileDriver'])->name('profileDriver');
Route::post('edit-driver/{driver}', [DriverController::class, 'aksiEditDriver'])->name('aksi.editDriver');
Route::get('data-order', [PageController::class, 'dataOrderDriver'])->name('dataOrderDriver');
