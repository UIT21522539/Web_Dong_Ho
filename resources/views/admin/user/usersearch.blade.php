<link rel="stylesheet" href="{{ asset('assets/css/Admin/user/userlist.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}" />
@extends('layouts.admin.sidebar')
@section('content')
<div class="user-header">  
    <div class="user-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="user-header-content">
        <h2>Danh sách khách hàng</h2>
        <p>Xem thêm</p>
    </div>
</div>
<div class="user-body">
    <div class="user-body-content"> 
        <form action="{{ route('users.search') }}" method="GET">
            <div class="mb-3">
                {{-- <label for="search" class="form-label">Tìm kiếm khách hàng theo tên:</label> --}}
                <input type="text" name="search" class="form-control" id="search" value="{{$searchKeyword ?? request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <img style="margin-right: 3%" width="14px"src="{{ asset('assets/img/Admin/product/search.png')}}">
                    Tìm kiếm
                </button>
            </div>
        </form>
    <table>
        <tr class="table-header">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Location</th>
            <th>Phone</th>
        </tr>
        @foreach ($results as $item)
            <tr class="table-content">
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a href="{{ route('users.detail',['id'=>$item->id_user]) }}" >Detail</a>
                </td>
            </tr>

        @endforeach 

        
    </table>
@endsection
