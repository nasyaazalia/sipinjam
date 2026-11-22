<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlatRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    $id = $this->route('alat')?->id; 
    return [
        'kode'    => [
            'required', 'string', 'max:20', 
            \Illuminate\Validation\Rule::unique('alats', 'kode')->ignore($id)
        ],
        'nama'    => ['required', 'string', 'min:3', 'max:100'], // Minimal 3 karakter
        'stok'    => ['required', 'integer', 'min:0'],
        'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
        'lokasi'  => ['nullable', 'string', 'max:100'],
    ];
}

public function messages(): array
{
    return [
        'kode.required' => 'Kode alat wajib diisi.',
        'kode.unique'   => 'Kode alat sudah dipakai.',
        'nama.required' => 'Nama alat wajib diisi.',
        'nama.min'      => 'Nama alat minimal harus terdiri dari 3 karakter.',
        'stok.required' => 'Stok wajib diisi.',
        'stok.min'      => 'Stok tidak boleh negatif.',
    ];
}
}
