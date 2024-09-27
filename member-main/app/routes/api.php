<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('images', [ApiController::class, 'images']);
Route::post('upload-bukti', [ApiController::class, 'uploadBukti']);
Route::post('upload-profile', [ApiController::class, 'uploadProfile']);
Route::post('upload-truck', [ApiController::class, 'uploadTruck']);
