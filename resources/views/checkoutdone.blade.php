<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/checkout-done.css') }}">
    <title>Checkout Done</title>
</head>
<body>
    
    <div class="complete">
        <div class="complete-info">
            <div class="complete-info-header">
                <div style="display: none">{{ $user = auth()->user() }}</div>
                <div style="display: none">{{ $order = auth()->user()->orderProducts  }}</div>
                <img style=" margin-bottom: 5%;" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}"><br>
                <img width="92px" height="92px" src="{{ asset('assets/img/User/checkout-done/complete.png') }}" alt="">
                <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
                <p class="p01">Mã đơn hàng: <span><b></b></span></p>
                <p class="p02">Thông tin cụ thể về đơn hàng đã được gửi vào e-mail của bạn.</p>
            </div>

            <div class="complete-info-banking">
                <h2>THÔNG TIN CHUYỂN KHOẢN</h2>
                <p>Số tài khoản: <span><b>000028674</b></span></p></p>
                <p>Chủ tài khoản: <span><b>CTCP Phát triển Sản phẩm Sáng Tạo Việt</b></span></p></p>
                <p>Tên ngân hàng: <span><b>Bản Việt (Viet Capital)</b></span></p></p>
                <p>Chi nhánh: <span><b>Hà Nội</b></span></p></p>
            </div>  
            
            
            <div class="complete-info-banking">
                <h2>THÔNG TIN KHÁCH HÀNG</h2>
                <p>Tên người mua: <span><b>{{ $name }}</b></span></p>
                <p>Số điện thoại: <span><b>{{ $phone }}</b></span></p>
                <p>Địa chỉ nhận hàng: <span><b>{{ $location }}</b></span></p>

            </div>  

            <form  class="form-button"action="/ct_thanhtoan" method="POST">
                
                <input class="button-49" type="submit" name="" id="" value="TIẾP TỤC MUA SẮM">
                @csrf
            </form>
        </div>

        <div class="order-bg">
            <div class="order">
                <div class="order-header">
                    <h1>ĐƠN HÀNG</h1> 
                </div>
                <hr>
                
                <div style="display: none;">{{ $price = 0 }}</div>
                @foreach (auth()->user()->cartProducts as $product)
                @foreach ($result as $item)
                @if($product->id_product==$item->id_product)
                <div class="order-product">
                        <img width="84px" height="84px" src="{{ $product->img_main }}">
                        <div class="pd02">
                            <p style="margin-bottom: 18%">{{ $product->name }}</p>
                            <p>{{ $item->qty }}</p>
                        </div>
                        <div style="display: none"> {{ $price += $item->total_item }}</div>
                    <p style="margin-left: 30%; margin-top: 4%; font-size: 18px"><b>{{ $product->sellprice }} ₫</b></p>
                </div>
                @endif
                @endforeach
                @endforeach
                <hr style="margin-top: 6%; margin-bottom: 5%">
                
                <div class="bill">
                    <div class="bill-total">
                        <p style="display: flex;font-size: 18px; margin-bottom: 12px">Thành tiền</p>
                        <p><b style="right:0; margin-left: 380px" >  {{ $price }} ₫</b></p>
                    </div>
                    <div class="bill-shipped">
                        <p>Phí ship</p>
                        <p><b style="right:0; margin-left: 450px" > 0 ₫</b></p>
                    </div>
                    <hr style="margin-top: 6%; margin-bottom: 5%">
                </div>
                <div class="order-product-sum">
                    <p style="font-size: 20px">TỔNG:</p>
                    <p><h1 style="margin-left: 340px"> {{ $price }} ₫</h1></p>
                 </div>
                 
        </div>
            
        </div>
    </div>
</body>
</html>