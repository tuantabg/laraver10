<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email' => [
                'required' => 'Vui lòng nhập email.'
            ],
            'password' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'min' => 'Vui lòng nhập không dưới 6 ký tự.'
            ],
        ];
    }
}
