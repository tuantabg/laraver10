<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'Vui lòng nhập tên.'
            ],
            'email' => [
                'required' => 'Vui lòng nhập email.'
            ],
            'password' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'confirmed' => 'vui lòng nhập lại mật khẩu.',
                'min' => 'Vui lòng nhập không dưới 6 ký tự.'
            ],
            'password_confirmation' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'min' => 'Vui lòng nhập không dưới 6 ký tự.'
            ]
        ];
    }
}
