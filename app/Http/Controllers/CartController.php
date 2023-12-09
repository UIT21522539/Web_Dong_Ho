<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function addProduct(Request $request) {
        if (!auth()->user()) {
            return redirect('login');
        }

        
        Carts::updateOrCreate(
            [
                'id_user' => auth()->user()->id_user,
                'id_product' => $request->id,
            ],[
            'id_user' => auth()->user()->id_user,
            'id_product' => $request->id,
            'qty' => 1
        ]);

        return back();
    }

    public function getProduct(Request $request) {
        if (!auth()->user()) {
            return redirect('login');
        }
        $products = [];

        $id_user = auth()->user()->id_user;
        $carts= Carts::where('id_user', $id_user)->get();
        foreach ($carts as $cart) {
            array_push($products, Product::find($cart->id_product));
        }
        return $products;

    }
}


