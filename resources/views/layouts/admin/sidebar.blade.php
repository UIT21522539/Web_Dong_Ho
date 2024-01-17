<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/header.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <a href="{{ route('dashboard') }}">Trang chủ</a>
        <a href="{{ route('products.list') }}">Quản lí sản phẩm</a>
        <a href="{{ route('orders.list') }}">Quản lí đơn hàng</a>
        <a href="{{ route('users.list') }}">Quản lí khách hàng</a>
        <a href="{{ route('suppliers.list') }}">Quản lí nhập hàng</a>
        <a href="{{ route('brands.list') }}">Quản lí brand</a>
    </div>
    @include('layouts.admin.header')
    <div class="content">
        @if(session('content'))
            <div class="content-with-sidebar">
                {!! session('content') !!}
            </div>
        @else
            <!-- Nội dung trang sẽ được hiển thị ở đây -->
           
            @yield('content')
        @endif
    </div>
</body>
</html>