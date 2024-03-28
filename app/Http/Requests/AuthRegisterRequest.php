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
            'name'                  => 'required|string',
            'email'                 => 'required|string|email|unique:users|max:191',
            'role_user'             => 'gt:0',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'Vui lòng nhập tên.',
                'string'    => 'Họ tên phải là dạng ký tự.',
            ],
            'email' => [
                'required'  => 'Vui lòng nhập email.',
                'string'    => 'Email phải là dạng ký tự.',
                'email'     => 'Email chưa đúng định dạng. ví dụ: abc@gmail.com',
                'unique'    => 'Email đã tồn tại, Hãy nhập email khác.',
                'max'       => 'Độ dài email tối đa 191 ký tự.',
            ],
            'password' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'string' => 'Mật khẩu phải là dạng ký tự.',
                'min' => 'Vui lòng nhập không dưới 6 ký tự.'
            ],
            'password_confirmation' => [
                'required' => 'Vui lòng nhập mật khẩu.',
                'string' => 'Mật khẩu phải là dạng ký tự.',
                'same' => 'Mật khẩu không khớp.',
                'min' => 'Vui lòng nhập không dưới 6 ký tự.'
            ],
            'role_user.gt' => 'Vui lòng chọn vai trò cho tài khoản.'
        ];
    }
}
