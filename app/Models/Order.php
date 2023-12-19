<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

use App\Http\Requests\OrderRequest;
use App\Models\CT_Order;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'id_order';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'email',
        'last_name',
        'first_name',
        'phone',
        'location',
        'note',
        'status',
        'total_order'
    ];

    public function orderDetail(){
        return $this->hasMany(CT_Order::class, 'id_order');
    }


    public function getAllOrder(){
        $order = DB::select("SELECT * FROM `order`");
        return $order;
    }

    public function getOrderById( $id ){
        return DB::select("SELECT * FROM `order` WHERE id_order = ?",[$id]);
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
}
