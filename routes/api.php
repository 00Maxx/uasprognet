<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\JenistransaksiController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\UserApiController;
use App\Models\User;
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

Route::apiResource('nasabah', NasabahController::class);

Route::apiResource('jenistransaksi', JenistransaksiController::class);

Route::apiResource('tabungan', TabunganController::class);

Route::apiResource('agama', AgamaController::class);

Route::apiResource('user', UserApiController::class);

Route::post('register', [AuthApiController::class, 'register']) -> name('user.register');
Route::post('login', [AuthApiController::class, 'login']) -> name('user.login');
