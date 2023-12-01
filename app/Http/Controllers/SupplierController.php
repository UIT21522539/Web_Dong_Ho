<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;

use App\Models\Supplier;
use App\Models\CT_Supplier;
use App\Models\Product;




class SupplierController extends Controller
{
    public function supplierList(){
        $supplier = new Supplier();
        $supplierList = $supplier -> getAllSupplier();
        
        return view('admin.supplier.supplierlist', ['supplierList' => $supplierList]);
    }

    public function supplierDetail(Request $request, $id){
        $title = 'Thông tin chi tiết phiếu nhập hàng';
            
            if(!empty($id)){
                $supplier = new Supplier();
                $supplierDetail = $supplier->getSupplierById($id);
                if(!empty($supplierDetail[0])){
                    $request->session()->put('id',$id);
                    $supplierDetail = $supplierDetail[0];

                    $ct_supplier= new CT_Supplier();
                    $ct_supplierList = $ct_supplier->getCT_SupplierById($id);
                }else{
                    return redirect()->route('suppliers.list')->with('msg','Phiếu xuất kho không tồn tại');
                }
            }else{
                return redirect()->route('suppliers.list')->with('msg','Phiếu xuất kho không tồn tại');
            }
    
            return view('admin.supplier.supplierdetail',compact('title','supplierDetail','ct_supplierList'));
    }

    public function supplierDetailAdd(){
        $title = "Thêm phiếu nhập kho";
        $product = new Product();
        $products = $product->getAllproduct();
        return view('admin.supplier.supplieradd',compact('title', 'products'));
    }

    public function addSupplier(Request $request){
        $jsonData = $request->query('data');
        $data = json_decode(urldecode($jsonData), true);
        $totalAmount = array_reduce($data, function ($carry, $item) {
            return $carry + $item['total'];
        }, 0);
        $supplier = new Supplier();
        $supplier -> addSupplier($totalAmount);

        foreach ($data as $item){
        $ct_supplier = new CT_Supplier();
        $result = $ct_supplier->addCtSupplier($item);
        }

        return redirect()->route('suppliers.list')->with('msg','Thêm phiếu nhập thành công');
        
    }
}
