@extends('layouts.admin.sidebar')
@section('content')

    <h2>Danh sách khách hàng</h2>
    <form action="{{ route('users.search') }}" method="GET">
        <div class="mb-3">
            <label for="search" class="form-label">Tìm kiếm khách hàng theo tên:</label>
            <input type="text" name="search" class="form-control" id="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Location</th>
            <th>Phone</th>
        </tr>
        @foreach ($user as $item)
            <tr>
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
