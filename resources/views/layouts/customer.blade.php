<!-- resources/views/child.blade.php -->
 
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
@endpush
@extends('layouts.app')
 
@section('title', 'Page Title')
 <div class="layout-customer">
    @section('sidebar')
        @parent
            <div class="sidebar-wrapper">
                <div class="tag-info">
                    <img width="74px" height="74px" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                </div>
                <div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'order')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/product.png') }}">
                            Đơn hàng của tôi
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                    <div>
                        <button class="tablinks" onclick="openCity(event, 'user')">
                            <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/setting.png') }}">
                            Cài đặt tài khoản
                            <img width="12px" height="12px" style="margin-left: 45%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </div>
                    <div>
                        <form method="POST" action={{route('user.post.logout')}}>
                            @csrf
                            <button class="tablinks" type="submit">
                                <img width="32px" height="32px" style="margin-left: 2%; margin-right: 3%" src="{{ asset('assets/img/User/user-info/logout.png') }}">
                                Đăng xuất
                                <img width="12px" height="12px" style="margin-left: 58%" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    
    @endsection
    
    @section('content')
        <p>This is my body content.</p>
    @endsection

</div>