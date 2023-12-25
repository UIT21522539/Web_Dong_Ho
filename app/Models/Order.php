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

    public function orderDetail(){
        return $this->hasMany(CTOrder::class, 'id_order');
    }

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

    public function getOrderByStatus(){
        return DB::select("SELECT * FROM `order` WHERE status = 'Waiting'");
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
            SELECT order.id_order, order.total_order, order.status, product.img_main, product.name, ct_order.qty, ct_order.total_item, ct_order.id_product, size, DATE_ADD(order.day, INTERVAL 7 DAY) AS day
            FROM `order`
            JOIN ct_order ON order.id_order = ct_order.id_order
            JOIN product ON ct_order.id_product = product.id_product
        ");
    }
    public $primaryKey = 'id_order';

    public $timestamps = false;

    protected $table = 'order';
}
