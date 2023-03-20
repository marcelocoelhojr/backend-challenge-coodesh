<?php

use App\Http\Controllers\Candidate;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/jobs', [JobController::class, 'listView']);
Route::get('/candidates', [Candidate::class, 'listView']);

Route::get('/teste', function () {
    return view('components.jobs.registerModal');
});
