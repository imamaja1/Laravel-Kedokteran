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
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama');
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
