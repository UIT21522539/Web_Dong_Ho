@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
    @endif
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('products.update') }}" method="POST">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') ?? $userDetail->first_name }}" class="form-control" id="first_name" aria-describedby="emailHelp" readonly>
            @error('first_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') ?? $userDetail->last_name }}" class="form-control" id="last_name" aria-describedby="emailHelp" readonly>
            @error('last_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" value="{{ old('email') ?? $userDetail->email }}" class="form-control" id="email" aria-describedby="emailHelp" readonly>
            @error('email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" value="{{ old('password') ?? $userDetail->password }}" class="form-control" id="password" readonly>
            @error('password')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location') ?? $userDetail->location }}" class="form-control" id="location" readonly>
            @error('location')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') ?? $userDetail->phone }}" class="form-control" id="phone" readonly>
            @error('phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        
        @csrf 
    </form>

        <table border="1">
            <tr>
                <th>Id_order</th>
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
                <td>{{ $item ->id_order }}</td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->total_order }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->day }}</td>
                <td>{{ $item->note }}</td>
            </tr>
            @endforeach 
        </table>
        
@endsection
