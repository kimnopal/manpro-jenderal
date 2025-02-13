<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProyekRequest extends FormRequest
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
            'no_proyek' => [
                'required',
                Rule::unique('proyek')->ignore($this->route('id'))
            ],
            'tgl_mulai_kontrak' => 'required|date',
            'tgl_selesai_kontrak' => 'required|date|after:tgl_mulai_kontrak',
            'klien_id' => 'required|exists:client,id',
            'termin' => 'required',
            'biaya' => 'required|numeric',
            'pajak' => 'required|numeric',
            'biaya_lain' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'no_proyek.required' => 'Nomor proyek wajib diisi',
            'no_proyek.unique' => 'Nomor proyek sudah ada',
            'tgl_selesai_kontrak.after' => 'Tanggal selesai harus setelah tanggal mulai',
            'biaya.numeric' => 'Biaya proyek harus berupa angka.',
            'biaya_lain.numeric' => 'Biaya lain harus berupa angka.',
            'pajak.numeric' => 'Pajak harus berupa angka.',

            'tgl_mulai_kontrak.required' => 'Tanggal mulai harus diisi',
            'tgl_selesai_kontrak.required' => 'Tanggal selesai harus diisi',
            'termin.required' => 'Termin harus diisi',
            'biaya.required' => 'Biaya harus diisi',
            'pajak.required' => 'Pajak harus diisi',
            'biaya_lain.required' => 'Biaya lain harus diisi',
        ];
    }
}
