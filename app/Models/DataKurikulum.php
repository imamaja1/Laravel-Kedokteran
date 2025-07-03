<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\Guard;

class DataKurikulum extends Model
{
    protected $table = 'data_kurikulum';
    protected $guarded = [];
    /**
     * Get the user associated with the DataKurikulum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data_matakuliah(): HasOne
    {
        return $this->hasOne(Matakuliah::class, 'id', 'id_matakuliah');
    }
}
