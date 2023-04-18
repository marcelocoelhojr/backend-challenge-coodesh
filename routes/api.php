<?php

use App\Http\Controllers\CronLogController;
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

Route::get('/', [CronLogController::class, 'getApidetails']);
Route::prefix('products')->group(function () {
    Route::put('/{code}', [JobController::class, 'create']);
    Route::delete('/{code}', [JobController::class, 'create']);
    Route::get('/{code}', [JobController::class, 'create']);
    Route::get('/', [JobController::class, 'create']);
});

// - `GET /`: Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.
//  - `PUT /products/:code`: Será responsável por receber atualizações do Projeto Web
//  - `DELETE /products/:code`: Mudar o status do produto para `trash`
//  - `GET /products/:code`: Obter a informação somente de um produto da base de dados
//  - `GET /products`: Listar todos os produtos da base de dados, adicionar sistema de paginação para não sobrecarregar o `REQUEST`.
