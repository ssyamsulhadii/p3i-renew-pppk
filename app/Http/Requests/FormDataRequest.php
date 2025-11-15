<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            'gelar_depan' => 'nullable|string|max:50',
            'gelar_belakang' => 'nullable|string|max:50',
            'nama' => 'required|string|max:150',
            'nip_pppk' => [
                'required',
                'string',
                Rule::unique('data', 'nip_pppk')
                    ->where(fn($query) => $query->where('masa_perpanjangan_id', $this->masa_perpanjangan_id))
                    ->ignore($this->route('data')?->id), // <- abaikan saat update
            ],
            'unit_kerja' => 'required|string|max:150',
            'jabatan' => 'required|string|max:150',

            'jenis_formasi' => 'required|in:PPPK Guru,PPPK Kesehatan,PPPK Teknis',
            'jenis_kelamin' => 'required|in:L,P',

            'telpon' => 'required|string|max:20',
            'pendidikan_terakhir' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'masa_perpanjangan_id' => 'sometimes',
            // validasi dokumen/file
            'surat_pengantar' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'surat_sehat' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'sptjm' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'skp' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'absensi' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'sk_terakhir' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'spk' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:pdf', 'max:512'],
            'pas_foto' => [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:jpg,jpeg,png', 'max:512'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'file' => ':attribute harus berupa file yang valid.',
            'mimes' => ':attribute harus berupa file dengan format :values.',
            'max' => ':attribute maksimal berukuran 500KB.',
            'nip_pppk.unique' => 'NIP PPPK sudah digunakan pada periode ini.',
        ];
    }
}
