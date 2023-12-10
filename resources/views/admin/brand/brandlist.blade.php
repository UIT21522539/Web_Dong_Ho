<link rel="stylesheet" href="{{ asset('assets/css/Admin/brand/brandlist.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
<div class="brand-header">  
    <div class="brand-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="brand-header-content">
        <h2>Danh sách sản phẩm</h2>
        <p>Xem thêm</p>
    </div>
    <div class="brand-header-add">
        <a href="{{ route('brands.detailadd') }}">Thêm thương hiệu</a>
    </div>
</div>
<div class="brand-body">
    <div class="brand-body-content"> 
        <form action="{{ route('brands.search') }}" method="GET">
            <div class="mb-3">
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm theo tên" class="form-control" id="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <img style="margin-right: 3%" width="14px"src="{{ asset('assets/img/Admin/product/search.png')}}">
                    Tìm kiếm
                </button>
            </div>
        </form>

        <table>
            <tr class="table-header">
                <th>Id</th>
                <th>Name</th>
            </tr>
                @foreach ($brand as $item)
                <tr class="table-content"> 
                    <td>{{ $item->id_brand }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
                @endforeach 
        </table>
    </div>
</div>
@endsection