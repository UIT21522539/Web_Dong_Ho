<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

use App\Http\Requests\ProductRequest;

class Product extends Model
{
    use HasFactory;

    public function getAllProduct(){
        $product = DB::select("SELECT *, product.name AS name, brand.name AS brName FROM product
        INNER JOIN brand
        ON product.id_brand = brand.id_brand");
        return $product;
    }

    public function getTop3ProductB(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT product.name AS pdName, brand.name AS brName, sellprice, img_main, id_product, discount, isdiscount FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nam'
            LIMIT 4;
            ");
        return $product;
    }
    public function getTop3ProductW(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT product.name AS pdName, brand.name AS brName, sellprice, img_main, id_product, discount, isdiscount FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nữ'
            LIMIT 4;
            ");
        return $product;
    }

    public function getAllProductMen(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT *, product.name AS pdName, brand.name AS brName FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nam'
            ");
        return $product;
    } public function getAllProductWoman(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $product = DB::select(
            "SELECT *, product.name AS pdName, brand.name AS brName FROM product
            INNER JOIN brand
            ON product.id_brand = brand.id_brand
            WHERE gender = 'nữ'
            ");
        return $product;
    }
    public function getCountProduct(){
        $productCount = DB::table('product')->count();
        return $productCount;
    }

    public function addProduct( $data){
        DB::insert('INSERT INTO product (id_brand, id_category, name, description, sellprice, qty_store, discount, isdiscount, status, gender, img_main , img1 , img2 , img3 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?)', $data);
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

    public $primaryKey = 'id_product';
    protected $table = 'product';
}
