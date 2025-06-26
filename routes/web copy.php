<?php

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








// admin
// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dahboard');
// Route::get('/admin/jurusan/institusi', [JurusanController::class, 'institusi'])->name('admin.institusi');
// Route::post('/admin/jurusan/institusi', [JurusanController::class, 'store_institusi'])->name('admin.store_institusi');
// Route::put('/admin/jurusan/institusi', [JurusanController::class, 'put_institusi'])->name('admin.put_institusi');
// Route::delete('/admin/jurusan/institusi/{id}', [JurusanController::class, 'delete_institusi'])->name('admin.delete_institusi');

// Route::get('/admin/jurusan/fakultas', [JurusanController::class, 'fakultas'])->name('admin.fakultas');
// Route::post('/admin/jurusan/fakultas', [JurusanController::class, 'store_fakultas'])->name('admin.fakultas');
// Route::put('/admin/jurusan/fakultas', [JurusanController::class, 'put_fakultas'])->name('admin.fakultas');
// Route::delete('/admin/jurusan/fakultas/{id}', [JurusanController::class, 'delete_fakultas'])->name('admin.delete_fakultas');

// prodi 
// Route::get('/admin/jurusan/prodi', [JurusanController::class, 'prodi'])->name('admin.prodi');
// Route::get('/admin/jurusan/prodi/jenjang', [JurusanController::class, 'jenjang'])->name('admin.prodi.jenjang');
// Route::post('/admin/jurusan/prodi/jenjang', [JurusanController::class, 'store_jenjang'])->name('admin.prodi.jenjang');

// Route::put('/admin/jurusan/prodi/jenjang', [JurusanController::class, 'put_jenjang'])->name('admin.prodi.jenjang');

// Route::delete('/admin/jurusan/prodi/jenjang/{id}', [JurusanController::class, 'delete_jenjang'])->name('admin.prodi.delete_jenjang');

// Route::get('/admin/jurusan/prodi/kode_jurusan', [JurusanController::class, 'kode_jurusan'])->name('admin.prodi.kode_jurusan');
// Route::post('/admin/jurusan/prodi/kode_jurusan', [JurusanController::class, 'store_kode_jurusan'])->name('admin.prodi.kode_jurusan');
// Route::put('/admin/jurusan/prodi/kode_jurusan', [JurusanController::class, 'put_kode_jurusan'])->name('admin.prodi.kode_jurusan');
// Route::delete('/admin/jurusan/prodi/kode_jurusan/{id}', [JurusanController::class, 'delete_kode_jurusan'])->name('admin.prodi.delete_kode_jurusan');

// Route::get('/admin/jurusan/prodi/nama_jurusan', [JurusanController::class, 'nama_jurusan'])->name('admin.prodi.nama_jurusan');
// Route::post('/admin/jurusan/prodi/nama_jurusan', [JurusanController::class, 'store_nama_jurusan'])->name('admin.prodi.nama_jurusan');
// Route::delete('/admin/jurusan/prodi/nama_jurusan/{id}', [JurusanController::class, 'delete_nama_jurusan'])->name('admin.prodi.delete_nama_jurusan');
// Route::put('/admin/jurusan/prodi/nama_jurusan', [JurusanController::class, 'put_nama_jurusan'])->name('admin.prodi.nama_jurusan');

// Route::get('/admin/jurusan/prodi/kompetensi', [JurusanController::class, 'kompetensi'])->name('admin.prodi.kompetensi');
// Route::post('/admin/jurusan/prodi/kompetensi', [JurusanController::class, 'store_kompetensi'])->name('admin.prodi.kompetensi');
// Route::put('/admin/jurusan/prodi/kompetensi', [JurusanController::class, 'put_kompetensi'])->name('admin.prodi.kompetensi');
// Route::delete('/admin/jurusan/prodi/kompetensi/{id}', [JurusanController::class, 'delete_kompetensi'])->name('admin.prodi.delete_kompetensi');

// Route::get('/admin/jurusan/prodi/kompetensi/{id}/matakuliah', [JurusanController::class, 'matakuliah_kompetensi'])->name('admin.prodi.matakuliah_kompetensi');
// Route::post('/admin/jurusan/prodi/kompetensi/{id}/matakuliah', [JurusanController::class, 'store_matakuliah_kompetensi'])->name('admin.prodi.matakuliah_kompetensi');
// Route::delete('/admin/jurusan/prodi/kompetensi/{id}/matakuliah/{code}', [JurusanController::class, 'delete_matakuliah_kompetensi'])->name('admin.prodi.delete_matakuliah_kompetensi');

// Route::get('/admin/jurusan/prodi/ketua_jurusan', [JurusanController::class, 'ketua_jurusan'])->name('admin.prodi.ketua_jurusan');
// Route::post('/admin/jurusan/prodi/ketua_jurusan', [JurusanController::class, 'store_ketua_jurusan'])->name('admin.prodi.ketua_jurusan');
// Route::put('/admin/jurusan/prodi/ketua_jurusan', [JurusanController::class, 'put_ketua_jurusan'])->name('admin.prodi.ketua_jurusan');
// Route::delete('/admin/jurusan/prodi/ketua_jurusan/{id}', [JurusanController::class, 'delete_ketua_jurusan'])->name('admin.prodi.delete_ketua_jurusan');

// Route::get('/admin/jurusan/kurikulum/matakuliah/{id?}', [JurusanController::class, 'matakuliah'])->name('admin.kurikulum.matakuliah');
// Route::post('/admin/jurusan/kurikulum/matakuliah', [JurusanController::class, 'store_matakuliah'])->name('admin.kurikulum.matakuliah');
// Route::put('/admin/jurusan/kurikulum/matakuliah', [JurusanController::class, 'put_matakuliah'])->name('admin.kurikulum.matakuliah');
// Route::delete('/admin/jurusan/kurikulum/matakuliah/{id}', [JurusanController::class, 'delete_matakuliah'])->name('admin.kurikulum.delete_matakuliah');

// Route::get('/admin/jurusan/kurikulum/nama_kurikulum', [JurusanController::class, 'nama_kurikulum'])->name('admin.kurikulum.nama_kurikulum');
// Route::post('/admin/jurusan/kurikulum/nama_kurikulum', [JurusanController::class, 'store_nama_kurikulum'])->name('admin.kurikulum.nama_kurikulum');
// Route::put('/admin/jurusan/kurikulum/nama_kurikulum', [JurusanController::class, 'put_nama_kurikulum'])->name('admin.kurikulum.nama_kurikulum');
// Route::delete('/admin/jurusan/kurikulum/nama_kurikulum/{id}', [JurusanController::class, 'delete_nama_kurikulum'])->name('admin.kurikulum.delete_nama_kurikulum');

// Route::get('/admin/jurusan/kurikulum/data_kurikulum/{id?}', [JurusanController::class, 'data_kurikulum'])->name('admin.kurikulum.data_kurikulum');
// Route::post('/admin/jurusan/kurikulum/data_kurikulum', [JurusanController::class, 'store_data_kurikulum'])->name('admin.kurikulum.data_kurikulum');
// Route::delete('/admin/jurusan/kurikulum/data_kurikulum/{id}', [JurusanController::class, 'delete_data_kurikulum'])->name('admin.kurikulum.delete_data_kurikulum');

// Route::get('/admin/jurusan/kurikulum/kurikulum_angkatan', [JurusanController::class, 'kurikulum_angkatan'])->name('admin.kurikulum.kurikulum_angkatan');
// Route::post('/admin/jurusan/kurikulum/kurikulum_angkatan', [JurusanController::class, 'store_kurikulum_angkatan'])->name('admin.kurikulum.kurikulum_angkatan');
// Route::put('/admin/jurusan/kurikulum/kurikulum_angkatan', [JurusanController::class, 'put_kurikulum_angkatan'])->name('admin.kurikulum.kurikulum_angkatan');
// Route::delete('/admin/jurusan/kurikulum/kurikulum_angkatan/{id}', [JurusanController::class, 'delete_kurikulum_angkatan'])->name('admin.kurikulum.delete_kurikulum_angkatan');


// Route::get('/admin/jurusan/kurikulum/matakuliah_prasyarat/{id?}', [JurusanController::class, 'matakuliah_prasyarat'])->name('admin.kurikulum.matakuliah_prasyarat');
// Route::post('/admin/jurusan/kurikulum/matakuliah_prasyarat', [JurusanController::class, 'store_matakuliah_prasyarat'])->name('admin.kurikulum.matakuliah_prasyarat');
// Route::put('/admin/jurusan/kurikulum/matakuliah_prasyarat', [JurusanController::class, 'put_matakuliah_prasyarat'])->name('admin.kurikulum.matakuliah_prasyarat');
// Route::delete('/admin/jurusan/kurikulum/matakuliah_prasyarat/{id}', [JurusanController::class, 'delete_matakuliah_prasyarat'])->name('admin.kurikulum.delete_matakuliah_prasyarat');


// Route::get('/admin/jurusan/dosen', [JurusanController::class, 'dosen'])->name('admin.dosen');
// Route::post('/admin/jurusan/dosen', [JurusanController::class, 'store_dosen'])->name('admin.dosen');
// Route::put('/admin/jurusan/dosen', [JurusanController::class, 'put_dosen'])->name('admin.dosen');
// Route::delete('/admin/jurusan/dosen/{id}', [JurusanController::class, 'delete_dosen'])->name('admin.delete_dosen');

// Route::get('/admin/jurusan/perwalian', [JurusanController::class, 'perwalian'])->name('admin.perwalian');
// Route::post('/admin/jurusan/perwalian', [JurusanController::class, 'store_perwalian'])->name('admin.perwalian');

// Route::get('/admin/jurusan/konsultasi_perwalian', [JurusanController::class, 'konsultasi_perwalian'])->name('admin.konsultasi_perwalian');
// Route::get('/admin/jurusan/tahun_akademik', [JurusanController::class, 'tahun_akademik'])->name('admin.tahun_akademik');
// Route::get('/admin/jurusan/distribusi_matakuliah', [JurusanController::class, 'distribusi_matakuliah'])->name('admin.distribusi_matakuliah');
// Route::get('/admin/jurusan/pembimbing kkp', [JurusanController::class, 'pembimbing kkp'])->name('admin.pembimbing kkp');




// Route::get('/admin/keangan/status-perkuliahan', [JurusanController::class, 'fakultas'])->name('admin.status-perkuliahan');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
