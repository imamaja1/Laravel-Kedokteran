<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fakultas extends Model
{
    protected $table = "fakultas";
    protected $guarded = [];
    public function dosen(): HasOne
    {
        return $this->hasOne(
            Dosen::class,
            'kode_dosen',
            'dekan',
        );
    }
}
