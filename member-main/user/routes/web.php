<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('/', [PageController::class, 'index'])->name('index');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('pendaftaran', [PageController::class, 'pagePendaftaran'])->name('pagePendaftaran');
Route::post('pendaftaran', [PageController::class, 'pendaftaranDriver'])->name('pendaftaranDriver');
Route::get('about-us', [PageController::class, 'pageAboutUs'])->name('pageAboutUs');
Route::get('cek-ongkir', [PageController::class, 'pageCekOngkir'])->name('pageCekOngkir');
Route::post('calculate-price', [OrderController::class, 'calculatePrice'])->name('calculate.price');

Route::group(['middleware' => 'client'], function () {

    //private
    Route::get('order-private', [OrderController::class, 'private'])->name('order.private');
    Route::get('order-private-pay/{armada}', [OrderController::class, 'privatePay'])->name('order.privatePay');
    Route::get('/get-rate', [OrderController::class, 'getRate']);
    Route::post('order-private-execution', [OrderController::class, 'orderPrivateExecution'])->name('order.pexecution');

    //regular
    Route::get('order-regular', [OrderController::class, 'regular'])->name('order.regular');
    Route::get('order-regular-pay/{armada}', [OrderController::class, 'regularPay'])->name('order.regularPay');
    Route::post('order-execution', [OrderController::class, 'orderExecution'])->name('order.execution');
    Route::get('order-nota/{orderId}', [OrderController::class, 'nota'])->name('order.nota');
    Route::get('order-konfirmasi/{orderId}', [OrderController::class, 'konfirmasi'])->name('order.konfirmasi');
    Route::post('order-proses', [OrderController::class, 'proses'])->name('order.proses');

    //Profile
    Route::get('profile-page/{user}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('edit-profile-page/{user}', [UserController::class, 'editProfile'])->name('user.edit');
    Route::post('edit-profile/{user}', [UserController::class, 'aksiEditProfile'])->name('aksi.user.edit');
    Route::get('profile-my-order', [UserController::class, 'myOrder'])->name('user.myOrder');
    Route::get('my-pembayaran/{orderId}', [UserController::class, 'myPembayaran'])->name('user.myPembayaran');

    //Api-Image
    Route::get('images', [OrderController::class, 'images'])->name('images');
});
