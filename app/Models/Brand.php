<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    protected $primaryKey = 'id_brand';

    public function getAllBrand(){
        $brand = DB::select("SELECT * FROM brand");
        return $brand;
    }

    public function getBrand($id){
        $brand= DB::select("SELECT * FROM brand WHERE id_brand = ?",[$id]);
        return $brand[0];
    }
    
    public function getCountBrand(){
        $brandLCount = DB::table('brand')->count();
        return $brandLCount;
    }

    public function addBrand( $data){
        DB::insert('INSERT INTO brand (name ) VALUES (?)', $data);
    }

    public function searchBrand($searchKeyword){
        $results = DB::table('brand')
            ->where('name', 'LIKE', '%' . $searchKeyword . '%')
            ->get();
        return $results;
    }
}
