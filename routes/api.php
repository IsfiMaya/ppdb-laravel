<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
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
Route::middleware(['web'])->group(function () {
    Route::post('/users', [UserController::class, 'register'])->name('users');
});
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/postData', [DataDiriController::class, 'postData'])->name('postData');
    Route::post('/postDataP', [PendaftaranController::class, 'postData'])->name('postDataP');
});
