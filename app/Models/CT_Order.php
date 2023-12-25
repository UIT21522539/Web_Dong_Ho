<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use DB;

class CT_Order extends Model
{
    use HasFactory;
    public function getOrderByIdOrder( $id ){
        // Lấy thông tin đơn hàng từ bảng ct_order
    $orderDetails = DB::select("SELECT * FROM `ct_order` WHERE id_order = ?", [$id]);

    // Kiểm tra xem có kết quả không
    if (!empty($orderDetails)) {
        // Lấy danh sách các id_product từ mảng $orderDetails
        $idProducts = array_column($orderDetails, 'id_product');

        // Truy vấn tên sản phẩm từ bảng product
        $productNames = DB::table('product')->whereIn('id_product', $idProducts)->pluck('name', 'id_product');

        // Thay đổi giá trị trong mảng $orderDetails
        foreach ($orderDetails as $item) {
            // Sử dụng isset để kiểm tra xem key 'id_product' có tồn tại không
            $productId = isset($item->id_product) ? $item->id_product : null;
            
            // Gán giá trị product_name dựa trên id_product
            $item->product_name = $productNames[$productId] ?? null;
            
            // Xóa trường id_product nếu bạn không muốn giữ lại nó trong mảng
            unset($item->id_product);
        }

        return $orderDetails;
    }

    // Trả về mảng rỗng nếu không có kết quả
    return [];
    }

    public function getCTOrder( $id ){
        return DB::select("SELECT * FROM ct_order WHERE id_order = ?",[$id]);
    }
    
}