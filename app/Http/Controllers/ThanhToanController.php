<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CT_Order;
use App\Models\CTOrder;
use App\Models\Carts;

use App\Http\Requests\OrderRequest;
use session;
use DB;

class ThanhToanController extends Controller
{
    //
    public function paymentProcessing(Request $request) 
    {
        if (!auth()->user())
    {
        return redirect('/login');
    }

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|ends_with:@gmail.com',
        'location' => 'required|string',
        'phone' => 'required|string|digits:10|numeric',
    ], [
        'name.required' => 'Vui lòng nhập tên.',
        'email.required' => 'Vui lòng nhập email.',
        'email.email' => 'Email không hợp lệ.',
        'email.ends_with' => 'Email phải kết thúc bằng "@gmail.com".',
        'location.required' => 'Vui lòng nhập địa chỉ.',
        'phone.required' => 'Vui lòng nhập số điện thoại.',
        'phone.digits' => 'Số điện thoại phải chứa đúng 10 chữ số.',
        'phone.numeric' => 'Số điện thoại phải là số.',
    ]);
    
    

    $user = auth()->user();

    $orderData = [
        'id_user' => $user->id_user,
        'first_name' => $request->name,
        'last_name' => $request->name,
        'email' => $request->email,
        'location' => $request->location,
        'phone' => $request->phone,
        'total_order' => 0,
        'status' => 1,
    ];

    $order= new Order();
    $order->addOrder($orderData);
    $ctorder = new CT_Order();
    // $price = 0;

        // foreach($user->cartProducts as $product) {
        //     CTOrder::create([
        //         'id_order' =>$order->id_order,
        //         'id_product' => $product->id_product,
        //         'qty' => $product->qty,
        //         'sellprice' => $product->sellprice,
        //         'total_item' => $product->sellprice 
        //     ]);
        //     $price += $product->sellprice ;
        
    //     }
    //     $order->total_order = $price;
    //     $order->save();
    //     return redirect('checkoutdone');
    // }
    $oldCart = session('Cart') ? session('Cart') : null;
    $price = 0;
    $latestOrder = Order::where('id_user', $user->id_user)->latest('id_order')->first();
    if ($oldCart && isset($oldCart->products)) {
        foreach ($user->cartProducts as $product) {
            $cartProduct = $oldCart->products[$product->id_product] ?? null;

            if ($cartProduct) {
                CTOrder::create([
                    'id_order' => $latestOrder->id_order,
                    'id_product' => $product->id_product,
                    'qty' => $cartProduct['quanty'],
                    'sellprice' => $product->sellprice,
                    'total_item' => $product->sellprice * $cartProduct['quanty'],
                ]);

                $price += $product->sellprice * $cartProduct['quanty'];
            }
        }
        $request->session()->forget('Cart');
    } else {
        return "Không có dữ liệu sản phẩm";
    }

    $latestOrder->total_order = $price;
    $latestOrder->save();
    $name = $latestOrder -> first_name;
    $location = $latestOrder->location;
    $phone = $latestOrder->phone;
    $result= $ctorder->getCTOrder($latestOrder -> id_order);
    

    return view('checkoutdone', compact('name','location','phone','result'));
    
}}