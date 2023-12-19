<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use DB;
use App\Models\Order;
use App\Models\Product;

class CT_Order extends Model
{
    use HasFactory;

    protected $table = 'ct_order';
    public $timestamps = false;
    protected $fillable = ['id_order', 'id_product', 'qty', 'sellprice', 'total_item'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    
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