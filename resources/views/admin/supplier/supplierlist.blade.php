<link rel="stylesheet" href="{{ asset('assets/css/Admin/supplier/supplierlist.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
<div class="supplier-header">  
    <div class="supplier-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="supplier-header-content">
        <h2>Danh sách nhập kho</h2>
        <p>Xem thêm</p>
    </div>
    <div class="supplier-header-add">
        <a href="{{ route('suppliers.detailadd') }}">Thêm phiếu nhập kho</a>
    </div>
</div>
<div class="supplier-body">
    <div class="supplier-body-content"> 
        <table>
            <tr class="table-header">
                <th>ID</th>
                <th>Day</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            @foreach ($supplierList as $item)
                <tr class="table-content"> 
                    <td>{{ $item->id_ir }}</td>
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        <a href="{{ route('suppliers.detail',['id'=>$item->id_ir]) }}" >Detail</a>
                    </td>
                </tr>

            @endforeach 
        </table>
    </div>
</div>
@endsection