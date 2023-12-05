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

    public $primaryKey = 'id_order';

    public $timestamps = false;

    protected $table = 'order';
}
