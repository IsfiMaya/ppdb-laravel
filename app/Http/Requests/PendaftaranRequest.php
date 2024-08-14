<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class PendaftaranRequest extends FormRequest
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
            'NPSN' => ['required'],
            'ijazah' => ['required'],
            'kk' => ['required'],
            'akta_lahir' => ['required'],
            'nilai_raport' => ['required'],
            'prestasi1' => ['required'],
            'prestasi2' => ['required'],
            'prestasi3' => ['required'],
            'b_pembayaran' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator): JsonResponse
    {
        return response()->json(['errors' => $validator->getMessageBag()], 400);
    }
}
