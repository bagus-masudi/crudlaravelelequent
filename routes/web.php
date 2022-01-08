<?php

use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guru', [GuruController::class, 'index']);

Route::get('/guru/tambah', [GuruController::class, 'tambah']);

Route::post('/guru/simpan', [GuruController::class, 'simpan']);

Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);

Route::put('/guru/update/{id}', [GuruController::class, 'update']);

Route::get('/guru/hapus/{id}', [GuruController::class, 'delete']);

