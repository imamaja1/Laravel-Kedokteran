<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Foundation\Http\FormRequest;

class RequesJurusan extends FormRequest
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
            'kode_jurusan' => ['required', 'string', 'max:255'],
            'nama_jurusan' => ['required', 'string', 'max:20'],
            'kode_institusi' => ['required', 'string', 'max:255'],
        ];
    }
}
