<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CTOrder;
use App\Models\Carts;

class ThanhToanController extends Controller
{
    //
    public function paymentProcessing(Request $request) 
    {
        if (!auth()->user())
        {
            return redirect('/login');
        }

        $user = auth()->user();

        $order = Order::create([
            'id_user' => $user->id_user,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'location' => $user->location,
            'phone' => $user->phone,
            'total_order' => 0,
            'status' => 1,
        ]);
        $price = 0;

        foreach($user->cartProducts as $product) {
            CTOrder::create([
                'id_order' =>$order->id_order,
                'id_product' => $product->id_product,
                'qty' => $product->qty,
                'sellprice' => $product->sellprice,
                'total_item' => $product->sellprice 
            ]);
            $price += $product->sellprice ;
        
        }
        $order->total_order = $price;
        $order->save();
        return redirect('checkoutdone');
    }
}