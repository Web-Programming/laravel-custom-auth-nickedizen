<?php

use App\Http\Controllers\API\ProdiController;
use App\Http\Controllers\API\RegisterController;
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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::group(
    ['middleware' => ['auth:sanctum']],
    function () {
        Route::apiResource('prodi', ProdiController::class);
    }
);

Route::middleware('auth:sanctum')->post('/prodi/store', [ProdiController::class, 'store']);
Route::middleware('auth:sanctum')->post('/prodi/update/{id}', [ProdiController::class, 'update']);
Route::middleware('auth:sanctum')->post('/prodi/delete/{id}', [ProdiController::class, 'delete']);




