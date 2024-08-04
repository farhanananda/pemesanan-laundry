<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianBarangController;
use App\Http\Controllers\DataLaundryNonMemberController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::resource('/pegawai',PegawaiController::class);
Route::resource('/pembelianbarang',PembelianBarangController::class);
Route::resource('/nonmember',DataLaundryNonMemberController::class);
Route::resource('/member',MemberController::class);
Route::resource('/barang',BarangController::class);
