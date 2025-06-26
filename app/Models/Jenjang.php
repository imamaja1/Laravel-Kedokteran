<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jenjang extends Model
{
    protected $table = "jenjang";

    protected $guarded = [];

    public function institusi(): HasOne
    {
        return $this->hasOne(
            Institusi::class,
            'kode_institusi',
            'kode_institusi',
        );
    }
}
