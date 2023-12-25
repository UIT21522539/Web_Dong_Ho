<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Brand;
use DateTime;

class DashBoardController extends Controller
{
    public function view(){
        $today = new DateTime();  // Tạo đối tượng DateTime với ngày và giờ hiện tại
        $day = $today->format('d');  // Lấy ngày hiện tại
        $month = $today->format('m');  // Lấy tháng hiện tại
        $order = new Order();
        $orderList = $order -> getOrderByStatus();
        $profitDay = $order -> getProfitByDay($day);
        $profitMonth = $order -> getProfitByMonth($month);

        $product = new Product();
        $productCount = $product->getCountProduct();

        $brand = new Brand();
        $brandCount = $brand->getCountBrand();

        return view('admin.dashboard.dashboard',compact('orderList','productCount','brandCount','profitDay','profitMonth'));
    }
}
