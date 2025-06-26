<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kurikulum_angkatan extends Model
{
    protected $table = "kurikulum_angkatan";
    protected $guarded = [];
 
    public function prodi()
    {
        return $this->hasOneThrough(ProgramStudi::class, Nama_kurikulum::class,
            'kode_nama_kurikulum',
            'kode_program_studi',
            'kode_nama_kurikulum',
            'kode_program_studi'
        )->select('nama_kurikulum.nama_kurikulum','program_studi.*');
    }
}
