<link rel="stylesheet" href="{{ asset('assets/css/Admin/brand/brandadd.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}" />
<title>Brand</title>
@extends('layouts.admin.sidebar')
@section('content')
@if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif
    
    <div class="brand-header">  
      <div class="brand-header-img">
          <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
      </div>
      <div class="brand-header-content">
          @if ($errors->any())
          <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
          @endif
          <h2>{{ $title }}</h2>
      </div>
  </div>
    
    <form action="{{ route('brands.add') }}" method="POST" >
      <div class="brand-detail">
        <div class="brand-detail-info">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Thêm</button>
          @csrf 
        </div>
      </div>
    </form>

    
@endsection