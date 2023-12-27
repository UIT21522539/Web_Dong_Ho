<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                                <td>Ngày đặt hàng</td>
                                <td>Thành tiền</td>
                                <td>Tình trạng</td>
                            </tr>
                            @foreach($orderListA as $order)
                            <tr class="order-info" data-modal="{{ $order->id_order }}" onclick="test({{ $order->id_order }})">
                                <td>#{{ $order-> id_order}}</td>
                                <td >
                                    {{-- <img width="84px" height="84px" src="{{ $order->img_main }}"> --}}

                                        {{ $order->day}}
                                        {{-- <p>Qty: {{ $order->qty }}</p> --}}
                                </td>
                                <td>{{  number_format($order-> total_order)}} ₫</td>
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
            @foreach($orderListA as $order)
                <div id="{{ $order->id_order }}" class="modal">
                    <div class="modal-content">
                        <div class="modal-content-info">
                            <div class="information">
                                <div class="information-text">
                                    @if($order->status == '1')
                                    <div style="display: flex">
                                        <div>
                                            <p>Người bán đang chuẩn bị đơn hàng</p>
                                            <p>Đơn hàng của bạn sẽ được chuẩn bị và sẽ chuyển đi trước ngày <span>{{ $order->day }}</span></p>
                                        </div>
                                        <img width="74px" height="74px" src="{{ asset('assets/img/User/user-info/product2.png') }}">
                                    </div>
                                    @elseif($order->status == '2')
                                    <td>
                                        <div style="display: flex">
                                            <div>
                                                <p>Đơn hàng đang được vận chuyển</p>
                                                <p>Đơn hàng của bạn đang được vận chuyển và sẽ chuyển đi trước ngày <span>{{ $order->day }}</span></p>
                                            </div>
                                            <img width="74px" height="74px" src="{{ asset('assets/img/User/user-info/delivery-truck.png') }}">
                                        </div>
                                    </td>
                                    @elseif($order->status == '3')
                                    <td>
                                        <div style="display: flex">
                                            <div>
                                                <p>Đơn hàng đã được giao thành công</p>
                                                <p>Cảm ơn bạn đã mua hàng sản phẩm bên chúng tôi</p>
                                            </div>
                                            <img width="74px" height="74px" src="{{ asset('assets/img/User/user-info/product2.png') }}">
                                        </div>
                                    </td>
                                    @elseif($order->status == '4')
                                    <td>
                                        <div style="display: flex">
                                            <div>
                                                <p>Đơn hàng đã bị huỷ bỏ</p>
                                                <p>Cảm ơn bạn đã sử dụng dịch vụ chúng tôi</p>
                                            </div>
                                            <img width="74px" height="74px" src="{{ asset('assets/img/User/user-info/setting2.png') }}">
                                        </div>
                                    </td>
                                    @endif
                                </div>
                            </div>
                            <div class="delivery-info">
                                <div style="display: flex">
                                    <img width="26px" height="26px"src="{{ asset('assets/img/User/user-info/delivery-van.png') }}">
                                    <div class="info-content">
                                        <p>Thông tin vận chuyển</p>
                                        <p>Mã đơn hàng: <span>#{{ $order->id_order }}</span></p>
                                        @if($order->status=='1')
                                            <p style="color: rgb(22, 178, 134);">Đơn hàng đang chờ được lấy</p>
                                        @elseif($order->status=='2')
                                            <p style="color: rgb(22, 178, 134);">Đơn hàng đang vận chuyển</p>
                                        @elseif($order->status=='3')
                                            <p style="color: rgb(22, 178, 134);">Đơn hàng được giao thành công</p>
                                        @elseif($order->status=='4')
                                            <p style="color: rgb(22, 178, 134);">Đơn hàng bị huỷ</p>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                            <div class="location-info">
                                <div style="display: flex">
                                    <img width="20px" height="20px" src="{{ asset('assets/img/User/user-info/location.png') }}">
                                    <div class="info-content">
                                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                        <p>{{ $user->phone }}</p>
                                        <p>{{ $user->location}}</p>
                                    </div>  
                                </div>
                            </div>
                            @foreach ($orderList as $item)
                            @if(($item->id_order) == $order->id_order)
                                <div class="product-info">
                                    <div style="display: flex; align-content: center">
                                        <img width="84px" height="84px" src="{{ $item->img_main }}">
                                        <div class="info-content">
                                            <p>{{ $item->name }}</p>
                                            <div style="display: flex">
                                                <div>
                                                    {{-- <p style="margin-bottom: 12%">{{ $order->size}}</p> --}}
                                                    <p class="sevendays">7 ngày trả hàng</p>
                                                </div>
                                                <div style="margin-left: 40%">
                                                    <p style="margin-bottom: 12%">x {{ $item->qty }}</p>
                                                    <p>{{ number_format($item->total_item) }} ₫</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

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
                                {{-- rgb(22, 178, 134) --}}
                                <div class="button-area">
                                    @if($order->status=='1')
                                        {{-- <form method="POST" action={{route('user.order.updateStatus')}}> --}}
                                        <form method="POST" action="{{ route('user.order.updateStatus',['id'=>$user->id_user]) }}">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$order->id_order}}" />
                                            <button type="submit" class="button-contact2" style="background-color: rgb(194, 45, 45);">Yêu cầu huỷ đơn hàng</button>
                                        </form>
                                    @elseif($order->status=='2')
                                        <form method="POST" action="{{ route('user.order.updateStatus',['id'=>$user->id_user]) }}">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$order->id_order}}" />
                                            <button type="submit" class="button-contact2" style="background-color: rgb(22, 178, 134);">Đã nhận được hàng</button>
                                        </form>
                                    @elseif($order->status=='3')
                                        <p style="color: rgb(22, 178, 134);">Đơn hàng được giao thành công</p>
                                    @elseif($order->status=='4')
                                        <p style="color: rgb(0, 0, 0);">Đơn hàng đã bị huỷ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <script>
                function test(id){
            
                    console.log(id);
                }
            </script>
            <div id="user" class="tabcontent">
                <button class="editUser" style="font-size: 20px; " onclick="editUserInfo()">Sửa</button>
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
                    <input style="background-color: rgb(22, 178, 134)" type="submit" name="submit" value="Sửa">
                    <button style="font-size: 20px"type="buttonm" onclick="saveUserInfo(event)">Hủy</button>
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