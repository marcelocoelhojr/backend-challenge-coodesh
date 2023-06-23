<?php

use App\Http\Controllers\CronLogController;
use App\Http\Controllers\ProductController;
use App\Jobs\ProductJob;
use App\Services\Product\ProductConfirmationSchedule;
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

//! Retorna o log mais o produto relacionado ao log.
Route::get('/{id}', [CronLogController::class, 'getProductDetails'])->where('id', '[0-9]+');
Route::get('/{id}/products', [CronLogController::class, 'listProductLog']);

Route::get('/', [CronLogController::class, 'getApidetails']);
Route::prefix('products')->group(function () {
    Route::put('/{code}', [ProductController::class, 'update']);
    Route::delete('/{code}', [ProductController::class, 'delete']);
    Route::get('/{code}', [ProductController::class, 'getProduct']);
    //!Retorna o produto mais o log relacioando
    Route::get('/log/{code}', [ProductController::class, 'getProductLog']);
    Route::get('/', [ProductController::class, 'getProductsList']);
});
