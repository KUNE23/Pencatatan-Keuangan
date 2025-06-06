<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;

Route::get('/', [PemasukanController::class, 'index']);
Route::get('/keuangan/tambah', [PemasukanController::class, 'create']);
Route::post('/keuangan/simpan', [PemasukanController::class, 'store']);
Route::get('/keuangan/cari', [PemasukanController::class, 'cari']);

