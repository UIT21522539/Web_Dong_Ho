<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/checkout.css') }}">
    <title>Checkout</title>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    @if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif
    <div style="display: none">{{ $user = auth()->user() }}</div>
    <div class="checkout">
        <div class="customer-info">
            <div class="customer-info-header">
                <img src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                <h1>THÔNG TIN KHÁCH HÀNG</h1>
            </div>

            <div class="customer-info-input">
                <form action='/thanhtoan' method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td colspan="2">                
                                <input style="width: 90%;" type="text" name="email" placeholder="Email" value="{{ old('email') ?: $user->email }}">
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Họ tên" name="name" value="{{  $user->first_name . " " . $user->last_name }}">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" placeholder="Số điện thoại" name="phone" value="{{old('phone') ?: $user->phone }}">
                                @error('phone')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 90%" type="text" name="location" placeholder="Địa chỉ nhận hàng" value="{{old('location') ?: $user->location ?: '' }}">
                                @error('location')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea rows="10" cols="72" name="note" placeholder="Nhập ghi chú nếu cần"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p class="info-remind">Phương thức vận chuyển là <span style="color:rgba(0, 188, 38, 0.645)">FREESHIP</span> với đơn hàng từ 700.000đ</p></td>
                        </tr>
                        <tr>
                            @if(Session::has("Cart") != null)
                            <input type="hidden" name="total_momo" value="{{(Session::get('Cart')->totalPrice) }}">
                            <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                            @endif
                            <td colspan="2" ><input name="payUrl" style="width: 40%" type="submit" value="THANH TOÁN MOMO"></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><input name="cod" style="width: 40%" type="submit" value="THANH TOÁN COD"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="order-bg" id="changeItemCart2">
            @if(Session::has("Cart") != null)
            <div class="order">
                <div class="order-header">
                    <h1>ĐƠN HÀNG</h1> 
                </div>
                <hr>
                <div class="order-update">
                    <a  href="#" onclick="toggleProduct()">Sửa</a>
                </div>
                @php
                    $Price = 0;
                @endphp
                @foreach (Session::get('Cart')->products as $item)
                    <div class="show-product-close" id="{{$item['productInfo']->id_product }}">
                        {{-- <script>
                            deleteProduct({{$item['productInfo']->id_product }});
                        </script> --}}
                    </div>
                    <div class="order-product">
                        <div>
                            <button onclick="deleteProduct({{$item['productInfo']->id_product }})" style="display: none;" class="showBTN">×</button>
                        </div>
                        <img width="84px" height="84px" src="{{ $item['productInfo']->img_main }}">
                        <div class="pd02">
                            <p style="margin-bottom: 3%;">{{ $item['productInfo']->name }}</p>
                            <p style="margin-top: 10%">Qty:{{ $item["quanty"] }}</p>
                        </div>
                        <p style="margin-top: 2%; font-size: 18px; position: absolute; margin-left: 500px">
                            @if($item['productInfo']->isdiscount == '1')
                                @php
                                    $discountedPrice =($item['productInfo']->sellprice - $item['productInfo']->sellprice * ($item['productInfo']->discount / 100))*$item["quanty"] ;
                                    $finalPrice = number_format($discountedPrice) . ' đ';
                                    $Price =$Price+ $discountedPrice;
                                @endphp
                                {{-- <b>{{ $finalPrice }}</b> --}}
                                <b>{{ $finalPrice }} ₫</b>
                                {{-- <p class="tien">{{ $finalPrice }}</p> --}}
                                
                            @else
                                <b>{{ number_format($item['productInfo']->sellprice * $item["quanty"]) }} ₫</b>
                                @php
                                $Price = $Price + $item['productInfo']->sellprice * $item["quanty"];
                                @endphp
                            @endif
                            
                        </p>
                    </div>
                @endforeach
                
                <hr style="margin-top: 6%; margin-bottom: 5%">
                <div class="bill">
                    <div class="bill-total">
                        <p style="display: flex;font-size: 18px; margin-bottom: 12px">Thành tiền</p>
                        <p><b style="right:0; margin-left: 430px" > {{ number_format($Price) }} ₫</b></p>
                    </div>
                    <div class="bill-shipped">
                        <p>Phí ship</p>
                        @if($Price<=700000)
                        <p><b style="right:0; margin-left: 486px" > 30.000 ₫</b></p>
                        @php
                            $Price = $Price + 30000;
                        @endphp
                        @else
                        <p><b style="right:0; margin-left: 486px" > 0 ₫</b></p>
                        @endif
                        
                    </div>
                    <hr style="margin-top: 6%; margin-bottom: 5%">
                </div>
                <div class="order-product-sum">
                    <p style="font-size: 20px">TỔNG:</p>
                    
                    <p><h1 style="margin-left: 370px">{{ number_format($Price) }} ₫</h1></p>
                 </div>
        </div>
    @endif
            
    </div>
    </div>

    <script>
        function toggleProduct(){
            var divTables = document.getElementsByClassName("showBTN");
            for (var i = 0; i < divTables.length; i++) {
                divTables[i].style.display = (divTables[i].style.display === 'none') ? '' : 'none';
        }
        }

        function AddCart(id) {
    // Get the CSRF token from the meta tag in the HTML
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // var url = 'Add-Cart/' + id;
        var url = "{{ url('/Add-Cart') }}/" + id;
        console.log( "{{ url('/Add-Cart') }}/" + id);

        // Include the CSRF token in the AJAX request headers
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .done(function (response) {
            // Check if the response contains a redirect URL
            if (response.redirect) {
                window.location.href = response.redirect;
            } else {
                RenderCart(response, id);
                alertify.success('Đã thêm giỏ hàng thành công');
            }
        })
        .fail(function (xhr, status, error) {
            // Handle AJAX request failure
            console.error(error);

            // Check if the response status is 401 (Unauthorized)
            if (xhr.status === 401) {
                // Redirect to the login page
                window.location.href = '/login';
            }
        });
    }

        function deleteProduct(productIndex) {
            var divTables = document.getElementById(productIndex);
            divTables.style.display = '';
            var html = `<div class="product-close">
                        <h3>Đừng làm thế, xin bạn đấy!</h3>
                            <div>
                                <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
                                <button class="bt02" data-id="${productIndex}">XOÁ SẢN PHẨM</button>
                            </div>
                        </div>`

            divTables.innerHTML = html;
            
        }

        function turnback(productIndex){
            var divTables = document.getElementById(productIndex);
            divTables.style.display = 'none';
        }

        $(document).on("click", ".bt02", function() {
            // console.log("{{ url('/Delete-Cart/') }}/" + $(this).data('id') +'/'+ 2) ;
            var url = "{{ url('/Delete-Cart/') }}/" + $(this).data('id') +'/'+ 2;

            $.ajax({
                url: url,
                type: 'GET',
            }).done(function(response){
                RenderCart(response);
                // alertify.success('Đã xoá giỏ hàng thành công');
            });
        });

        function RenderCart(response){
            $("#changeItemCart2").empty();
            $("#changeItemCart2").append(response);
        }
    </script>
</body>
</html>