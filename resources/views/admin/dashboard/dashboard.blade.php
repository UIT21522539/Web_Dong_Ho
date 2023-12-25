<link rel="stylesheet" href="{{ asset('assets/css/Admin/dashboard/dashboard.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
    <div class="header-block">
        <div class="bg-block">
        <img class="img01"width="62px" src="{{ asset('assets/img/Admin/dashboard/newspaper.png')}}">
            <div class="content-block">
                <h3>Doanh thu trong ngày</h3>
                <h3 class="info-content">{{ $profitDay }} VND</h3>  
            </div>
        </div>
        <div class="bg-block">
            <img class="img02" width="62px" src="{{ asset('assets/img/Admin/dashboard/clipboard.png')}}">
            <div class="content-block">
                <h3>Doanh thu trong tháng</h3>
                <h3 class="info-content">{{ $profitMonth }} VND</h3>
            </div>
        </div>
        <div class="bg-block">
            <img class="img03" width="62px" src="{{ asset('assets/img/Admin/dashboard/product.png')}}">
            <div class="content-block">
                <h3>Số lượng sản phẩm</h3>
                <h3 class="info-content">{{ $productCount }} sp</h3>
            </div>
        </div>
        <div class="bg-block">
            <img class="img04" width="62px" src="{{ asset('assets/img/Admin/dashboard/brand.png')}}">
            <div class="content-block">
                <h3>Số lượng brand</h3>
                <h3 class="info-content">{{ $brandCount }} brand</h3>
            </div>
        </div>
    </div>

    <div class="product-list">
        <div class="product-list-content">
            <h2>Danh sách đơn hàng chờ xác nhận</h2>
            <div class="product-body">
                <div class="product-body-content"> 
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
                        </tr>
                        @foreach ($orderList as $item)
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
        </div>
    </div>
    
@endsection
