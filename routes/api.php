<?php

use App\Http\Controllers\Api\AirMinumController;
use App\Http\Controllers\Api\AsetsController;
use App\Http\Controllers\Api\AtapController;
use App\Http\Controllers\Api\BantuanController;
use App\Http\Controllers\Api\BbmController;
use App\Http\Controllers\Api\DindingController;
use App\Http\Controllers\Api\GajiController;
use App\Http\Controllers\Api\JenisSanitasiController;
use App\Http\Controllers\Api\LantaiController;
use App\Http\Controllers\Api\LembagaEkonimiController;
use App\Http\Controllers\Api\LembagaPendidikanController;
use App\Http\Controllers\Api\PemasaranController;
use App\Http\Controllers\Api\PeneranganController;
use App\Http\Controllers\Surat\KehilanganController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('air_minum', AirMinumController::class);
Route::apiResource('aset', AsetsController::class);
Route::apiResource('atap', AtapController::class);
Route::apiResource('bantuan', BantuanController::class);
Route::apiResource('bbm', BbmController::class);
Route::apiResource('dinding', DindingController::class);
Route::apiResource('gaji', GajiController::class);
Route::apiResource('jenis_sanitasi', JenisSanitasiController::class);
Route::apiResource('lantai', LantaiController::class);
Route::apiResource('lembaga_ekonomi', LembagaEkonimiController::class);
Route::apiResource('lembaga_pendidikan', LembagaPendidikanController::class);
Route::apiResource('pemasaran', PemasaranController::class);
Route::apiResource('penerangan', PeneranganController::class);

Route::prefix('surat')->group(function () {
    Route::apiResource('kehilangan', KehilanganController::class);
});
