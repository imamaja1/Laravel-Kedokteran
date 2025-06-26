<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'kode_institusi',
    ];
    public function institusi(): HasOne
    {
        return $this->hasOne(
            Institusi::class,
            'kode_institusi',
            'kode_institusi',
        );
    }
}
