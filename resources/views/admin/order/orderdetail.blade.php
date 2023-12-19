@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
    @endif
    <h1>Chi tiết đơn hàng</h1>
    @if (session('success'))
        <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('success') }}</p></div>
    @endif
    <form method="post" action="{{route('orders.update.detail', $order->id_order)}}">
        <input type="hidden" name="user_id" value="{{$order->id_user}}"/>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') ?? $order->first_name }}" class="form-control" id="first_name" aria-describedby="emailHelp" readonly>
            @error('first_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') ?? $order->last_name }}" class="form-control" id="last_name" aria-describedby="emailHelp" readonly>
            @error('last_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" value="{{ old('email') ?? $order->email }}" class="form-control" id="email" aria-describedby="emailHelp" readonly>
            @error('email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location') ?? $order->location }}" class="form-control" id="location" readonly>
            @error('location')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') ?? $order->phone }}" class="form-control" id="phone" readonly>
            @error('phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_order" class="form-label">Total Order</label>
            <input type="text" name="total_order" value="{{ old('total_order') ?? $order->total_order }}" class="form-control" id="total_order" readonly>
            @error('total_order')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status">
                <option value="1" {{old('status') ??  $order->status === '1' ? 'selected' : ""}}>Chờ xác nhận</option>
                <option value="2"  {{old('status') ??  $order->status === "2" ? 'selected' : ""}}>Xác nhận xử lý</option>
                <option value="3"  {{old('status') ??  $order->status === '3' ? 'selected' : ""}}>Đã giao và nhận hàng</option>
                <option value="4"  {{old('status') ??  $order->status === '4' ? 'selected' : ""}}>Huỷ đơn hàng</option>
            </select>



            @error('status')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <input type="text" name="day" value="{{ old('day') ?? $order->day }}" class="form-control" id="day" readonly>
            @error('day')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="text" name="note" value="{{ old('note') ?? $order->note }}" class="form-control" id="note" readonly>
            @error('note')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <table border="1">
            <tr>
                <th>Id_order</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Cell price</th>
                <th>Total </th>
            </tr>
            @foreach ($order->orderDetail as $item)
                <tr>
                    <td>{{ $item->id_order }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->sellprice }}</td>
                    <td>{{ $item->total_item }}</td>
                </tr>
            @endforeach 
        </table>
        <button type="submit">Cập nhật đơn hàng</button>
        <!-- Các trường khác của form và nút submit -->
        
        @csrf 
    </form>
@endsection
