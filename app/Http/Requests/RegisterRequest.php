<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'firstname không bỏ trống',
            'lastname.required' => 'lastname không bỏ trống!',
            "email.email"    =>  "Email không chính xác",
            "email.required"    =>  "Email không bỏ trống",
            "email.unique"    =>  "Email đã tồn tại",
            'password.required' => 'Mật khẩu không bỏ trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'confirm_password.required' => 'Xác nhận mật khẩu không bỏ trống',
            'confirm_password.min' => "Xác nhận mật khẩu tối thiểu 6 ký tự",
            'confirm_password.same' => "Xác nhận mật khẩu không khớp",
        ];
    }
}
