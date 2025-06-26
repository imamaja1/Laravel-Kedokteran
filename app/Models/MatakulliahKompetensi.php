<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MatakulliahKompetensi extends Model
{
    protected $table = "matakuliah_kompetensi";
    protected $guarded = [];
    public function matakuliah(): HasOne
    {
        return $this->HasOne(
            Matakuliah::class,
            'id_matakuliah',
            'id_matakuliah',
        );
    }
}
