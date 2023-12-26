<link rel="stylesheet" href="{{ asset('assets/css/Admin/order/orderdetail.css')}}">
@extends('layouts.admin.sidebar')
@section('content')

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if (session('success'))
        <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('success') }}</p></div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
    @endif
    <div class="order-header">  
        <div class="order-header-img">
            <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
        </div>
        <div class="order-header-content">
            <h2>Chi tiết đơn hàng</h2>
        </div>
    </div>
    
    <form method="post" action="{{route('orders.update.detail', $orderDetail->id_order)}}">

        <div class="order-body">
            <div class="order-body-content"> 
            <table class="table-header">
                <tr>
                    <th>Id_order</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Cell price</th>
                    <th>Total </th>
                </tr>
                @foreach ($ct_orderList as $item)
                    <tr class="table-content">
                        <td>{{ $item->id_order }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->sellprice }}</td>
                        <td>{{ $item->total_item }}</td>
                    </tr>
                @endforeach 
            </table>
            </div>
            <div class='product-status'>
                @if($orderDetail->status=='1')
                <a href="{{ route('orders.update.status',['id'=>$orderDetail->id_order]) }}">Confirm </a>
                @elseif($orderDetail->status=='2')
                    <a href="{{ route('orders.ship',['id'=>$orderDetail->id_order]) }}">Shipped </a>
                @endif
            </div>
            
        </div>
        
        <div class="user-detail">
            <div class="user-detail-info">
                <input type="hidden" name="user_id" value="{{$orderDetail->id_user}}" >
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label><br>
                    <input type="text" name="first_name" value="{{ old('first_name') ?? $orderDetail->first_name }}" class="form-control" id="first_name" aria-describedby="emailHelp" readonly>
                    @error('first_name')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label><br>
                    <input type="text" name="last_name" value="{{ old('last_name') ?? $orderDetail->last_name }}" class="form-control" id="last_name" aria-describedby="emailHelp" readonly>
                    @error('last_name')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><br>
                    <input type="text" name="email" value="{{ old('email') ?? $orderDetail->email }}" class="form-control" id="email" aria-describedby="emailHelp" readonly>
                    @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label><br>
                    <input type="text" name="location" value="{{ old('location') ?? $orderDetail->location }}" class="form-control" id="location" readonly>
                    @error('location')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label><br>
                    <input type="text" name="phone" value="{{ old('phone') ?? $orderDetail->phone }}" class="form-control" id="phone" readonly>
                    @error('phone')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="user-detail-order">
                <div class="mb-3">
                    <label for="total_order" class="form-label">Total Order</label><br>
                    <input type="text" name="total_order" value="{{ old('total_order') ?? $orderDetail->total_order }}" class="form-control" id="total_order" readonly>
                    @error('total_order')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    
                        @if($orderDetail->status == '1')
                            <input type="text" value="Chờ xác nhận" readonly>
                        @elseif($orderDetail->status == '2')
                            <input type="text" value="Xác nhận xử lý" readonly>
                        @elseif($orderDetail->status == '3')
                            <input type="text" value="Đang giao hàng" readonly>
                        @elseif($orderDetail->status == '4')
                            <input type="text" value="Huỷ đơn hàng" readonly>
                        @elseif($orderDetail->status == '5')
                            <input type="text" value="Đã nhận được hàng" readonly>
                        @else
                            <input type="text" value="Trạng thái không xác định" readonly>
                        @endif
                
                    @error('status')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>        
                <div class="mb-3">
                    <label for="day" class="form-label">Day</label><br>
                    <input type="text" name="day" value="{{ old('day') ?? $orderDetail->day }}" class="form-control" id="day" readonly>
                    @error('day')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label><br>
                    <input type="text" name="note" value="{{ old('note') ?? $orderDetail->note }}" class="form-control" id="note" readonly>
                    @error('note')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        
            
        
        <!-- Các trường khác của form và nút submit -->
        
        @csrf 
    </form>
@endsection
