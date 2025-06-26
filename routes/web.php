<?php

use App\Http\Controllers\Admin\Jurusan\FakultasControlelr;
use App\Http\Controllers\Admin\Jurusan\FakultasController;
use App\Http\Controllers\Admin\Jurusan\Program_studiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('auth/login');
})->name('login_mhs');
Route::get('/login_dosen', function () {
    return view('auth/login_dosen');
})->name('login_dosen');
Route::get('/login/admin', function () {
    return view('auth/login_admin');
})->name('login_dosen');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mhs.dashboard');
    Route::get('/mahasiswa/profil', [MahasiswaController::class, 'profil'])->name('mhs.profil');
    Route::get('/mahasiswa/kurikulum', [MahasiswaController::class, 'kurikulum'])->name('mhs.kurikulum');
    Route::get('/mahasiswa/krs', [MahasiswaController::class, 'krs'])->name('mhs.krs');
    Route::get('/mahasiswa/khs', [MahasiswaController::class, 'khs'])->name('mhs.khs');
    Route::get('/mahasiswa/petikan_nilai', [MahasiswaController::class, 'petikan_nilai'])->name('mhs.petikan_nilai');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dahboard');
    // fakultas
    Route::get('/fakultas', [FakultasController::class, 'index'])->name('admin.fakultas');
    Route::put('/fakultas/{id}', [FakultasController::class, 'update'])->name('admin.fakultas.put');
    // program_studi
    Route::get('/program_studi', [Program_studiController::class, 'index'])->name('admin.program_studi');
    Route::post('/program_studi', [Program_studiController::class, 'store'])->name('admin.program_studi');
    Route::delete('/program_studi/{id}', [Program_studiController::class, 'delete'])->name('admin.program_studi.delete');
    Route::get('/program_studi/jenjang', [Program_studiController::class, 'jenjang'])->name('admin.program_studi.jenjang');
    Route::post('/program_studi/jenjang', [Program_studiController::class, 'jenjang_store'])->name('admin.program_studi.jenjang');
    Route::put('/program_studi/jenjang', [Program_studiController::class, 'jenjang_update'])->name('admin.program_studi.jenjang');
    Route::delete('/program_studi/jenjang/{id}', [Program_studiController::class, 'jenjang_delete'])->name('admin.program_studi.jenjang.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
