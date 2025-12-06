<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'surat_pengantar' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1200'],
            'surat_sehat' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1200'],
            'sptjm' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1200'],
            'skp' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1200'],
            'rekap_absensi' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:1200'],
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
        ];
    }
}
