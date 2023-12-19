<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'id_brand',
        'id_category',
        'name',
        'description',
        'sellprice',
        'qty_store',
        'discount',
        'isdiscount',
        "status",
        "img_main",
        "img1",
        "img2",
        "img3",
        "gender",
        "size"
    ];

    public $timestamps = false;
    
    public function brand(){
        return $this->belongsTo(Brand::class, 'id_brand');
    }


    public function getAllProduct(){
        $product = DB::select("SELECT * FROM product");
        return $product;
    }

    public function getTop3ProductB(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT product.name AS pdName, brand.name AS brName, sellprice, img_main, discount FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nam'
            LIMIT 3;
            ");
        return $product;
    }
    public function getTop3ProductW(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT product.name AS pdName, brand.name AS brName, sellprice, img_main, discount FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nữ'
            LIMIT 4;
            ");
        return $product;
    }
    public function getCountProduct(){
        $productCount = DB::table('product')->count();
        return $productCount;
    }

    public function addProduct( $data){
        DB::insert('INSERT INTO product (id_brand, id_category, name, description, sellprice, qty_store, discount, isdiscount, status, gender, img_main , img1 , img2 , img3 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?)', $data);
    }

    public function updateProduct($data, $id){
        $data = array_merge($data,[$id]);

        return DB::update("UPDATE product SET id_brand = ?, id_category = ?, name = ?, description = ?, sellprice = ?, qty_store = ?, discount = ?, isdiscount = ?, status = ?, gender = ? , img_main = ? , img1 = ? , img2 = ? , img3 = ?  WHERE id_product = ?", $data);
    }

    public function getProduct( $id ){
        return DB::select("SELECT * FROM product WHERE id_product = ?",[$id]);
    }
    
    public function deleteProduct( $id ){
        return DB::delete("DELETE FROM product WHERE id_product = ?",[$id]);
    }

    public function searchProduct($searchKeyword){
        $results = DB::table('product')
            ->where('name', 'LIKE', '%' . $searchKeyword . '%')
            ->get();
        return $results;
    }
    
}
