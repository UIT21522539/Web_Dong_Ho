<link rel="stylesheet" href="{{ asset('assets/css/Admin/productlist.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
<div class="product-header">  
    <div class="product-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="product-header-content">
        <h2>Danh sách sản phẩm</h2>
        <p>Xem, Thêm, Xoá, Sửa</p>
    </div>
    <div class="product-header-add">
        <a href="{{ route('products.detailadd') }}">Thêm sản phẩm</a>
    </div>
</div>
<div class="product-body">
    <div class="product-body-content"> 
        <form action="{{ route('products.search') }}" method="GET">
            <div class="mb-3">
                {{-- <label for="search" class="form-label">Tìm kiếm sản phẩm theo tên:</label> --}}
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm theo tên" class="form-control" id="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <img style="margin-right: 3%" width="14px"src="{{ asset('assets/img/Admin/product/search.png')}}">
                    Tìm kiếm
                </button>
            </div>
        </form>

       {{-- <img src="" alt="Image"> --}}
        <table>
            <tr class="table-header">
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Sell Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>IsDiscount</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach ($product as $item)
            <tr class="table-content"> 
                <div>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('images/products/'.$item->img_main.'') }}" alt="{{ $item->name }}" width="50">
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
                </div>
            </tr>
            @endforeach  
        </table>
    </div>
</div>

@endsection