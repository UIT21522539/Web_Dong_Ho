
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
        <div class="cart-layout" >
            <div class="header mb-3">
               <h1>Giỏ hàng</h1>
            </div>
            <div class="content-cart">
              
                @php
                 
                    $isShowCart = true;
                    $total = 0;
                   if(session()->has('cart')){

                        $cart = session('cart');

                        if(count($cart['items']) == 0){

                            $isShowCart = false;

                          
                        }

                   }else{

                    $isShowCart = false;
                   }
                   

                @endphp
       

                @if($isShowCart)
                   
                    <table class="table-cart">
                        <thead>
                            <tr>
                                <td colspan="2">Sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Giá tiền</td>
                                <td>Tạm tính</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('cart')['items'] as $cart)
                                <tr>
                                    <td>
                                        <div class="thumb">
                                            <img src="{{asset('images/products/'.$cart['image'].'')}}" alt="product" width="60" height="60"/>
                                        </div>
                                    </td>
                                    <td>{{ $cart['name']}}</td>
                                    <td>{{ $cart['quantity']}}</td>
                                    <td>{{ number_format($cart['price'], 0, ',', '.')}}VND</td>
                                    <td>{{ number_format($cart['price'] * $cart['quantity'], 0, ',', '.')}}VND</td>
                                    <td>
                                        <form method="POST" action={{route('deleteCart', $cart['id'])}}>
                                            @csrf
                                            @method('DELETE') 
                                            <input type="hidden" name="product_id" value="{{$cart['id']}}"/>
                                            <button type="submit">Xoá</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <a href="{{route('user.checkout')}}" class="btn">Đặt hàng</a>
                                    <td colspan="4">
                                        <p>Tổng tiền</p>
                                       <p>{{ number_format(session('cart')['total'], 0, ',', '.')}} VND</p>
                                    </td>
                            </tr>
                        </tfoot>
                    </table>
                  


                @else

                    <div class="cart-empty">Chưa có sản phẩm nào trong giỏ hàng</div>
                
                @endif

            </div>
        </div>
    </div>
    @endsection
