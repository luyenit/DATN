<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\PhuongThucThanhToanController;

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
    return view('admin.home');
});
Route::resource('/danhmucs', DanhMucController::class);
Route::resource('/chucvus', ChucVuController::class);
Route::resource('/phuongthucthanhtoans', PhuongThucThanhToanController::class);
Route::resource('/khuyenmais', KhuyenMaiController::class);
Route::resource('/sanphams', SanPhamController::class);
