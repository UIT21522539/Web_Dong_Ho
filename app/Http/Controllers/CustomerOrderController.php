<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\CT_Order;
class CustomerOrderController extends Controller
{
    //
    public function __construct() {
        if( Session::has('user_session')){
            
            return redirect(route('user.login'));
        }
     }
     
    public function showCheckout () {
        return view('checkout');
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

    public function makeOrder (Request $request) {


        $user = Session::get('user_session');


        $products = [];
    
        foreach($request->items as $item){
            $prd = Product::where([
                ['status',1],
                ['id_product',  $item['id']]
            ])->first();


            if($prd->qty_store < (int)$item['quantity']){
                return redirect()->back()->with('error', 'Số lượng sản phẩm '.$prd->name.' không đủ.');
              
            }else{
                $products[] = array(
                    "id" =>  $prd->id_product,
                    'sellprice' =>   $prd->sellprice,
                    'order_quantity' => (int)$item['quantity'],
                    'stock_quantity' =>  $prd->qty_store,
                );
       
            }
        }
        // dd( $products );
        //get total
        $total = 0;
        foreach($products as $product){

            $total +=  $product['order_quantity'] * $product['sellprice']; 
        }

        $data = array(
            'id_user' => $user->id_user,
            "email" => $user->email,
            'last_name' => $request->last_name,
            'first_name' =>  $request->first_name,
            'phone' =>  $request->phone,
            'location' =>  $request->location,
            "note"  =>   $request->note,
            'status' => 1,
            'total_order'   =>  $total
        );
 
         $order = Order::create($data);


        foreach($products as $prd){
           
            $order_detail = new CT_Order();
            $order_detail->id_order =  $order->id_order;
            $order_detail->id_product = $prd['id'];
            $order_detail->qty = $prd['order_quantity'];
            $order_detail->sellprice =  $prd['sellprice'];
            $order_detail->total_item = $prd['order_quantity'] * $prd['sellprice'];
        
            $order_detail->save(); 

            //update quantity
            $product = Product::where([
                ['id_product', $prd['id']]
            ])->first();
            $product->qty_store = $prd['stock_quantity'] - $prd['order_quantity'];
            $product->save();
        }


        return view('checkout-done', ['order' =>  $order]);
    }


    public function confirmOrder () {

        return view('checkout-done', ['orders' =>  ''])->with('success',"Đặt hàng thành công.");;

    }
}
