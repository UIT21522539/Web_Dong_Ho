@extends('layouts.admin.sidebar')
@section('content')
<h2>Danh sách sản phẩm</h2>
    <form action="{{ route('brands.search') }}" method="GET">
        <div class="mb-3">
            <label for="search" class="form-label">Tìm kiếm sản phẩm theo tên:</label>
            <input type="text" name="search" class="form-control" id="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
    <a href="{{ route('brands.detailadd') }}">Thêm thương hiệu</a>
<table border="1">
        <tr>
            
            <th>Id</th>
            <th>Name</th>
            
        </tr>
            @foreach ($brand as $item)
            <tr>
                
                <td>{{ $item->id_brand }}</td>
                <td>{{ $item->name }}</td>
                
            </tr>
            @endforeach 
       
    </table>

@endsection