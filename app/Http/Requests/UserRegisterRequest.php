<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            "username" => ['required', 'max:100'],
            "email" => ['required', 'max:100'],
            "password" => ['required', 'max:100'],
            "asal_sekolah" => ['required', 'max:100'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'asal_kota' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'agama' => ['required'],
            'no_handphone' => ['required'],
            'nama_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'total_pendapatan' => ['required'],
            'no_handphone_orangtua' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
