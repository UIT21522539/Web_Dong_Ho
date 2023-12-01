@extends('layouts.admin.sidebar')
@section('content')
<h2>Danh sách nhập kho</h2>
<a href="{{ route('suppliers.detailadd') }}">Thêm phiếu nhập kho</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Day</th>
        <th>Total</th>
    </tr>
    @foreach ($supplierList as $item)
        <tr>
            <td>{{ $item->id_ir }}</td>
            <td>{{ $item->day }}</td>
            <td>{{ $item->total }}</td>
            <td>
                <a href="{{ route('suppliers.detail',['id'=>$item->id_ir]) }}" >Detail</a>
            </td>
        </tr>

    @endforeach 

@endsection