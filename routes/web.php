<?php

use App\Http\Controllers\Admin\Jurusan\DosenController;
use App\Http\Controllers\Admin\Jurusan\FakultasControlelr;
use App\Http\Controllers\Admin\Jurusan\FakultasController;
use App\Http\Controllers\Admin\Jurusan\KurikulumController;
use App\Http\Controllers\Admin\Jurusan\MatakuliahController;
use App\Http\Controllers\Admin\Jurusan\Program_studiController;
use App\Models\Dosen;
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
    // kurikulum
    Route::get('/kurikulum/data_kurikulum', [KurikulumController::class, 'index'])->name('admin.kurikulum');
    Route::post('/kurikulum/data_kurikulum', [KurikulumController::class, 'store'])->name('admin.kurikulum');
    Route::delete('/kurikulum/data_kurikulum/{id}', [KurikulumController::class, 'delete'])->name('admin.kurikulum.delete');
    Route::get('/kurikulum/data_kurikulum/kurikulum_kedokteran', [KurikulumController::class, 'kurkulum_kedokteran'])->name('admin.kurikulum.kedokteran');
    Route::post('/kurikulum/data_kurikulum/kurikulum_kedokteran', [KurikulumController::class, 'kurkulum_kedokteran_store'])->name('admin.kurikulum.kedokteran');
    Route::put('/kurikulum/data_kurikulum/kurikulum_kedokteran', [KurikulumController::class, 'kurkulum_kedokteran_update'])->name('admin.kurikulum.kedokteran');
    Route::delete('/kurikulum/data_kurikulum/kurikulum_kedokteran/{id}', [KurikulumController::class, 'kurkulum_kedokteran_delete'])->name('admin.kurikulum.kedokteran.delete');
    Route::get('/kurikulum/matakuliah', [MatakuliahController::class, 'index'])->name('admin.matakuliah');
    Route::post('/kurikulum/matakuliah', [MatakuliahController::class, 'store'])->name('admin.matakuliah');
    Route::put('/kurikulum/matakuliah', [MatakuliahController::class, 'update'])->name('admin.matakuliah');
    Route::delete('/kurikulum/matakuliah/{id}', [MatakuliahController::class, 'delete'])->name('admin.matakuliah.delete');
    //dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('admin.dosen');
    Route::post('/dosen', [DosenController::class, 'store'])->name('admin.dosen');
    Route::get('/dosen/update/{id}', [DosenController::class, 'show'])->name('admin.dosen.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';
