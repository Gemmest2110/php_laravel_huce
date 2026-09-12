<?php

use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layoutmaster', function () {
    return view('layoutmaster');
});

Route::get('/sinhvien', [SinhVienController::class, 'index']);
Route::get('/sinhvien/show/{id?}/{khoa?}', [SinhVienController::class, 'show'])->where('id', '[0-9]+');
Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhvien.create');
Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhvien.store');