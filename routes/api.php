<?php

use App\Http\Controllers\CronLogController;
use App\Http\Controllers\JobController;
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
    Route::put('/{code}', [ProductController::class, 'updateProduct']);
    Route::delete('/{code}', [JobController::class, 'create']);
    Route::get('/{code}', [ProductController::class, 'getProduct']);
    Route::get('/', [JobController::class, 'create']);
});

//  - `PUT /products/:code`: Será responsável por receber atualizações do Projeto Web
//  - `DELETE /products/:code`: Mudar o status do produto para `trash`
//  - `GET /products/:code`: Obter a informação somente de um produto da base de dados
//  - `GET /products`: Listar todos os produtos da base de dados, adicionar sistema de paginação para não sobrecarregar o `REQUEST`.
