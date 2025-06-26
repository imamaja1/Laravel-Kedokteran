<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MatakuliahPrasyarat extends Model
{
    protected $table = "matakuliah_prasyarat";
    protected $guarded = [];
    public function matakuliah_ambil(): HasOne
    {
        return $this->HasOne(
            Matakuliah::class,
            'id_matakuliah',
            'id_matakuliah_ambil',
        );
    }
    public function matakuliah_syarat(): HasOne
    {
        return $this->HasOne(
            Matakuliah::class,
            'id_matakuliah',
            'id_matakuliah_syarat',
        );
    }
}
