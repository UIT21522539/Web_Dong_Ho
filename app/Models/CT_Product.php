<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CT_Product extends Model
{
    use HasFactory;

    public function getAllCtProduct($id){
        $ct_product = DB::select("SELECT * FROM product where id_product = ?", [$id]);
        return $ct_product;
    }
}
