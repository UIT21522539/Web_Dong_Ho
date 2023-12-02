<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'location' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'id_user.required' => 'Trường ID User không được để trống.',
            'id_user.exists' => 'ID User không tồn tại trong bảng users.',
            'first_name.required' => 'Trường First Name không được để trống.',
            'first_name.min' => 'First Name phải có ít nhất :min ký tự.',
            'last_name.required' => 'Trường Last Name không được để trống.',
            'last_name.min' => 'Last Name phải có ít nhất :min ký tự.',
            'email.required' => 'Trường Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Trường Password không được để trống.',
            'password.min' => 'Password phải có ít nhất :min ký tự.',
            'location.required' => 'Trường Location không được để trống.',
            'phone.required' => 'Trường Phone không được để trống.',
        ];
    }
}
