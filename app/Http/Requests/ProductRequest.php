<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Cái này đang cài demo thôi chứ đến lúc vào admin mới cài lại
            'ten'=> 'required|min:5',
            'email'=> 'required|email|unique:users,email,'.request()->id,
        ];
    }
    public function messages(): array
    {
        return [
            // Cái này đang cài demo thôi chứ đến lúc vào admin mới cài lại
            'ten.required'=> 'Họ và tên bắt buộc nhập',
            'ten.min'=> 'Họ và tên phải từ :min trở lên',
            'email.required'=> 'Email bắt buộc nhập',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
        ];
    }
}
