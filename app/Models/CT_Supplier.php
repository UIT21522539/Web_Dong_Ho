<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Supplier;
use DB;

class CT_Supplier extends Model
{
    use HasFactory;

    public function getCT_SupplierById($id)
    {
        $supplier = DB::select("SELECT * FROM `ct_ir` WHERE id_ir = ?", [$id]);

        // Lấy danh sách các id_product từ mảng $supplier
        $idProducts = array_column($supplier, 'id_product');

        // Truy vấn tên sản phẩm từ bảng product
        $productNames = DB::table('product')->whereIn('id_product', $idProducts)->pluck('name', 'id_product');

        // Thay đổi giá trị trong mảng $supplier
        foreach ($supplier as $item) {
            $productId = $item->id_product ?? null;
            $item->product_name = $productNames[$productId] ?? null;
            // Xóa trường id_product nếu bạn không muốn giữ lại nó trong mảng
            unset($item->id_product);
        }

        return $supplier;
    }
    public function addCtSupplier($data){
        $productName = $data['product'];
        $productId = DB::table('product')->where('name', $productName)->value('id_product');

        // Lấy id_ir từ bảng inventoryreceipt
        $idIrFromInventoryReceipt = DB::table('inventoryreceipt')->orderBy('id_ir', 'desc')->first();

        if ($idIrFromInventoryReceipt) {
            $idIrToUse = $idIrFromInventoryReceipt->id_ir;
        } else {
            // Nếu bảng inventoryreceipt trống, hoặc không có giá trị id_ir, bạn có thể xử lý tùy thuộc vào yêu cầu của bạn.
            // Ví dụ: Chọn một giá trị mặc định hoặc thông báo lỗi.
            // Ở đây, chúng ta sẽ chọn giá trị mặc định là 1.
            $idIrToUse = 1;
        }

        // Thêm bản ghi vào bảng ct_ir
        return DB::insert('INSERT INTO ct_ir (id_ir, id_product, size, qty, import_price, item_total) VALUES (?, ?, ?, ?, ?, ?);', [$idIrToUse, $productId, $data['size'], $data['quantity'], $data['importPrice'], $data['total']]);
    }
   
}
