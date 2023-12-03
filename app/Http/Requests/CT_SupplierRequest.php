<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CT_SupplierRequest extends FormRequest
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
            'id_ir' => 'required|exists:inventoryreceipt,id_ir',
            'id_product' => 'required|exists:products,id_product',
            'size' => 'required|in:S,M,L',
            'qty' => 'required|integer|min:1',
            'import_price' => 'required|numeric|min:10000',
            'item_total' => 'required|numeric|min:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'id_ir.required' => 'Trường ID IR không được để trống.',
            'id_ir.exists' => 'ID IR không tồn tại.',
            'id_product.required' => 'Trường ID Product không được để trống.',
            'id_product.exists' => 'ID Product không tồn tại.',
            'size.required' => 'Trường Size không được để trống.',
            'size.in' => 'Size phải là giá trị trong danh sách S, M, L.',
            'qty.required' => 'Trường Quantity không được để trống.',
            'qty.integer' => 'Quantity phải là một số nguyên.',
            'qty.min' => 'Quantity phải lớn hơn 0.',
            'import_price.required' => 'Trường Import Price không được để trống.',
            'import_price.numeric' => 'Import Price phải là một số.',
            'import_price.min' => 'Import Price phải lớn hơn 10000.',
            'item_total.required' => 'Trường Item Total không được để trống.',
            'item_total.numeric' => 'Item Total phải là một số.',
            'item_total.min' => 'Item Total phải lớn hơn 10000.',
        ];
    }
}
