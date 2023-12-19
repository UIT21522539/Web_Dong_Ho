

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/User/checkout.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
    <div class="checkout-container ">
        <form method="POST" action="{{route("user.makeOrder")}}">
            @csrf
            <div class="row">
                <div class="customer-info col">
                    <div>
                        <div class="customer-header customer-info-header">
                            <h1 class="title">THÔNG TIN KHÁCH HÀNG</h1>
                        </div>
                        <div class="customer-info-input">
                            <div class="row">
                                <div class="col form-control">
                                    <label>Họ</label>
                                    <div class="input">
                                        <input type="text" name="last_name" placeholder="Họ">
                                        @if($errors->has('last_name'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('last_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col form-control">
                                    <label>Tên đệm và tên</label>
                                    <div class="input">
                                        <input type="text" name="first_name" placeholder="Tên đệm và tên">
                                        @if($errors->has('first_name'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-control">
                                    <label>Địa chỉ email</label>
                                    <div class="input">
                                        @if(session()->has('user_session'))
                                            <input type="email" name="email" disabled placeholder="Email" value="{{session('user_session')->email}}">
                                        @else 
                                            <input type="email" name="email" placeholder="Email" value="">
                                        @endif
                                        @if($errors->has('email'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col form-control">
                                    <label>Số điện thoại</label>
                                    <div class="input">
                                        <input type="text" name="phone" placeholder="Số điện thoại">
                                        @if($errors->has('phone'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                                <div class="form-control">
                                    <label>Thành phố</label>
                                    <div class="input">
                                        <input type="text" name="location" placeholder="Thành phố">
                                        @if($errors->has('location'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('location') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-control">
                                    <label>Ghi chú</label>
                                    <div class="input">
                                        <textarea rows="5" cols="72" name="note" placeholder="Nhập ghi chú nếu cần"></textarea>
                                        @if($errors->has('note'))
                                            <p class="text-xs py-2 text-red-500">{{ $errors->first('note') }}</p>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="order-bg col">
                    <div class="order">
                        <div class="customer-header order-header">
                            <h1 class="title">ĐƠN HÀNG</h1> 
                        </div>
                        @if (session('error'))
                            <div class="text-xs text-red-500"><p>{{ session('error') }}</p></div>
                        @endif
                        <div class="order-items">
                                @php
                        
                                $isShow = true;
                                $total = 0;
                            if(session()->has('cart')){
                                    $cart = session('cart');
                                    if(count($cart['items']) == 0){
                                        $isShow = false;
                                    }
                            }else{
                                $isShow = false;
                            }
                            @endphp
                
                            @if($isShow)
                                <table class="table-order">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Sản phẩm</td>
                                            <td>Số lượng</td>
                                            <td>Giá tiền</td>
                                            <td>Tạm tính</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('cart')['items'] as $cart)
                                            <tr>
                                                <td>
                                                    <div>
                                                        <img src="{{asset('images/products/'.$cart['image'].'')}}" alt="product" width="60" height="60"/>
                                                    </div>
                                                </td>
                                                <td><p>{{ $cart['name']}}</p>
                                                    <input type="hidden" name="items[{{$cart['id']}}][id]" value="{{$cart['id']}}"/>
                                                </td>
                                                <td><p>{{ $cart['quantity']}}</p> <input type="hidden" name="items[{{$cart['id']}}][quantity]" value="{{$cart['quantity']}}"/></td>
                                                <td>{{ $cart['price']}}</td>
                                                <td>{{ $cart['price'] * $cart['quantity']}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        
                                            <td colspan="2">Tổng tiền</td>
                                                <td colspan="3">{{ number_format(session('cart')['total'], 0, ',', '.')}} VND</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                            @else
            
                                <div class="cart-empty">Chưa có sản phẩm nào trong giỏ hàng</div>
                            
                            @endif
                        </div>
                        <div class="actions">
                            <button type="submit" class="btn-order">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
  
    </div>
@push('scripts')
<script>
    // function toggleProduct(){
    //     var divTables = document.getElementsByClassName("showBTN");
    //     for (var i = 0; i < divTables.length; i++) {
    //         divTables[i].style.display = (divTables[i].style.display === 'none') ? '' : 'none';
    // }
    // }

    // function deleteProduct(productIndex) {
    //     var divTables = document.getElementsByClassName('show-product-close');
    //     var html = `<div class="product-close">
    //                 <h3>Đừng làm thế, xin bạn đấy!</h3>
    //                     <div>
    //                         <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
    //                         <button class="bt02">XOÁ SẢN PHẨM</button>
    //                     </div>
    //                 </div>`
    //     for (var i = 0; i < divTables.length; i++) {
    //         if (i === productIndex) {
    //             divTables[i].innerHTML = html;
    //         }
    //     }
    // }

    // function turnback(productIndex){
    //     var divTables = document.getElementsByClassName('product-close');
    //     for (var i = 0; i < divTables.length; i++) {
    //         if (i === productIndex) {
    //             divTables[i].style.display = 'none';
    //         }
    //     }
    // }
</script>

@endpush
  