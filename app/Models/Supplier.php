<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;
use App\Models\CT_Supplier;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'inventoryreceipt';

    protected $primaryKey = 'id_ir';

    public $timestamps = false;

    protected $fillable = [
        'day',
        'total',
    ];

    public function receipt_detail(){
        return $this->hasMany(CT_Supplier::class, 'id_ir');
    }

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
