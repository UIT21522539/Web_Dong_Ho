<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'day' => 'required|date',
            'total' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'day.required' => 'Trường Day không được để trống.',
            'day.date' => 'Trường Day phải có giá trị ngày hợp lệ.',
            'total.required' => 'Trường Total không được để trống.',
            'total.numeric' => 'Total phải là một số.',
            'total.min' => 'Total phải lớn hơn 0.',
        ];
    }
}
