<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\CT_Order;

use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function orderList(){
        $order = new Order();
        $order = $order->getAllOrder();

        return view('admin.order.orderlist', ['order' => $order]);
    }


    // public function orderDetail(Request $request, $id){

    //     $title = 'Thông tin chi tiết đơn hàng';
            
    //         if(!empty($id)){
    //             $order = new Order();
    //             $orderDetail = $order->getOrderById($id);
    //             if(!empty($orderDetail[0])){
    //                 $request->session()->put('id',$id);
    //                 $orderDetail = $orderDetail[0];

    //                 $order= new CT_Order();
    //                 $ct_orderList = $order->getOrderByIdOrder($id);
    //             }else{
    //                 return redirect()->route('orders.list')->with('msg','Đơn hàng không tồn tại');
    //             }
    //         }else{
    //             return redirect()->route('orders.list')->with('msg','Đơn hàng không tồn tại');
    //         }
    
    //         return view('admin.order.orderdetail',compact('title','orderDetail','ct_orderList'));
    // }

    public function orderDetail(Request $request, $id){

  
        $order = Order::where([
            ['id_order', $id]
        ])->first();
        
        return view('admin.order.orderdetail',compact('order'));
    }

    public function updateOrder(Request $request, $id){
        
    
        $order = Order::where([
            ['id_order', $id],
            ['id_user', $request->user_id]
        ])->first();

        $order->status = $request->status;
        $order->save();

        // return redirect()->route('dashboard')->with('order', $order);

           return redirect()->back()->with('success', "cập nhật đơn hàng thành công");

    }

    // public function updateOrder(Request $request, $id){
    //     if(!empty($id)){
    //         $order = new Order();
    //         $orderDetail = $order->getOrderById($id);
    //         if(!empty($orderDetail[0])){
    //             $updateSatus = $order -> updateOrder($id);
    //             if($updateSatus){
    //                 $msg = 'Cập nhật đơn hàng thành công';
    //             }else{
    //                 $msg = 'Bạn không thể cập nhật đơn hàng lúc này. Vui lòng thử lại sau!';
    //             }
    //         }else{
    //             $msg = 'Liên kết không tồn tại';
    //         }
    //     }else{
    //         $msg = 'Liên kết không tồn tại';
    //     }

    //     return redirect()->route('dashboard')->with('msg',$msg);
    // }
    public function deleteOrder(Request $request, $id ){
        if(!empty($id)){
            $order = new Order();
            $orderDetail = $order->getOrderById($id);
            if(!empty($orderDetail[0])){
                $deteleSatus = $order -> cancelOrder($id);
                if($deteleSatus){
                    $msg = 'Hủy đơn hàng thành công';
                }else{
                    $msg = 'Bạn không thể hủy đơn hàng lúc này. Vui lòng thử lại sau!';
                }
            }else{
                $msg = 'Liên kết không tồn tại';
            }
        }else{
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('dashboard')->with('msg',$msg);
    }
}
