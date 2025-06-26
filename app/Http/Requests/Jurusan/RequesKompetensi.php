<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Foundation\Http\FormRequest;

class RequesKompetensi extends FormRequest
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
            'nama_kompetensi' => ['required', 'string', 'max:255'],
            'singkatan_kompetensi' => ['required', 'string', 'max:20'],
            'kode_program_studi' => ['required', 'string', 'max:255'],
        ];
    }
}
