<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
class ProductController extends Controller
{
    //

    public function store(Request $request)
    {   
        $product_items = $request->json()->all();
        
        $total = 0;
        $data = [];
        foreach( $product_items as $item){
            $total += $item['total'];
            $data[] = array(
                "id_product" =>  $item['productId'],
                "qty" =>  $item['quantity'],
                "import_price" =>  $item['import_price'],
                "total_item" =>  $item['quantity'],
            );
        }

        $today = Carbon::now(); 
        $receipt = Supplier::create(array("total" => $total, "day" => $today));

        if(!$receipt){
            return response()->json([
                'message' => 'Tạo receipt inventory fail',
            ], 403);
        }

        // tạo receipt_detail

        $receipt->receipt_detail()->createMany($data);


        //update sellprice qty_store
        
        // $product = Product::whereIn('id', $ids)->update(['image_id'=>$id]);


        foreach($product_items as $item){
           
            $product = Product::find($item['productId']); 

            if(  $product ){
                $current_quantity =  $product->qty_store;

                $product->qty_store = $current_quantity + (int)$item['quantity'];
                $product->sellprice = (int)$item['sell_price'];
                $product->save(); 
            }
            
        }

        return response()->json(
           [
            "message" => "Tạo thành công",
        ], 201);
    }

}
