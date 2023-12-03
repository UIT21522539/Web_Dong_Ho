<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Brand;



class DashBoardController extends Controller
{
    public function view(){
        $order = new Order();
        $orderList = $order -> getOrderByStatus();

        $product = new Product();
        $productCount = $product->getCountProduct();

        $brand = new Brand();
        $brandCount = $brand->getCountBrand();

        return view('admin.dashboard.dashboard',compact('orderList','productCount','brandCount'));
    }
}
