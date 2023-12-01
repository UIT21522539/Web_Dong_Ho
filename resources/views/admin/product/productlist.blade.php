@extends('layouts.admin.sidebar')
@section('content')
    <h2>Danh sách sản phẩm</h2>
    <form action="{{ route('products.search') }}" method="GET">
        <div class="mb-3">
            <label for="search" class="form-label">Tìm kiếm sản phẩm theo tên:</label>
            <input type="text" name="search" class="form-control" id="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
    <a href="{{ route('products.detailadd') }}">Thêm sản phẩm</a>
<table border="1">
        <tr>
            
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Sell Price</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>IsDiscount</th>
            <th>Status</th>
        </tr>
            @foreach ($product as $item)
            <tr>
                
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ $item->img_main }}" alt="{{ $item->name }}" width="50">
                </td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->sellprice }}</td>
                <td>{{ $item->qty_store }}</td>
                <td>{{ $item->discount  }}</td>
                <td>{{ $item->isdiscount }}</td>
                <td>{{ $item->status  }}</td>
                <td>
                    <a href="{{ route('products.detail',['id'=>$item->id_product]) }}" >Detail</a>
                    
                </td>
                <td>
                    <a href="{{ route('products.get',['id'=>$item->id_product]) }}" >Edit</a>
                    
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{ route('products.delete',['id'=>$item->id_product]) }}" >Delete</a>
                   
                </td>
                
            </tr>
            @endforeach 
       
    </table>
@endsection