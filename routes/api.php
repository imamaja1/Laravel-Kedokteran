<?php

use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/prodi/{id}', [MahasiswaController::class, 'prodi']);
Route::get('/mahasiswa/wali/prodi/{id}', [MahasiswaController::class, 'prodi']);
Route::get('/mahasiswa/wali/dosen/{id}', [MahasiswaController::class, 'prodi']);
Route::get('/mahasiswa/wali/nim/{id}', [MahasiswaController::class, 'prodi']);
Route::get('/mahasiswa/wali/{angkatan}/{jurursan}/{dosen}', [MahasiswaController::class, 'prodi']);
