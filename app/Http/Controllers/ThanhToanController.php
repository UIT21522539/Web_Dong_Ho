<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CT_Order;
use App\Models\CTOrder;
use App\Models\Carts;
use App\Models\Product;

use App\Http\Requests\OrderRequest;
use session;
use DB;

class ThanhToanController extends Controller
{
    
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function paymentProcessing(Request $request) {
        if (!auth()->user())
        {
            return redirect('/login');
        }
        if(isset($_POST['payUrl'])){
            
            $user = auth()->user();
            $order = new Order();
            $orderList = $order->getOrderByIdUserProduct($user->id_user);

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
            $oldCart = session('Cart') ? session('Cart') : null;
            $price = 0;
            $latestOrder = Order::where('id_user', $user->id_user)->latest('id_order')->first();
            if ($oldCart && isset($oldCart->products)) {
                foreach ($user->cartProducts as $product) {
                    $cartProduct = $oldCart->products[$product->id_product] ?? null;
    
                    if ($cartProduct) {
                        if($product->isdiscount=='1'){
                            $sellprice = $product->sellprice - $product->sellprice * $product->discount/100;
                        }
                        else{
                            $sellprice = $product->sellprice;
                        }
                        CTOrder::create([
                            'id_order' => $latestOrder->id_order,
                            'id_product' => $product->id_product,
                            'qty' => $cartProduct['quanty'],
                            'sellprice' => $sellprice,
                            'total_item' => $sellprice * $cartProduct['quanty'],
                        ]);
                        $p = new Product();
                        $p -> updateQty($product->id_product, $cartProduct['quanty']);
                        $price += $sellprice * $cartProduct['quanty'];
                        
                    }
                }
                $request->session()->forget('Cart');
            } else {
                return "Không có dữ liệu sản phẩm";
            }
    
            $latestOrder->total_order = $price;
            $latestOrder->save();

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $price;
            $orderId = "0" . $orderList[0]->id_order + 1;
            $redirectUrl = "http://127.0.0.1:8000/home";
            $ipnUrl = "http://127.0.0.1:8000/home";
            $extraData = "";

                $partnerCode =  $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId; // Mã đơn hàng
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;

                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                // dd($signature);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                // dd($result);
                $jsonResult = json_decode($result, true);
    
            
    
            return redirect()->to($jsonResult['payUrl']);

            // return redirect()->to($jsonResult['payUrl']);
                
        }
        elseif(isset($_POST['cod']))
        {
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
        }
        
    }

    public function paymentProcessingFast(Request $request, $id) {
        if (!auth()->user())
        {
            return redirect('/login');
        }
        if(isset($_POST['payUrl'])){
            
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
            $order = new Order();
            $orderList = $order->getOrderByIdUserProduct($user->id_user);
            $p = new Product();
            $product = $p-> getProduct($id);
            $product = $product[0];
            if($product->isdiscount=='1'){
                $sellprice = $product->sellprice - $product->sellprice * $product->discount/100;
            }
            else{
                $sellprice = $product->sellprice;
            }
            $orderData = [
                'id_user' => $user->id_user,
                'first_name' => $request->name,
                'last_name' => $request->name,
                'email' => $request->email,
                'location' => $request->location,
                'phone' => $request->phone,
                'total_order' => $sellprice,
                'status' => 1,
            ];
    
            $order= new Order();
            $order->addOrder($orderData);
            $ctorder = new CT_Order();
            
            $latestOrder = Order::where('id_user', $user->id_user)->latest('id_order')->first();
           
            
            CTOrder::create([
                'id_order' => $latestOrder->id_order,
                'id_product' => $product->id_product,
                'qty' => 1,
                'sellprice' => $sellprice,
                'total_item' => $sellprice ,
            ]);
            $p = new Product();
            $p -> updateQty($product->id_product, '1');
            }
    

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $sellprice;
            $orderId = "0" . $orderList[0]->id_order + 1;
            $redirectUrl = "http://127.0.0.1:8000/home";
            $ipnUrl = "http://127.0.0.1:8000/home";
            $extraData = "";

                $partnerCode =  $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId; // Mã đơn hàng
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;

                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                // dd($signature);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                // dd($result);
                $jsonResult = json_decode($result, true);
    
            
    
            return redirect()->to($jsonResult['payUrl']);

            // return redirect()->to($jsonResult['payUrl']);
                
            // return view('checkoutdone', compact('name','location','phone','result'));
        }
        
    }
    
