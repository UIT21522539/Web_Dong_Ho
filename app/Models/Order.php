<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

use App\Http\Requests\OrderRequest;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'id_user',
        'first_name',
        'last_name',
        'email',
        'location',
        'phone',
        'total_order',
        'status'
    ];

    public function getAllOrder(){
        $order = DB::select("SELECT * FROM `order`");
        return $order;
    }

    public function getOrderById( $id ){
        return DB::select("SELECT * FROM `order` WHERE id_order = ?",[$id]);
    } 

    public function getCT_OrderById( $id ){
        return DB::select("SELECT *, `ct_order.total_item` as `TongTien` FROM `ct_order` INNER JOIN `product` ON `ct_order.id_product` = `product.id_product` WHERE id_order = ?",[$id]);
    }

    public function getOrderByIdUser( $id ){
        return DB::select("SELECT * FROM `order` WHERE id_user = ?",[$id]);
    }
    public function getProfitByDay($day)
    {
        $result = DB::select("SELECT SUM(total_order) AS total_profit FROM `order` WHERE day = ?", [$day]);

        // Kiểm tra xem có kết quả không
        if (!empty($result)) {
            // Truy xuất trực tiếp giá trị từ đối tượng stdClass
            $totalProfit = $result[0]->total_profit;

            // Sử dụng $totalProfit trong logic của bạn
            return $totalProfit;
        }

        // Trả về 0 hoặc giá trị mặc định khác nếu không có kết quả
        return 0;
    }

    public function getProfitByMonth( $month ){
        $result = DB::select("SELECT SUM(total_order) AS total_profit FROM `order` WHERE MONTH(day) = ?", [$month]);

        // Kiểm tra xem có kết quả không
        if (!empty($result)) {
            // Truy xuất trực tiếp giá trị từ đối tượng stdClass
            $totalProfit = $result[0]->total_profit;

            // Sử dụng $totalProfit trong logic của bạn
            return $totalProfit;
        }

        // Trả về 0 hoặc giá trị mặc định khác nếu không có kết quả
        return 0;
    }

    public function getOrderByStatus(){
        return DB::select("SELECT * FROM `order` WHERE status = '1'");
    }
    
    public function updateOrder($id){

        return DB::update("UPDATE `order` SET status = 'Confirm' WHERE id_order = ?", [$id]);
    }

    public function cancelOrder( $id ){
        return DB::update("UPDATE `order` SET status = 'Cancel' WHERE id_order = ?", [$id]);
    }

    public function addOrder( $data ){
        return DB::insert('INSERT INTO `order` (id_user, first_name, last_name, email, location, phone, total_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', array_values($data));
    }
    public function getOrderByIdUserProduct( $id ){
        return DB::select("
            SELECT order.id_order, order.total_order, order.status, product.img_main, product.name
            FROM `order`
            JOIN ct_order ON order.id_order = ct_order.id_order
            JOIN product ON ct_order.id_product = product.id_product
        ");
    }
    public $primaryKey = 'id_order';

    public $timestamps = false;

    protected $table = 'order';
}
