
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/User/checkout-done.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
    <div class="complete-page">
        <div class="complete-info">
          {{-- {{dd($order->orderDetail)}}  --}}
    
            <div class="complete-info-header">
                <img style=" margin-bottom: 5%;" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}"><br>
                <img width="92px" height="92px" src="{{ asset('assets/img/User/checkout-done/complete.png') }}" alt="">
                <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
                <p class="p01">Mã đơn hàng: <span><b>{{$order->id_order}}</b></span></p>
                <p class="p02">Thông tin cụ thể về đơn hàng đã được gửi vào e-mail của bạn.</p>
            </div>

            <div class="complete-info-banking">
                <h2>THÔNG TIN CHUYỂN KHOẢN</h2>
                <p>Số tài khoản: <span><b>000028674</b></span></p></p>
                <p>Chủ tài khoản: <span><b>CTCP Phát triển Sản phẩm Sáng Tạo Việt</b></span></p></p>
                <p>Tên ngân hàng: <span><b>Bản Việt (Viet Capital)</b></span></p></p>
                <p>Chi nhánh: <span><b>Hà Nội</b></span></p></p>
            </div>  

            <div class="complete-info-customer">
                <h2>THÔNG TIN KHÁCH HÀNG</h2>
                <p>Tên người mua: <span><b>{{$order->last_name .' ' . $order->first_name}}</b></span></p></p>
                <p>Số điện thoại: <span><b>{{$order->phone}}</b></span></p></p>
                <p>Thành phố: <span><b>{{$order->location}}</b></span></p></p>
                <div>
                    <p>Note</p>
                    <p>{{$order->note}}</p>
                </div>
            </div>  
        </div>
        <div class="orders">
            <div class="order-header">
                <h1>ĐƠN HÀNG</h1> 
            </div>
            
            <div class="order-lists">
                @foreach ($order->orderDetail as $item)
                <div class="order-item">
                    <div class="thumb"></div>
                    <div class="pd02">
                    <p>{{$item->product->name}}</p> 
                        <p>Qty: {{$item->qty}}</p>
                    </div>
                <p><b>{{ number_format($item->sellprice, 0, ',', '.')}} VND</b></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection