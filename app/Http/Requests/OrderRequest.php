<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'id_user' => 'required|exists:user,id_user',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            'location' => 'required|min:2',
            'phone' => 'required|min:10',
            'total_order' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,cancelled', // Thay thế 'pending', 'completed', 'cancelled' bằng trạng thái thực tế của bạn
            'day' => 'required|date',
            'note' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'id_user' => 'required|exists:user,id_user',
            'first_name.required' => 'Trường Họ không được để trống.',
            'first_name.min' => 'Họ phải có ít nhất :min ký tự.',
            'last_name.required' => 'Trường tên không được để trống.',
            'last_name.min' => 'Tên phải có ít nhất :min ký tự.',
            'email.required' => 'Trường Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'location.required' => 'Trường địa chỉ không được để trống.',
            'location.min' => 'Địa chỉ phải có ít nhất :min ký tự.',
            'phone.required' => 'Trường số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại phải có ít nhất :min ký tự.',
            'total_order.required' => 'Trường tổng tiền không được để trống.',
            'total_order.numeric' => 'Tổng tiền phải là một số.',
            'total_order.min' => 'Tổng tiền phải lớn hơn hoặc bằng :min.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'day.required' => 'Trường ngày đặt hàng không được để trống.',
            'day.date' => 'Ngày đặt hàng không hợp lệ.',
        ];
    }
}
