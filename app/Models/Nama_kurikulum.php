<?php

namespace App\Models;

use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\Kurikulum_angkatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Nama_kurikulum extends Model
{
    protected $table = "nama_kurikulum";
    protected $guarded = [];

    public function prodi(): hasOne
    {
        return $this->hasOne(ProgramStudi::class, 'kode_program_studi', 'kode_program_studi');
    }
    public function kurikulum_angkatan(): hasOne
    {
        return $this->hasOne(Kurikulum_angkatan::class, 'kode_nama_kurikulum', 'kode_nama_kurikulum');
    }
    public function kurikulum(): HasManyThrough
    {
        return $this->hasManyThrough(
            Matakuliah::class,
            Kurikulum::class,
            'kode_nama_kurikulum',
            'id_matakuliah',
            'kode_nama_kurikulum',
            'id_matakuliah',
        )->select('Kurikulum.kode_nama_kurikulum','Kurikulum.semester','Matakuliah.*')->orderBy('Kurikulum.semester','asc');
    }
    public function kurikulum_khs(): HasManyThrough
    {
        return $this->hasManyThrough(
            Matakuliah::class,
            Kurikulum::class,
            'kode_nama_kurikulum',
            'id_matakuliah',
            'kode_nama_kurikulum',
            'id_matakuliah',
        )
        ->select('Kurikulum.kode_nama_kurikulum','Kurikulum.semester','Matakuliah.*')
        ->orderBy('Kurikulum.semester','asc');
    }
}
