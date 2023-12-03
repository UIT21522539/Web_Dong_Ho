@extends('layouts.admin.sidebar')
@section('content')
@if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
    @endif
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('brands.add') }}" method="POST" >
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
          @error('name')
          <span style="color: red">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        @csrf 
    </form>

    
@endsection