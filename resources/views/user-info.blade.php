<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <button class="tablinks" onclick="redirectToLogout()">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/logout.png') }}">
                            Đăng xuất
                            <img width="12px" height="12px" style="margin-left: 58%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-tag">
            <div id="order" class="tabcontent" style="width: 88%">
                <h2 style="margin-bottom: 4%;">Danh sách đơn hàng</h2>
                <form>
                    <table>
                            <tr height="44px" class="order-tab">
                                <td>Mã đơn hàng</td>
                                <td>Đơn hàng</td>
                                <td>Thành tiền</td>
                                <td>Tình trạng</td>
                            </tr>
                            @foreach($orderList as $order)
                            <tr class="order-info" data-modal="modalOne">
                                <td>#{{ $order-> id_order}}</td>
                                <td style="display: flex">
                                    <img width="84px" height="84px" src="{{ $order->img_main }}">
                                    <div>
                                        <p style="margin-bottom: 100%">HEINZ</p>
                                        <p>40MM</p>
                                    </div>
                                </td>
                                <td>{{ $order-> total_order}} ₫</td>
                                @if($order->status=='1')
                                <td>
                                    <input class="pretending" type="button" value="Chờ lấy hàng">
                                </td>
                                @elseif($order->status=='2')
                                <td>
                                    <input class="asking" type="button" value="Đang vận chuyển">
                                </td>
                                @elseif($order->status=='3')
                                <td>
                                    <input class="done" type="button" value="Đã nhận được hàng">
                                </td>
                                @elseif($order->status=='4')
                                <td>
                                    <input class="cancel" type="button" value="Đã hủy">
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        
                            
                    </table>
                </form>
            </div>

            <div id="user" class="tabcontent">
                <button onclick="editUserInfo() ">Sửa</button>
                <h2 style="margin-bottom: 6%;">Thông tin của tôi</h2>
                {{-- method="POST" action="{{ route('updateUserInfo') }}" --}}
                <form id="userInfoForm" method="POST" action="{{ route('updateUserInfo',['id'=>$user->id_user]) }}"  style="display:none; margin-top: 20px; padding: 20px; border: 1px solid #ccc;">
                    @csrf
                    <div style="margin-bottom: 10px;">
                        <label for="email" style="display: inline-block; width: 100px; font-weight: bold;">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" style="width: 200px; padding: 5px;">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="firstName" style="display: inline-block; width: 100px; font-weight: bold;">Tên</label>
                        <input type="text" name="firstName" value="{{ $user->first_name }}" style="width: 200px; padding: 5px;">
                        <br>
                        <label for="lastName" style="display: inline-block; width: 100px; font-weight: bold;">Họ</label>
                        <input type="text" name="lastName" value="{{ $user->last_name }}" style="width: 200px; padding: 5px;">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="phone" style="display: inline-block; width: 100px; font-weight: bold;">Số điện thoại</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" style="width: 200px; padding: 5px;">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="location" style="display: inline-block; width: 100px; font-weight: bold;">Địa chỉ</label>
                        <input type="text" name="location" value="{{ $user->location }}" style="width: 200px; padding: 5px;">
                    </div>
                    <input type="text" id="id" value="{{ $user->id_user }}" style="display:none; width: 200px; padding: 5px;">
                    <input type="submit" name="submit" value="Sửa">
                    <button type="buttonm" onclick="saveUserInfo(event)">Hủy</button>
                </form>                
                <div id="userInfoDisplay">
                    <div>
                        <p>Email</p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div>
                        <p>Tên</p>
                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                    </div>
                    <div>
                        <p>Số điện thoại</p>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div>
                        <p>Địa chỉ</p>
                        <p>{{ $user->location }}</p>
                    </div>
                </div>
            </div>
            {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
            <script>
                function editUserInfo() {
                    document.getElementById("userInfoForm").style.display = "block";
                    document.getElementById("userInfoDisplay").style.display = "none";
                }

                function saveUserInfo(event) {
                    event.preventDefault();
                    // Ẩn form và hiển thị thông tin đã sửa
                    document.getElementById("userInfoForm").style.display = "none";
                    document.getElementById("userInfoDisplay").style.display = "block";
                }

                function updateUserInfoDisplay(data) {
                    // Cập nhật các thành phần HTML trong #userInfoDisplay dựa trên dữ liệu nhận được
                    $('#userInfoDisplay #email').text(data.email);
                    $('#userInfoDisplay #firstName').text(data.first_name);
                    $('#userInfoDisplay #lastName').text(data.last_name);
                    $('#userInfoDisplay #phone').text(data.phone);
                    $('#userInfoDisplay #location').text(data.location);
                }

            </script>

            <div id="getout" class="tabcontent">
                <h3>Please get out</h3>
                <p>Get out please</p>
            </div>
        </div>
    </div>
    <div id="modalOne" class="modal">
        <div class="modal-content">
            <div class="modal-content-info">
                <div class="information">
                    <div class="information-text">
                        <p>Người bán đang chuẩn bị đơn hàng</p>
                        <p>Đơn hàng của bạn sẽ được chuẩn bị và chuyển đi trước <br> <span>15-12-2023</span></p>
                    </div>
                    <img width="74px" height="74px" src="{{ asset('assets/img/User/user-info/delivery-truck.png') }}">
                </div>
                <div class="delivery-info">
                    <div style="display: flex">
                        <img width="26px" height="26px"src="{{ asset('assets/img/User/user-info/delivery-van.png') }}">
                        <div class="info-content">
                            <p>Thông tin vận chuyển</p>
                            <p>Mã đơn hàng: <span>#12345</span></p>
                            <p style="color: rgb(22, 178, 134);">Đơn hàng đang chờ được lấy</p>
                        </div>  
                    </div>
                </div>
                <div class="location-info">
                    <div style="display: flex">
                        <img width="20px" height="20px" src="{{ asset('assets/img/User/user-info/location.png') }}">
                        <div class="info-content">
                            <p>Nguyễn Sơn Hà</p>
                            <p>0367306824</p>
                            <p>Tạ Quang Bửu, Ký túc xá Khu A, Đại học quốc gia TP.HCM</p>
                        </div>  
                    </div>
                </div>
                <div class="product-info">
                    <div style="display: flex; align-content: center">
                        <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                        <div class="info-content">
                            <p>HEINZ</p>
                            <div style="display: flex">
                                <div >
                                    <p style="margin-bottom: 12%">40MM</p>
                                    <p class="sevendays">7 ngày trả hàng</p>
                                </div>
                                <div style="margin-left: 40%">
                                    <p style="margin-bottom: 12%">x1</p>
                                    <p>2.469.000 ₫</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="payment-info">
                    <div style="display: flex">
                        <img width="20px" height="20px" src="{{ asset('assets/img/User/user-info/payment.png') }}">
                        <div class="info-content">
                            <p style="font-weight: 500">Phương thức thanh toán</p>
                            <p class="payment-type">Thanh toán khi nhận hàng</p>
                        </div>  
                    </div>
                </div>
                <div class="button-contact">
                    <div class="button-area">
                        <button class="button-contact1">Yêu cầu Trả hàng/Hoàn tiền</button>
                        <button class="button-contact2">Đã nhận được hàng</button>
                    </div>
                </div>
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
        let modalBtns = [...document.querySelectorAll(".order-info")];
        modalBtns.forEach(function (btn) {
            btn.onclick = function () {
            let modal = btn.getAttribute("data-modal");
            document.getElementById(modal).style.display = "block";
            };
        });
        let closeBtns = [...document.querySelectorAll(".close")];
        closeBtns.forEach(function (btn) {
            btn.onclick = function () {
            let modal = btn.closest(".modal");
            modal.style.display = "none";
            };
        });
        window.onclick = function (event) {
            if (event.target.className === "modal") {
            event.target.style.display = "none";
            }
      };
    </script>
    <script>
        function redirectToLogout() {
            // Thực hiện chuyển hướng đến route "logout"
            window.location.href = '/logout'; // Thay đổi '/logout' thành đường dẫn thực tế của route logout trong ứng dụng của bạn
        }
    </script>
    @endsection
</body>
</html>

{{-- <script>
        function redirectToLogout() {
            // Thực hiện chuyển hướng đến route "logout"
            window.location.href = '/logout'; // Thay đổi '/logout' thành đường dẫn thực tế của route logout trong ứng dụng của bạn
        }
    </script> --}}