<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div style="display: flex; margin-bottom: 20%">
        <div class="tab">
            <div class="tag-menu">
                <div class="tag-info">
                    <img width="74px" height="74px" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                    <h1>CURNON USER</h1>
                </div>
                <div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'order')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/product.png') }}">
                            Đơn hàng của tôi
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'user')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/setting.png') }}">
                            Cài đặt tài khoản
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'getout')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/logout.png') }}">
                            Đăng xuất
                            <img width="12px" height="12px" style="margin-left: 58%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-tag">
            <div id="order" class="tabcontent">
                <h3>Order</h3>
                <p>Its just an order</p>
            </div>
            <div id="user" class="tabcontent">
                <button>Sửa</button>
                <h2 style="margin-bottom: 6%;">Thông tin của tôi</h2>
                <div>
                    <p>Email</p>
                    <p>trucquynh13303@gmail.com</p> 
                </div>
                <div>
                    <p>Tên</p> 
                    <p>Trúc Quỳnh</p> 
                </div>
                <div>
                    <p>Họ</p> 
                    <p>Trần</p> 
                </div>
                <div>
                    <p>Ngày tháng năm sinh</p> 
                    <p>12/03/2003</p> 
                </div>
                <div>
                    <p>Số điện thoại</p> 
                    <p>123134456677</p> 
                </div>
                <div>
                    <p>Giới tính</p> 
                    <p>Nữ</p> 
                </div>
                <div>
                    <p>ZIP code</p> 
                    <p>710000</p>
                </div>
                <div>
                    <p>Quốc gia</p>
                    <p>Việt Nam</p> 
                </div>         
            </div>

            <div id="getout" class="tabcontent">
                <h3>Please get out</h3>
                <p>Get out please</p>
            </div>
        </div>
    </div>
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
    </script>
    @endsection
</body>
</html>