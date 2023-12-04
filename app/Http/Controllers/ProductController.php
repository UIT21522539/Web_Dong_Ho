<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\CT_Product;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function combinedHome()
    {
        $product = new Product();
        $productListB = $product->getTop3ProductB();
        $productListW = $product->getTop3ProductW();
        return view('users.home', ['productListB' => $productListB, 'productListW' => $productListW]);
    }
    //Admin
        //Xem danh sách
        public function productList(){

            $product = new Product();
            $product = $product->getAllProduct();
    
            return view('admin.product.productlist', ['product' => $product]);
        }

            // MÀn hình xem thông tin sản phẩm
        public function productDetail(Request $request,$id){
            $title = 'Thông tin chi tiết sản phẩm';
            
            if(!empty($id)){
                $product = new Product();
                $productDetail = $product->getProduct($id);
                if(!empty($productDetail[0])){
                    $request->session()->put('id',$id);
                    $productDetail = $productDetail[0];
                    $brand = new Brand();
                    $id_brand = $productDetail->id_brand;
                    $brandDetail = $brand->getBrand($id_brand);
                    $brands = $brand->getAllBrand();

                    $category = new Category();
                    $id_category = $productDetail->id_category;
                    $categoryDetail = $category->getCategory($id_category);
                    $categories = $category->getAllCategory();

                    $ct_product = new CT_Product();
                    $ct_productList = $ct_product ->getAllCtProduct($id);
                }else{
                    return redirect()->route('products.list')->with('msg','Người dùng không tồn tại');
                }
            }else{
                return redirect()->route('products.list')->with('msg','Người dùng không tồn tại');
            }
    
            return view('admin.product.productdetail',compact('title','productDetail','brands','categories','brandDetail','categoryDetail','ct_productList'));
        }
    
            //Màn hình thêm sản phẩm
        public function productDetailAdd(){
            $brand = new Brand();
            $brands = $brand->getAllBrand();

            $category = new Category();
            $categories = $category->getAllCategory();
            $title = "Thêm sản phẩm";
            return view('admin.product.productdetailadd', compact('brands','title','categories'));
        }
            //Thêm sản phẩm
        public function addProduct(ProductRequest $request){
                
                $dataInsert =[
                    $request->id_brand,
                    $request->id_category,
                    $request->name,
                    $request->description,
                    $request->sellprice,
                    $request->pty_store,
                    $request->discount,
                    $request->isdiscount,
                    $request->status,
                    $request->gender,
                    $request->img_main,
                    $request->img1,
                    $request->img2,
                    $request->img3,
                ];
    
    
            $product = new Product();
            $product -> addProduct($dataInsert);
    
            return redirect()->route('products.list')->with('msg','Thêm sản phẩm thành công');
        }

        // Màn hình sửa sản phẩm
        public function getProduct(Request $request,$id){
            $title = 'Cập nhật sản phẩm';
            
            if(!empty($id)){
                $product = new Product();
                $productDetail = $product->getProduct($id);
                
                if(!empty($productDetail[0])){
                    $request->session()->put('id',$id);
                    $productDetail = $productDetail[0];
                    $brand = new Brand();
                    $id_brand = $productDetail->id_brand;
                    $brandDetail = $brand->getBrand($id_brand);
                    $brands = $brand->getAllBrand();

                    $category = new Category();
                    $id_category = $productDetail->id_category;
                    $categoryDetail = $category->getCategory($id_category);
                    $categories = $category->getAllCategory();

                    $ct_product = new CT_Product();
                    $ct_productList = $ct_product ->getAllCtProduct($id);
                }else{
                    return redirect()->route('products.list')->with('msg','Người dùng không tồn tại');
                }
            }else{
                return redirect()->route('products.list')->with('msg','Người dùng không tồn tại');
            }
    
            return view('admin.product.productdetailedit',compact('title','productDetail','brands','categories','brandDetail','categoryDetail','ct_productList'));
        }
        //Sửa sản phẩm
        public function updateProduct(ProductRequest $request){
            $id = session('id');
            if(empty($id)){
                return back()->with ('msg','Liên kết không tồn tại');
            }
        
            
        $dataInsert =[
            $request->id_brand,
            $request->id_category,
            $request->name,
            $request->description,
            $request->sellprice,
            $request->pty_store,
            $request->discount,
            $request->isdiscount,
            $request->status,
            $request->gender,
            $request->img_main,
            $request->img1,
            $request->img2,
            $request->img3,
        ];

            $product = new Product();
            $product -> updateProduct( $dataInsert, $id);

            return back()->with('msg','Cập nhật người dùng thành công');
        }

            //Xóa sản phẩm
        public function deleteProduct(Request $request,$id){
            if(!empty($id)){
                $product = new Product();
                $productDetail = $product->getProduct($id);
                if(!empty($productDetail[0])){
                    $deteleSatus = $product -> deleteProduct($id);
                    if($deteleSatus){
                        $msg = 'Xóa sản phẩm thành công';
                    }else{
                        $msg = 'Bạn không thể xóa sản phẩm lúc này. Vui lòng thử lại sau!';
                    }
                }else{
                    $msg = 'Liên kết không tồn tại';
                }
            }else{
                $msg = 'Liên kết không tồn tại';
            }
    
            return redirect()->route('products.list')->with('msg',$msg);
        }

        public function searchProduct(Request $request){
            $searchKeyword = $request->input('search');

            $product = new Product();
            $results = $product->searchProduct($searchKeyword);

        return view('admin.product.productsearch', ['results' => $results, 'searchKeyword' => $searchKeyword]);
        }
}
