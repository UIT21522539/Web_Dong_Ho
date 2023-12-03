<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Supplier extends Model
{
    use HasFactory;
    public function getAllSupplier(){
        $supplier = DB::select("SELECT * FROM inventoryreceipt");
        return $supplier;
    }
    public function getSupplierById($id){
        $supplier = DB::select("SELECT * FROM inventoryreceipt where id_ir = ?",[$id]);
        return $supplier;
    }

    public function addSupplier($totalAmount){
        $currentDate = Carbon::now()->toDateString();

        DB::table('inventoryreceipt')->insert([
            'day' => $currentDate,
             // Thay thế bằng giá trị thực tế bạn muốn chèn
            'total'=> $totalAmount
        ]);
        
    }

}
