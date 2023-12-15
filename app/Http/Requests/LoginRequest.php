<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email' => 'required|email|exists:user,email',
            'password' => 'required|min:6',
        ];
    }


    public function messages()
    {
        return [
           
            'password.required' => 'lastname không bỏ trống!',
            "email.email"    =>  "Email không chính xác",
            "email.required"    =>  "Email không bỏ trống",
            "email.exists"    =>  "Tài khoản không tồn tại.",
            'password.required' => 'Mật khẩu không bỏ trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
           
        ];
    }
    
}
