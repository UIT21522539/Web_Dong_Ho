<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\CT_Order;
class CustomerOrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function updateStatusOrder (Request $request) {

        $user = Session::get('user_session');

        $order = Order::where([
            ['id_order', $request->order_id],
            ['id_user', $user->id_user]
        ])->first();

        if( $order){
            $order->status = 4;
            $order->save();
    
            return redirect()->back()->with('success', 'Huỷ đơn hàng #'.$order->order_id.' thành công');
        }
        return redirect()->back()->with('error', "Huỷ đơn hàng thất bại");
    }


}
