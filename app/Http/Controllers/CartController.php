<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function __construct() {
        if( Session::has('user_session')){
 
         return redirect(route('user.login'));
        }
        
     }
     


    public function getCart () {  

        return view('cart');
    }
 

    public function addToCart (Request $request) {  

        // dd($request);

        $id = $request->product_id;
        $product = Product::findOrFail($id);


        if($product->qty_store <= 0){
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng');
        }
        
        if(session()->has('cart')){
            $cart = session()->get('cart');
        }else{
            $cart = array(
                "items" => [],
                "total" => 0
            );
        }
  
        
        $items = $cart['items'];
        $total = 0;
        

        if(isset($items[$id])) {
            $items[$id]['quantity'] = $items[$id]['quantity'] + 1;
        } else {
            $items[$id] = [
                "id"    =>  $product->id_product,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sellprice,
                "image" => $product->img_main,
            ];
        }

        foreach($items as $item){
            $total += (int)$item['quantity']  *  (int)$item['price'];

        }
          
        session()->put('cart', array(
            "items" =>  $items,
            "total" =>  $total
        ));
      
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công.');
    }

    public function clearCart () {
        session()->put('cart', array(
            "items" =>  [],
            "total" =>  0
        ));
        return redirect()->back()->with('success', 'Xoá giỏ hàng thành công.');
    }

    public function deleteCart (Request $request) {

      
        $id = $request->product_id;
        $product = Product::findOrFail($id);

      
        $cart = session()->get('cart');
        
        $items = $cart['items'];

        $total = 0;
        
        unset($items[$id.'/']); 

        foreach($items as $item){
            $total += (int)$item['quantity']  *  (int)$item['price'];
        }
          
        session()->put('cart', array(
            "items" =>  $items,
            "total" =>  $total
        ));
      
        return redirect()->back()->with('success', 'Xoá sản '.$product->name.' phẩm thành công');

    }
}
