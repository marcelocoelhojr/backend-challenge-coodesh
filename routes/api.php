<?php

use App\Http\Controllers\JobController;
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

Route::prefix('job')->group(function () {
    Route::post('/create', [JobController::class, 'create']);
    Route::get('/list', [JobController::class, 'list']);
    Route::get('/{id}', [JobController::class, 'getJob']);
    Route::put('/update/{id}', [JobController::class, 'update']);
    Route::delete('/{id}', [JobController::class, 'delete']);
    Route::post('/cache', [JobController::class, 'filterCache']);
});
