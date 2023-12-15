
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
    <div style="display: flex; margin-bottom: 20%">
        <div class="tab">
            <div class="tag-menu">
                <div class="tag-info">
                    <img width="74px" height="74px" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                    @if(session()->has('user_session'))
                
                        <h1>{{session('user_session')->last_name}} {{session('user_session')->first_name}}</h1>
                    @endif 

                    @if (session('login_success'))
                        <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('login_success') }}</p></div>
                    @endif
                </div>
                <div>
                    <div>
                        <button class="tablinks">
                            <a href="{{route("user.orders")}}">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/product.png') }}">
                            Đơn hàng của tôi
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </a>
                    </div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'user')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/setting.png') }}">
                            Cài đặt tài khoản
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                    <div>
                        <form method="POST" action={{route('user.post.logout')}}>
                            @csrf
                            <button class="tablinks" type="submit">
                                <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/logout.png') }}">
                                Đăng xuất
                                <img width="12px" height="12px" style="margin-left: 58%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                            </button>
                        </form>
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
                            <tr class="order-info" data-modal="modalOne">
                                <td>#12345</td>
                                <td style="display: flex">
                                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                                    <div>
                                        <p style="margin-bottom: 100%">HEINZ</p>
                                        <p>40MM</p>
                                    </div>
                                </td>
                                <td>2.469.000 ₫</td>
                                <td>
                                    <input class="pretending" type="button" value="Chờ lấy hàng">
                                </td>
                            </tr>
                            <tr class="order-info" data-modal="modalOne">
                                <td>#12345</td>
                                <td style="display: flex">
                                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                                    <div>
                                        <p style="margin-bottom: 100%">HEINZ</p>
                                        <p>40MM</p>
                                    </div>
                                </td>
                                <td>2.469.000 ₫</td>
                                <td>
                                    <input class="pretending" type="button" value="Chờ lấy hàng">
                                </td>
                            </tr>
                            <tr class="order-info" data-modal="modalOne">
                                <td>#12345</td>
                                <td style="display: flex">
                                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                                    <div>
                                        <p style="margin-bottom: 100%">HEINZ</p>
                                        <p>40MM</p>
                                    </div>
                                </td>
                                <td>2.469.000 ₫</td>
                                <td>
                                    <input class="asking" type="button" value="Đã nhận được hàng">
                                </td>
                            </tr>
                            <tr class="order-info" data-modal="modalOne">
                                <td>#12345</td>
                                <td style="display: flex">
                                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                                    <div>
                                        <p style="margin-bottom: 100%">HEINZ</p>
                                        <p>40MM</p>
                                    </div>
                                </td>
                                <td>2.469.000 ₫</td>
                                <td>
                                    <input class="done" type="button" value="Đã hoàn tất">
                                </td>
                            </tr>
                    </table>
                </form>
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
 
    @endsection
@push('scripts')
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
@endpush