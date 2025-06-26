<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Foundation\Http\FormRequest;

class RequesProgramStudi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_jenjang' => ['required', 'string', 'max:255'],
            'nama_program_studi' => ['required', 'string', 'max:20'],
            'singkatan_program_studi' => ['required', 'string', 'max:255'],
            'kode_fakultas' => ['required', 'string', 'max:255'],
            'kode_prodi_univ' => ['required', 'string', 'max:20'],
            'kompetensi' => ['required', 'string', 'max:255'],
        ];
    }
}
