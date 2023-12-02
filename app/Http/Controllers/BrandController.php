<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function brandList(){
        $brand = new Brand();
        $brand = $brand->getAllBrand();

        return view('admin.brand.brandlist', ['brand' => $brand]);
    }
    public function searchBrand(Request $request){
        $searchKeyword = $request->input('search');

        $brand = new Brand();
        $results = $brand->searchBrand($searchKeyword);

        return view('admin.brand.brandsearch', ['results' => $results, 'searchKeyword' => $searchKeyword]);
    }
    public function addDetailBrand(){
        $title = "Thêm thương hiệu";
        return view('admin.brand.brandadd', compact('title'));
    }
    public function addBrand(BrandRequest $request){
        $dataInsert =[
            $request->name,
        ];


    $brand = new Brand();
    $brand -> addBrand($dataInsert);

    return redirect()->route('brands.list')->with('msg','Thêm thương hiệu thành công');
    }
    
}
