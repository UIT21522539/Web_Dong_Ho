<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Product;
use session;
use DB;
use App\Cart;

class CartController extends Controller
{
    
    // public function addProduct(Request $request) {
    //     if (!auth()->user()) {
    //         return redirect('login');
    //     }

        
    //     Carts::updateOrCreate(
    //         [
    //             'id_user' => auth()->user()->id_user,
    //             'id_product' => $request->id,
    //         ],[
    //         'id_user' => auth()->user()->id_user,
    //         'id_product' => $request->id,
    //         'qty' => 1
    //     ]);

    //     return back();
    // }

    // public function getProduct(Request $request) {
    //     if (!auth()->user()) {
    //         return redirect('login');
    //     }
    //     $products = [];

    //     $id_user = auth()->user()->id_user;
    //     $carts= Carts::where('id_user', $id_user)->get();
    //     foreach ($carts as $cart) {
    //         array_push($products, Product::find($cart->id_product));
    //     }
    //     return $products;

    // }


    public function AddCart(Request $req, $id){
        $product = DB::table('product')->where('id_product', $id)->first();
        if($product != null){
            if($product->qty_store <= 0){
                return redirect()->back()->with('error', 'Sản phẩm đã hết hàng');
            }else{
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $req->session()->put('Cart', $newCart);

            $this->saveCartToDatabase($req, $newCart);
            }
        }
        return view('/layouts/cart');
    }

    public function DeleteItemCart(Request $req, $id){
        
        $oldCart = session('Cart') ? session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if((count($newCart->products)) > 0){
            $req->session()->put('Cart', $newCart);
        }
        else{
            $req->session()->forget('Cart');

        }

        $this->deleteProductFromDatabase($req, $id);

        return view('/layouts/cart');

    }
    private function deleteProductFromDatabase($req, $id) {
        $user_id = auth()->user()->id_user; 
    
        DB::table('ct_cart')->where(['id_user' => $user_id, 'id_product' => $id])->delete();
    }

    private function saveCartToDatabase($req, $cart) {
        $user_id = auth()->user()->id_user; 
    
        foreach ($cart->products as $id => $item) {
            DB::table('ct_cart')->updateOrInsert(
                ['id_user' => $user_id, 'id_product' => $id],
                ['qty' => $item['quanty']]
            );
        }
    }
}
