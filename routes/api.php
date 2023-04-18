<?php

use App\Http\Controllers\CronLogController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [CronLogController::class, 'getApidetails']);
Route::prefix('products')->group(function () {
    Route::put('/{code}', [ProductController::class, 'update']);
    Route::delete('/{code}', [ProductController::class, 'delete']);
    Route::get('/{code}', [ProductController::class, 'getProduct']);
    Route::get('/', [ProductController::class, 'getProductsList']);
});
