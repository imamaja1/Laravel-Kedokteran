<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosen extends Model
{
    protected $table = "dosen";
    protected $guarded = [];
    public function prodi(): HasOne
    {
        return $this->hasOne(
            ProgramStudi::class,
            'kode_program_studi',
            'homebase',
        );
    }
}
