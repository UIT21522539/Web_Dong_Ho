<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CT_OrderRequest extends FormRequest
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
            'id_order' => 'required|exists:order,id_order',
            'id_product' => 'required|exists:product,id_product',
            'qty' => 'required|integer|min:1',
            'cellprice' => 'required|numeric|min:0',
            'total_item' => 'required|numeric|min:0',
            'size' => 'required|in:S,M,L',
        ];
    }

    public function messages(): array
    {
        return [
            'id_order.required' => 'Trường ID Order không được để trống.',
            'id_order.exists' => 'ID Order không tồn tại.',
            'id_product.required' => 'Trường ID Product không được để trống.',
            'id_product.exists' => 'ID Product không tồn tại.',
            'qty.required' => 'Trường Qty không được để trống.',
            'qty.integer' => 'Qty phải là một số nguyên.',
            'qty.min' => 'Qty phải lớn hơn 0.',
            'cellprice.required' => 'Trường Cell Price không được để trống.',
            'cellprice.numeric' => 'Cell Price phải là một số.',
            'cellprice.min' => 'Cell Price phải lớn hơn 0.',
            'total_item.required' => 'Trường Total Item không được để trống.',
            'total_item.numeric' => 'Total Item phải là một số.',
            'total_item.min' => 'Total Item phải lớn hơn 0.',
            'size.required' => 'Trường Size không được để trống.',
            'size.in' => 'Size phải là giá trị trong danh sách S, M, L.',
        ];
    }
}
