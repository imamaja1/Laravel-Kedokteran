<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $table = "institusi";
    protected $fillable = [
        'kode_institusi',
        'nama_institusi',
        'singkatan',
    ];
}
