<?php

use App\Http\Controllers\LopHocController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/sinhvien');

Route::resource('sinhvien', SinhVienController::class);
Route::resource('lophoc', LopHocController::class)->except('show');
