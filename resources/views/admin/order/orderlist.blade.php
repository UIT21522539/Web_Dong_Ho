<link rel="stylesheet" href="{{ asset('assets/css/Admin/order/orderlist.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}" />
<title>Order</title>
@extends('layouts.admin.sidebar')
@section('content')
<div class="order-header">  
    <div class="order-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="order-header-content">
        <h2>Danh sách đơn hàng</h2>
        <p>Xem thêm</p>
    </div>
</div>

<div class="order-body">
    <div class="order-body-content"> 
        <table>
            <tr class="table-header">
                <th>ID Order</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Total Order</th>
                <th>Status</th>
                <th>Day</th>
                <th>Payment</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
            @foreach ($order as $item)
                <tr class="table-content">
                    <td>{{ $item->id_order }}</td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->total_order }}</td>
                    @if($item->status=='1')
                    <td>Chờ xác nhận</td>
                    @elseif($item->status=='2')
                    <td>Đã xác nhận</td>
                    @elseif($item->status=='3')
                    <td>Đang giao hàng</td>
                    @elseif($item->status=='4')
                    <td>Đã nhận được hàng</td>
                    @endif
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->payment }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                        <a href="{{ route('orders.detail',['id'=>$item->id_order]) }}">Detail </a>
                        <a href="{{ route('orders.ship',['id'=>$item->id_order]) }}">Shipped </a>
                    </td>
                </tr>
            @endforeach 
        </table>
    </div>
</div>
@endsection
