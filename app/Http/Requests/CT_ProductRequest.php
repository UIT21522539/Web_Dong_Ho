<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CT_ProductRequest extends FormRequest
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
            'size' => 'required|in:S,M,L',
            'qty' => 'required|integer|min:0',
            'id_product' => 'required|exists:product,id_product',
        ];
    }

    public function messages(): array
    {
        return [
            'id_product.required' => 'Trường ID Product không được để trống.',
            'id_product.exists' => 'ID Product không tồn tại.',
            'size.required' => 'Trường Size không được để trống.',
            'size.in' => 'Size phải là giá trị trong danh sách S, M, L.',
            'qty.integer' => 'Qty phải là một số nguyên.',
            'qty.min' => 'Qty phải lớn hơn 0.',
        ];
    }
}
