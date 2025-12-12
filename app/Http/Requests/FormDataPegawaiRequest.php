<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataPegawaiRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);
        if ($isUpdate) {
            $password = request('password') ? bcrypt(request('password')) : $this->data_pegawai->password;
        } else {
            $password = bcrypt(request('password'));
        }
        $this->merge([
            'jenis_formasi' => strtoupper(request('jenis_formasi')),
            'password' => $password,
        ]);
    }
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
        $id = $this->data_pegawai ? $this->data_pegawai->id : '';
        return [
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => 'required|string',
            'nama' => 'required|string',
            'bup' => 'required',
            'tanggal_lahir' => 'required|string',
            'tempat_lahir' => 'required|string',
            'pendidikan' => 'required|string',
            'unit_kerja' => 'required|string',
            'jenis_formasi' => 'required|string|in:PPPK TEKNIS,PPPK KESEHATAN,PPPK GURU',
            'jabatan' => 'required|string',
            'golongan' => 'required|string',
            'kode_angkatan' => 'required|string',
            'tmt_awal' => 'required|string',
            'tmt_akhir' => 'required|string',
        ];
    }
}
