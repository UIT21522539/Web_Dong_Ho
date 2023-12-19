<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'email' => 'required|email|exists:user,email',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'location' => 'required|min:2',
            'phone' => 'required|min:10',
        ];
    }


    public function messages(): array
    {
        return [
            'id_user' => 'required|exists:user,id_user',
            'last_name.required' => 'Trường Họ không được để trống.',
            'last_name.min' => 'Họ phải có ít nhất :min ký tự.',
            'first_name.required' => 'Trường tên không được để trống.',
            'first_name.min' => 'Tên phải có ít nhất :min ký tự.',
            'email.required' => 'Trường Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.exists'  =>  "Tài khoản không tồn tại.",
            'location.min' => 'Địa chỉ phải có ít nhất :min ký tự.',
            'phone.required' => 'Trường số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại phải có ít nhất :min ký tự.',
        ];
    }
}
