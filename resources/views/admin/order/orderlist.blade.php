<link rel="stylesheet" href="{{ asset('assets/css/Admin/order/orderlist.css')}}">
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
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                        <a href="{{ route('orders.detail',['id'=>$item->id_order]) }}">Detail </a>
                    </td>
                </tr>
            @endforeach 
        </table>
    </div>
</div>
@endsection
