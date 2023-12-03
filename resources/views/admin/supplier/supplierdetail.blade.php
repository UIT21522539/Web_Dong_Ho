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
        <label for="id_ir" class="form-label">ID</label>
        <input type="text" name="id_ir" value="{{ old('id_ir') ?? $supplierDetail->id_ir }}" class="form-control" id="id_ir" aria-describedby="totalHelp" readonly>
        @error('id_ir')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="day" class="form-label">Day</label>
        <input type="text" name="day" value="{{ old('day') ?? $supplierDetail->day }}" class="form-control" id="day" aria-describedby="totalHelp" readonly>
        @error('day')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="text" name="total" value="{{ old('total') ?? $supplierDetail->total }}" class="form-control" id="total" aria-describedby="totalHelp" readonly>
        @error('total')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name Product</th>
            <th>Quantity</th>
            <th>Imporrt price</th>
            <th>Item total</th>
            
        </tr>
        @foreach ($ct_supplierList as $item)
        <tr>
            <td>{{ $item ->id_ir }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->import_price }}</td>
            <td>{{ $item->item_total }}</td>
        </tr>
        @endforeach 
    </table>
    @csrf 
</form>
@endsection
