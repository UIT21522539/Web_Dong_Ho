
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/User/user-info.css') }}">
@endpush
    @extends('layouts.app')
    @section('content')
        <div class="customer-layout">
            <div class="col-left">
                <div class="col-left-head">
                    <div class="tag-info order">
                        <img width="74px" height="74px" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                        @if(session()->has('user_session'))
                    
                            <h1>{{session('user_session')->last_name}} {{session('user_session')->first_name}}</h1>
                        @endif 
    
                        @if (session('login_success'))
                            <div class="py-2 bg-green-200 rounded-sm px-4 text-green-800 mb-2"><p>{{ session('login_success') }}</p></div>
                        @endif
                    </div>
                </div>
                <div class="col-left-contents">
                    <ul class="tab-links">
                        <div class="tab-link-item">
                                <a href="{{route("user.orders")}}" class="nav">
                                    <div class="tablinks-left">
                                    <img width="32px" height="32px" src="{{ asset('assets/img/User/user-info/product.png') }}">
                                    Đơn hàng của tôi
                                </div>
                                    <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                                </a>
                        </div>
                        <div class="tab-link-item">
                            <a href="{{route("user.profile")}}" class="nav">
                                <div class="tablinks-left">
                                    <img width="32px" height="32px"  src="{{ asset('assets/img/User/user-info/setting.png') }}">
                                    Cài đặt tài khoản
                                </div>
                                <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                            </a>
                        </div>
                        <div class="tab-link-item">
                            <form method="POST" action={{route('user.post.logout')}}>
                                @csrf
                                <button type="submit" class="nav">
                                   <div class="tablinks-left">
                                    <img width="32px" height="32px"  src="{{ asset('assets/img/User/user-info/logout.png') }}">
                                    Đăng xuất
                                   </div>
                                    <img width="12px" height="12px"  src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                                </button>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-right">
                <div id="user" class="user-info">
                    <h2 style="margin-bottom: 6%;">Thông tin của tôi</h2>
               
                    @if (session('update_success'))
                        <div class="message"><p>{{ session('update_success') }}</p></div>
                    @endif

                    <div class="user-infor infor-items">
                        <div class="info-item">
                            <p>Họ</p> 
                            <p class="bold">{{session('user_session')->last_name}}</p> 
                        </div>
                       <div class="info-item">
                            <p>Tên</p> 
                            <p class="bold">{{session('user_session')->first_name}}</p> 
                        </div>
                    
                        <div class="info-item">
                            <p>Email</p>
                            <p class="bold">{{session('user_session')->email}}</p> 
                        </div>
                       <div class="info-item">
                            <p>Số điện thoại</p> 
                            <p class="bold">{{session('user_session')->phone ? session('user_session')->phone : "--"}}</p> 
                        </div>
                       <div class="info-item">
                            <p>Quốc gia</p>
                            <p class="bold">{{session('user_session')->location ? session('user_session')->location : "--"}}</p> 
                        </div>         
                    </div>
                    <div class="form-wrapper customer-edit-form hidden"> 
                        <form method="POST" action={{route('user.update.profile')}}>
                            @csrf
                            <div class="form-control">
                                <div class="input">
                                    <label for="last_name">Họ</label>
                                    <input id="last_name" name="last_name" value="{{session('user_session')->last_name}}" placeholder="Họ"/></div>
                                <p class="error-message"></p>
                            </div>
                            <div class="form-control">
                                <div class="input">
                                    <label for="first_name">Tên</label>
                                    <input id='first_name' name="first_name" type="text" value="{{session('user_session')->first_name}}" placeholder="Tên"/>
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="form-control">
                                <div class="input">
                                    <label for="email">Email</label>
                                    <input id='email' name="email" disabled value="{{session('user_session')->email}}"/></div>
                                <p class="error-message"></p>
                            </div>
                            <div class="form-control">
                                <div class="input">
                                    <label for="phone">Số điện thoại</label>
                                    <input id="phone" name="phone" type="number" placeholder="Số điện thoại" value="{{session('user_session')->phone}}"/></div>
                                <p class="error-message"></p>
                            </div>
                            <div class="form-control">
                                <div class="input">
                                    <label for="location">Quốc gia</label>
                                    <input id="location" name="location" type="text" placeholder="Quốc gia" value="{{session('user_session')->location}}"/></div>
                                <p class="error-message"></p>
                            </div>
                            <div class="buttons">
                                <button class="btn" type="button" onclick="showEditForm('cancel')">Huỷ bỏ</button> 
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-edit" type="button" onclick="showEditForm('edit')">Sửa</button> </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
        <script>
            function showEditForm(type) {
            
                const form = document.getElementsByClassName('customer-edit-form');
                const userInfo = document.getElementsByClassName('user-infor');
                const btnEdit = document.getElementsByClassName('btn-edit');
                
                if(type === 'edit'){
                    btnEdit[0].classList.add('hidden')
                }else{
                    btnEdit[0].classList.remove('hidden')
                }
                
                if(form[0].classList.contains('hidden')){
                    form[0].classList.remove('hidden')
                    userInfo[0].classList.add('hidden')
                    btnEdit[0].innerHTML = "Huỷ bỏ";
                }else{
                    form[0].classList.add('hidden')
                    userInfo[0].classList.remove('hidden')
                    btnEdit[0].innerHTML = "Sửa";
                }
                
            }
            

        </script>
    @endpush

