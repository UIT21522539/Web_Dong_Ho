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
 
 

    public function addToCart (Request $request) {  

        // dd($request);
        $id = $request->product_id;
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sellprice,
                "image" => $product->img_main,
            ];
        }
          
        session()->put('cart', $cart);
        dd($cart);

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công.');
    }
}
