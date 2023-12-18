<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/sidebar.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    @stack('styles')
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
    @stack('scripts')
</body>
</html>