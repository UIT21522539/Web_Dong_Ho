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
        $product = DB::select("SELECT * FROM product");
        return $product;
    }

    public function getTop3Product(){
        // Lấy danh sách id_product từ truy vấn ban đầu
        $idProducts = DB::select(
            "SELECT product.id_product, COUNT(ct_order.id_order) AS order_count
            FROM product
            JOIN ct_order ON product.id_product = ct_order.id_product
            GROUP BY product.id_product
            ORDER BY order_count DESC
            LIMIT 3;
            ");

        // Trích xuất danh sách id_product
        $idProducts = array_map(function ($product) {
            return $product->id_product;
        }, $idProducts);

        // Lấy thông tin chi tiết của các id_product từ bảng product
        $productDetails = DB::table('product')
            ->whereIn('id_product', $idProducts)
            ->get();

        // $productDetails bây giờ chứa thông tin chi tiết của các id_product
        return $productDetails;
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
