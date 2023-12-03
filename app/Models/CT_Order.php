<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use DB;

class CT_Order extends Model
{
    use HasFactory;
    public function getOrderByIdOrder( $id ){
        $order = DB::select("SELECT * FROM `ct_order` WHERE id_order = ?", [$id]);

        // Lấy danh sách các id_product từ mảng $order
        $idProducts = array_column($order, 'id_product');

        // Truy vấn tên sản phẩm từ bảng product
        $productNames = DB::table('product')->whereIn('id_product', $idProducts)->pluck('name', 'id_product');

        // Thay đổi giá trị trong mảng $order
        foreach ($order as &$item) {
            $item->product_name = $productNames[$item->id_product] ?? null;
            // Xóa trường id_product nếu bạn không muốn giữ lại nó trong mảng
            unset($item->id_product);
        return $order;
        }
    }
    
}