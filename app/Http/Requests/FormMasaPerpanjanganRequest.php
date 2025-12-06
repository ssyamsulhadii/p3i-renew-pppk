<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormMasaPerpanjanganRequest extends FormRequest
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
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);
        $id = $this->masa_perpanjangan ? $this->masa_perpanjangan->id : '';
        return [
            'kode_perpanjangan'   => 'required|string|unique:masa_perpanjangan,kode_perpanjangan,' . $id,
            'judul'               => 'required|string|max:255',
            'label_unggah_skp'    => 'required|string|max:255',
            'label_unggah_absen'  => 'required|string|max:255',
            'kode_angkatan'       => 'required|array',
            'kode_angkatan.*'     => 'string',
            'is_active'           => 'required|in:0,1',
            'lampiran'            => $isUpdate ? 'nullable' : 'required' . '|file|mimes:pdf|max:2048',
            'tte_kolekftif'        => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'is_active.required' => 'Kolom status wajib diisi.',
            'is_active.in' => 'Kolom status tidak valid.',
        ];
    }
}
