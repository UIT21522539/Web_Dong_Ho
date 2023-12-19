
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
        <div class="customer-layout">
            <div class="col-left">
                <div class="col-left-head">
                    <div class="tag-info order">
                        <img width="74px" height="74px" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                        @if(session()->has('user_session'))
                    
                            <h1>{{session('user_session')->last_name}} {{session('user_session')->first_name}}</h1>
                        @endif 
    
                        @if (session('login_success'))
                            <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('login_success') }}</p></div>
                        @endif
                    </div>
                </div>
                <div class="col-left-contents">
                    <ul class="tab-links">
                        <div class="tab-link-item">
                                <a href="{{route("user.orders")}}" class="nav">
                                    <div class="tablinks-left">
                                    <img width="32px" height="32px" src="{{ asset('assets/img/User/user-info/product.png') }}">
                                    Đơn hàng của tôi
                                </div>
                                    <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                                </a>
                        </div>
                        <div class="tab-link-item">
                            <a href="{{route("user.profile")}}" class="nav">
                                <div class="tablinks-left">
                                    <img width="32px" height="32px"  src="{{ asset('assets/img/User/user-info/setting.png') }}">
                                    Cài đặt tài khoản
                                </div>
                                <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                            </a>
                        </div>
                        <div class="tab-link-item">
                            <form method="POST" action={{route('user.post.logout')}}>
                                @csrf
                                <button type="submit" class="nav">
                                   <div class="tablinks-left">
                                    <img width="32px" height="32px"  src="{{ asset('assets/img/User/user-info/logout.png') }}">
                                    Đăng xuất
                                   </div>
                                    <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                                </button>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-right">
           
                <div id="orders" class="tabcontent order-content">
                    <h2 style="margin-bottom: 4%;">Danh sách đơn hàng</h2>
                    @if(count($orders) !== 0)
                        <table class="table-order">
                            <thead>
                                <tr height="80px" class="order-tab">
                                    <td>Mã đơn hàng</td>
                                    <td>Tổng tiền</td>
                                    <td>Ngày đặt hàng</td>
                                    <td>Tình trạng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                        
                                    <tr class="order-info" data-modal="modalOne">
                                        <td>#{{$order->id_order}}</td>
                                        <td>
                                            <div class="attr">
                                                <p style="margin-bottom: 10px">{{ number_format($order->total_order, 0, ',', '.')}} VND</p>
                                            </div>
                                        </td>
                                        <td>
                                            {{$order->day}}
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                               <p class="status pending">Chờ xác nhận</p>
                                               <form method="post" action="{{route('user.order.updateStatus')}}">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{$order->id_order}}" />
                                              <div class="buttons"><button type="submit" class="btn-cancel">Huỷ đơn hàng</button></div>
                                            </form>
                                            @endif

                                            @if ($order->status == 2)
                                                <p class="status info">Đơn hàng đang xử lý</p>
                                            @endif

                                            @if ($order->status == 3)
                                                <p class="status completed">Thành công</p>
                                            @endif

                                            @if ($order->status == 4)
                                            <p class="status cancel">Đơn hàng đã huỷ</p>
                                        @endif

                                               {{-- //1, trạng thái cờ xác nhận user có thể huỷ đơn hàng và chuyển trạng thái về 4 sau đó trả lại số lượng sản phẩm về kho
                                               // 2, frontend ->  Đã nhận được hàng (nhấn vào sẽ hiển thị thông báo.)
                                               //3, Trạng thái thành công.
                                               //4, đơn hàng đã huỷ. --}}
                                        </td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>Hiện chưa có đơn hàng nào</div>
                    @endif
                        
                  
                </div>
            </div>
        </div>
    </div>
    @endsection
