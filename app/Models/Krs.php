<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Krs extends Model
{
    protected $table ="krs";

    public function matakuliah(): HasManyThrough
    {
        return $this->hasManyThrough(
            Matakuliah::class,
            Krs_detail::class,
            'kode_krs',
            'id_matakuliah',
            'kode_krs',
            'id_matakuliah',
        )->select('Matakuliah.*','Krs_detail.status');
    }
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(
            Mhs::class,
            'nim',
            'nim',
        );
    }
    public function khs(): HasManyThrough
    {
        return $this->hasManyThrough(
            Khs_detail::class,
            Krs_detail::class,
            'kode_krs',
            'kode_krs_detail',
            'kode_krs',
            'kode_krs_detail',
        )
        ->join('matakuliah','matakuliah.id_matakuliah','=','krs_detail.id_matakuliah')
        ->select('khs_detail.*','matakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks_teori','matakuliah.sks_praktek','matakuliah.sks_praktikum');
    }
}
