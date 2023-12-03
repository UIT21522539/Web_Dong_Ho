@extends('layouts.admin.sidebar')
@section('content')

    <h2>Danh sách đơn hàng</h2>
    
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
        @foreach ($order as $item)
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
                
            </tr>
        @endforeach 
    </table>
@endsection
