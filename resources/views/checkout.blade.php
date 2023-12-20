<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/checkout.css') }}">
    <title>Checkout</title>
</head>
<body>
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
                                <input style="width: 90%;"type="text" name="email" placeholder="Email" value='{{ $user->email }}'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Họ tên" name="name" value="{{ $user->first_name . " " . $user->last_name }}">
                            </td>
                            <td>
                                <input type="text" placeholder="Số điện thoại" name="phone" value="{{ $user->phone }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 90%" type="text" name="location" placeholder="Địa chỉ nhận hàng" value="{{ $user->location }}">
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
                                <td colspan="2" ><input style="width: 40%" type="submit" value="THANH TOÁN NGAY"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="order-bg">
            @if(Session::has("Cart") != null)
            <div class="order">
                <div class="order-header">
                    <h1>ĐƠN HÀNG</h1> 
                </div>
                <hr>
                <div class="order-update">
                    <a  href="#" onclick="toggleProduct()">Sửa</a>
                </div>
                @foreach (Session::get('Cart')->products as $item)
                <div class="show-product-close">
                    <script>
                        deleteProduct(0);
                    </script>
                </div>
                <div class="order-product">
                    <div>
                        <button onclick="deleteProduct(0)" style="display: none;" class="showBTN">×</button>
                    </div>
                    <img width="84px" height="84px" src="{{ $item['productInfo']->img_main }}">
                    <div class="pd02">
                        <p style="margin-bottom: 3%;">{{ $item['productInfo']->name }}</p>
                        <p style="margin-top: 10%">Qty:{{ $item["quanty"] }}</p>
                    </div>
                    <p style="margin-top: 2%; font-size: 18px; position: absolute; margin-left: 500px">
                        <b>{{ number_format($item['productInfo']->sellprice * $item["quanty"]) }} ₫</b>
                    </p>
                </div>
                @endforeach
                
                <hr style="margin-top: 6%; margin-bottom: 5%">
                <div class="bill">
                    <div class="bill-total">
                        <p style="display: flex;font-size: 18px; margin-bottom: 12px">Thành tiền</p>
                        <p><b style="right:0; margin-left: 430px" > {{ number_format(Session::get('Cart')->totalPrice) }} ₫</b></p>
                    </div>
                    <div class="bill-shipped">
                        <p>Phí ship</p>
                        <p><b style="right:0; margin-left: 486px" > 0 ₫</b></p>
                    </div>
                    <hr style="margin-top: 6%; margin-bottom: 5%">
                </div>
                <div class="order-product-sum">
                    <p style="font-size: 20px">TỔNG:</p>
                    <p><h1 style="margin-left: 370px">{{ number_format(Session::get('Cart')->totalPrice) }} ₫</h1></p>
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

        function deleteProduct(productIndex) {
            var divTables = document.getElementsByClassName('show-product-close');
            var html = `<div class="product-close">
                        <h3>Đừng làm thế, xin bạn đấy!</h3>
                            <div>
                                <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
                                <button class="bt02">XOÁ SẢN PHẨM</button>
                            </div>
                        </div>`
            for (var i = 0; i < divTables.length; i++) {
                if (i === productIndex) {
                    divTables[i].innerHTML = html;
                }
            }
        }

        function turnback(productIndex){
            var divTables = document.getElementsByClassName('product-close');
            for (var i = 0; i < divTables.length; i++) {
                if (i === productIndex) {
                    divTables[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>