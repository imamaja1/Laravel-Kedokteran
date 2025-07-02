<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kurikulum extends Model
{
    protected $table = "kurikulum";
    protected $guarded= [];

    public function matakuliah(): HasOne
    {
        return $this->HasOne(
            Matakuliah::class,
            'id_matakuliah',
            'id_matakuliah',
        );
    }
     public function tahun_akademik(): HasOne
    {
        return $this->HasOne(
            TahunAkademik::class,
            'id',
            'id_tahun_akademik',
        );
    }
}
