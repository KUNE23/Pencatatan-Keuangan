<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;

Route::get('/', [PemasukanController::class, 'index']);
Route::get('/keuangan/tambah', [PemasukanController::class, 'create']);
Route::post('/keuangan/simpan', [PemasukanController::class, 'store']);
Route::get('/keuangan/cari', [PemasukanController::class, 'cari']);

Route::get('/migrate', function () {
    Artisan::call('migrate --force');
    return 'Migrated!';
});

Route::get('/db-test', function () {
    try {
        \DB::connection()->getPdo();
        return '✅ Connected to DB!';
    } catch (\Exception $e) {
        return '❌ Connection failed: ' . $e->getMessage();
    }
});
