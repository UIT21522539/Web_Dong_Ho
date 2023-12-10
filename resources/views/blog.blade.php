<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/blog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider/lightslider.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/Jquery.js')}}"></script>
    <script type="text/javascript" src="assets/js/lightslider/lightslider.js"></script>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="banner-content">
        <img width="340px" height="120px" style="margin-bottom: 0px" src="{{ asset('assets/img/User/Blog/whynotLogo.png') }}">
        <p>Với mục đích truyền cảm hứng đến cho các bạn trẻ, đây là nơi Curnon tâm sự, trò chuyện, chia sẻ những điều người trẻ <br>
            đang trăn trở, những câu chuyện truyền cảm hứng mang tinh thần "Why not?", với hy vọng giúp các bạn thay đổi cách <br>
            nhìn cũng như cách giải quyết mọi vấn đề trong cuộc sống.</p>
    </div>
    </div>
    <div>
        <img class="banner-img" src="{{ asset('assets/img/User/Blog/banner.png') }}">
    </div>
    <div class="newest-new">
        <div class="newest-new-content">
            <div class="newest-new-title">
                <a href="#"><h2>Cách Phối Đồ Với Quần Jean Từ Năng Động, Cá Tính 2023</h2></a>
                <hr style="margin-bottom: 18px">
                <div class="title-info">
                    <div class="title-info-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 12px">March 24, 2023</p>
                    </div>
                    <div class="title-info-readmore"> 
                        <p><a style="color:black; margin-right: 12px" href="#">ĐỌC NGAY</a></p>
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/arrow.png') }}"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="newest-new-img">
            <img src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/Phoi-do-voi-quan-jeans-1536x864.jpg" alt="">
        </div>
    </div>
    <div class="news-popular">
        <h2>Bài viết nổi bật</h2>
        <div>
            <ul id="autoWidth" class="cs-hidden">
                <li class="item-a">
                    <div>
                        <a href=""><img style="margin-bottom: 12px" width="500px" height="300px" src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/streetwear-la-gi-1536x864.jpg"></a>
                    </div> 
                    
                    <div class="newest-popular-content">
                        <p style="margin-bottom: 20px"><a href="#">Street Wear Là Gì? Mix & Match Phong Cách Streetwear 2023</a></p>
                        <div class="newest-popular-time">
                            <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                            <p style="margin-left: 12px">March 23, 2023</p>
                        </div>
                    </div>
                </li>
                <li class="item-b">
                    <div>
                        <a href=""><img style="margin-bottom: 12px" width="500px" height="300px" src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/sartorial-1536x864.jpg"></a>
                    </div>
                    <div class="newest-popular-content">
                        <p style="margin-bottom: 20px"><a href="#">Satorial Là Gì? Cách Mặc Phong Cách Sartorial Chuẩn Châu Âu</a></p>
                        <div class="newest-popular-time">
                            <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                            <p style="margin-left: 12px">March 22, 2023</p>
                        </div>
                    </div>
                </li>
                <li class="item-c">
                    <div>
                        <a href=""><img style="margin-bottom: 12px" width="500px" height="300px" src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/soft-girl-1536x864.jpg"></a>
                    </div>
                <div class="newest-popular-content">
                    <p style="margin-bottom: 20px"><a href="#">Soft Girl Là Gì? Phối Đồ Theo Phong Cách Soft Girl Trendy 2023</a></p>
                    <div class="newest-popular-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 12px">March 20, 2023</p>
                    </div>
                </div>
                </li>
                <li class="item-d">
                    <div>
                        <a href=""><img style="margin-bottom: 12px" width="500px" height="300px" src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/soft-boy-1536x864.jpg"></a>
                    </div>
                <div class="newest-popular-content">
                    <p style="margin-bottom: 20px"><a href="#">Soft Boy Là Gì? Phối Đồ Theo Phong Cách Soft Boy Trendy 2023</a></p>
                    <div class="newest-popular-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 12px">March 20, 2023</p>
                    </div>
                </div>
                </li>
                <li class="item-e">
                    <div>
                        <a href=""><img style="margin-bottom: 12px" width="500px" height="300px" src="https://curnonwatch.com/blog/wp-content/uploads/2023/03/phoi-do-voi-cardigan-1536x864.jpg"></a>
                    </div>
                <div class="newest-popular-content">
                    <p style="margin-bottom: 20px"><a href="#">Bí Quyết Phối Đồ Cardigan Cho Nam Và Nữ Sành Điệu 2023</a></p>
                    <div class="newest-popular-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 12px">March 24, 2023</p>
                    </div>
                </div>
                </li>
            </ul>
        </div>
        <script type="text/javascript" src="{{ asset('assets/js/lightslider/script.js') }}"></script>
    </div>
    
    
    <div class="category">
        <div class="category-header">
            <p ><h3>CURNON</h3></p>
            <p class="category-header-more">
                <a style="width:100px; color: black" href="#">XEM TẤT CẢ</a>
                <a style="margin-left: 3%" href="#"><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/arrow.png') }}"></a>
            </p>
        </div>
        <hr style="width: 97%; margin-bottom: 2%">
        <div class="category-grid">
            <div>
                <div style="margin-bottom: 3%">
                    <img width="370px" height="218px"src="https://curnonwatch.com/blog/wp-content/uploads/2022/08/cac-hang-dong-ho-noi-tieng-2.jpg">
                </div>
                <div>
                    <div class="category-grid-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 20px">August 3, 2022</p>
                    </div>
                    <p class="category-grid-content">Top 30 Hãng Đồng Hồ Nổi Tiếng Tốt Nhất Trên Thế Giới</p>
                </div>
            </div>
            <div>
                <div style="margin-bottom: 3%">
                    <img width="370px" height="218px"src="https://curnonwatch.com/blog/wp-content/uploads/2022/04/Blog-Thumb-1312.jpg">
                </div>
                <div>
                    <div class="category-grid-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 20px">May 5, 2022</p>
                    </div>
                    <p class="category-grid-content">Bí Kíp Chọn Size Đồng Hồ Vừa Vặn Nhất Với Cổ Tay Bạn</p>
                </div>
            </div>
            <div>
                <div style="margin-bottom: 3%">
                    <img width="370px" height="218px"src="https://curnonwatch.com/blog/wp-content/uploads/2022/04/kinh-sapphire.jpg">
                </div>
                <div>
                    <div class="category-grid-time">
                        <p><img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/calendar.png') }}"></p>
                        <p style="margin-left: 20px">May 4, 2022</p>
                    </div>
                    <p class="category-grid-content">Kính Sapphire Là Gì? Những Mẫu Đồng Hô Kính Sapphire Dưới 3 Triệu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="curnon-family">
        <div class="curnon-family-content">
            <h2 style="margin-bottom: 1%">BE PART OF CURNON</h2>
            <p>Ai nói bạn không thể lựa chọn gia đình</p>
        </div>
        <div class="curnon-family-img">
            <ul id="autoWidth2" class="cs-hidden">
                <li class="item-a">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-1.jpg">
                    </div>
                </li>
                <li class="item-b">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-2.jpg">
                    </div>
                </li>
                <li class="item-c">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-3.jpg">
                    </div>
                </li>
                <li class="item-d">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-4.jpg">
                    </div>
                </li>
                <li class="item-e">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-5.jpg">
                    </div>
                </li>
                <li class="item-f">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-6.jpg">
                    </div>
                </li>
                <li class="item-g">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-7.jpg">
                    </div>
                </li>
                <li class="item-h">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-8.jpg">
                    </div>
                </li>
                <li class="item-i">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-9.jpg">
                    </div>
                </li>
                <li class="item-j">
                    <div class="rightImg">
                        <img width="275px" height="274px" src="https://curnonwatch.com/blog/wp-content/themes/ashe/assets/images/Background-10.jpg">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/script2.js') }}"></script>  
    @endsection
</body>
</html>