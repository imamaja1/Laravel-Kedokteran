<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kompetensi extends Model
{
    protected $table = "kompetensi";
    protected $guarded = [];

    public function matakuliah(): HasMany
    {
        return $this->HasMany(
            Matakuliah::class,
            'kode_program_studi',
            'kode_program_studi',
        );
    }
}
