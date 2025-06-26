<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Foundation\Http\FormRequest;

class StoreJurusan extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'kode_institusi' => ['required', 'string', 'max:255'],
            'nama_institusi' => ['required', 'string', 'max:255'],
            'singkatan' => ['required', 'string', 'max:255'],
        ];
    }
}
