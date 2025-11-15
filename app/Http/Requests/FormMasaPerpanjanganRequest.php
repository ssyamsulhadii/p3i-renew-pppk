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
        return [
            'judul' => 'required|string',
            'tahun' => 'required|string',
            'is_active' => 'required|in:0,1',
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
