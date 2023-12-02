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
            'id_brand' => 'required|exists:brand,id_brand',
            'id_category'=> 'required|exists:category,id_category',
            'name'=> 'required|min:5',
            'description'=> 'required|min:5',
            'sellprice' => 'required|integer|min:10000',
            'pty_store'=> 'required|min:1',
            'discount'=> 'required|integer|min:5|max:50',
            'isdiscount' => 'required|in:0,1',
            'status' => 'required|in:Đang bán,Ngừng bán,Hết hàng',
            'img_main' => 'required|url',
            'img'=>'url'
        ];
    }

    public function messages(): array{
        return [
            'messages' => [
                'id_brand.required' => 'Trường thương hiệu không được để trống.',
                'id_brand.exists' => 'Thương hiệu không tồn tại.',
                'id_category.required' => 'Trường danh mục không được để trống.',
                'id_category.exists' => 'Danh mục không tồn tại.',
                'name.required' => 'Tên sản phẩm không được để trống.',
                'name.min' => 'Tên sản phẩm phải có ít nhất :min ký tự.',
                'description.required' => 'Mô tả không được để trống.',
                'description.min' => 'Mô tả phải có ít nhất :min ký tự.',
                'sellprice.required' => 'Giá bán không được để trống.',
                'sellprice.integer' => 'Giá bán phải là một số nguyên.',
                'sellprice.min' => 'Giá bán phải ít nhất là :min.',
                'pty_store.required' => 'Số lượng trong kho không được để trống.',
                'pty_store.min' => 'Số lượng trong kho phải ít nhất là :min.',
                'discount.required' => 'Giảm giá không được để trống.',
                'discount.integer' => 'Giảm giá phải là một số nguyên.',
                'discount.min' => 'Giảm giá phải ít nhất là :min.',
                'discount.max' => 'Giảm giá không được vượt quá :max.',
                'isdiscount.required' => 'Trường giảm giá có sẵn không được để trống.',
                'isdiscount.in' => 'Giá trị của trường giảm giá có sẵn không hợp lệ.',
                'status.required' => 'Trạng thái không được để trống.',
                'status.in' => 'Trạng thái không hợp lệ. Chỉ chấp nhận "Đang bán", "Ngừng bán", hoặc "Hết hàng".',
                'img_main.required' => 'Ảnh chính không được để trống.',
                'img_main.url' => 'Đường link ảnh chính không hợp lệ.',
                'img.url' => 'Đường link ảnh không hợp lệ.',
            ],
            
        ];
    }
}
