
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
                    @empty($orders)
                        <table class="table-order">
                            <thead>
                                <tr height="80px" class="order-tab">
                                    <td>Mã đơn hàng</td>
                                    <td>Đơn hàng</td>
                                    <td>Thành tiền</td>
                                    <td>Tình trạng</td>
                                    <td>Ngày đặt hàng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                        
                                    <tr class="order-info" data-modal="modalOne">
                                        <td>#{{$order->id_order}}</td>
                                        <td style="display: flex">
                                            <img width="60px" height="60px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fh%2Fe%2Fheinz_1.png&w=1920&q=75">
                                            <div class="attr">
                                                <p style="margin-bottom: 10px">HEINZ</p>
                                                <p>40MM</p>
                                            </div>
                                        </td>
                                        <td>{{$order->total_order}}</td>
                                        <td>
                                            @if ($order->status == 1)
                                            <input class="pretending" type="button" value="Chờ lấy hàng">
                                            @endif
                                        
                                        </td>
                                        <td>
                                            {{$order->day}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>Hiện chưa có đơn hàng nào</div>
                    @endempty
                        
                  
                </div>
            </div>
        </div>
    </div>
    @endsection