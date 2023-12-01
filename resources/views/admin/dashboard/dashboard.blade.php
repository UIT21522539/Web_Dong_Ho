@extends('layouts.admin.sidebar')
@section('content')
    <h3>Doanh thu trong ngày</h3>
    <h3>Doanh thu trong tháng</h3>
    <h3>Số lượng sản phẩm : {{ $productCount }}</h3>
    <h3>Số lượng brand : {{ $brandCount }}</h3>
    <h2>Danh sách đơn hàng chờ xác nhận</h2>
    <table border="1">
        <tr>
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
        </tr>
        @foreach ($orderList as $item)
            <tr>
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
                <td>
                    <a href="{{ route('orders.update',['id'=>$item->id_order]) }}">Confirm </a>
                </td>
                <td>
                    <a href="{{ route('orders.delete',['id'=>$item->id_order]) }}">Cancel </a>
                </td>
                
            </tr>
        @endforeach 
    </table>
@endsection
