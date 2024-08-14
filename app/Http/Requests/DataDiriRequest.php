<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class DataDiriRequest extends FormRequest
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
            'nama' => ['required'],
            'alamat' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'nisn' => ['required'],
            'agama' => ['required'],
            'email' => ['required'],
            'no_handphone' => ['required'],
            'nama_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'total_pendapatan' => ['required'],
            'no_handphone_orangtua' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator): JsonResponse
    {
        return response()->json(['errors' => $validator->getMessageBag()], 400);
    }
}
