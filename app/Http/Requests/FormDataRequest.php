<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
            'status' => 'Dokumen Verifikasi',
            'is_done' => false,
        ]);
    }

    public function rules(): array
    {

        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);
        return [
            'masa_perpanjangan_id' => 'nullable',
            'surat_pengantar' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1500'],
            'surat_sehat' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1500'],
            'sptjm' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1500'],
            'skp' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1500'],
            'rekap_absensi' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1500'],
            'is_relokasi' => 'required|in:0,1',
            'status' => 'nullable',
            'is_done' => 'nullable',
            'user_id' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'file' => ':attribute harus berupa file yang valid.',
            'mimes' => ':attribute harus berupa file dengan format :values.',
            'max' => ':attribute maksimal berukuran 1000KB/1mb.',
            'is_relokasi.required' => 'kolom relokasi wajib dipilih.',
        ];
    }
}
