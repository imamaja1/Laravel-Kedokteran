<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tahun_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->string('tanggal_mulai');
            $table->string('tanggal_berakhir');
            $table->string('status');
            $table->string('status_kpat');
            $table->timestamps();
        });
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fakultas');
            $table->string('dekan');
            $table->timestamps();
        });
        Schema::create('program_studi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program_studi');
            $table->string('singkatan');
            $table->string('id_jenjang');
            $table->string('id_fakultas');
            $table->string('kaprodi');
            $table->timestamps();
        });
        Schema::create('jenjang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenjang');
            $table->timestamps();
        });
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kurikulum');
            $table->string('id_tahun_akademik');
            $table->timestamps();
        });
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matakuliah');
            $table->string('nama_matakuliah');
            $table->string('sks_toeri');
            $table->string('sks_praktik');
            $table->string('sks_praktikum');
            $table->timestamps();
        });
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->string('id_tahun_akademik');
            $table->string('nim');
            $table->string('semester');
            $table->timestamps();
        });
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
            $table->string('field_studi');
            $table->string('alumni');
            $table->string('nik');
            $table->string('no_telp');
            $table->string('status_dosen');
            $table->string('homebase');
            $table->string('sandi_pengguna');
            $table->string('status');
            $table->string('email');
            $table->string('signature');
            $table->string('chatid');
            $table->string('foto');
            $table->timestamps();
        });
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nik');
            $table->string('npm');
            $table->string('nisn');
            $table->string('nomor_pendaftaran');
            $table->string('nomor_pendaftaran_ulang');
            $table->string('program_studi_kode');
            $table->string('nama_mahasiswa');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('kota');
            $table->string('propinsi');
            $table->string('telepon');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('golongan_darah');
            $table->string('kewarganegaraan');
            $table->string('nama_instansi');
            $table->string('email');
            $table->string('nama_ayah');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_orangtua');
            $table->string('kota_orangtua');
            $table->string('propinsi_orangtua');
            $table->string('telepon_orangtua');
            $table->string('foto');
            $table->string('sandi');
            $table->string('status');
            $table->string('status_pendaftaran');
            $table->string('ta_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_akademik');
        Schema::dropIfExists('fakultas');
        Schema::dropIfExists('program_studi');
        Schema::dropIfExists('jenjang');
        Schema::dropIfExists('kurikulum');
        Schema::dropIfExists('matakuliah');
        Schema::dropIfExists('krs');
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('mahasiswa');
    }
};
