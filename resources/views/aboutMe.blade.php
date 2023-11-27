<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/User/aboutMe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider/lightslider.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/Jquery.js')}}"></script>
    <script type="text/javascript" src="assets/js/lightslider/lightslider.js"></script>
    <title>About Me</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="banner">
        <div class="banner-content">
            <h2>Chào bạn, chúng tôi là CURNON!</h2>
            <h3>/cơ - nần/!</h3>
            <p>Chúng tôi biến sản phẩm phụ kiện không thể thiếu trở thành những biểu tượng 
                tinh thần đầy cảm hứng, để thúc đẩy thế hệ trẻ Việt Nam không 
                ngừng tiến lên phía trước.</p>
        </div>
        <div class="banner-img">
            <img src="https://curnonwatch.com/_next/static/media/bg_desktop.1a70a7f2.jpg">
        </div>
    </div>
    <div class="whyCurnon">
        <div class="whyCurnon-img">
            <img src="{{ asset('assets/img/User/aboutMe/whyCurnon.png') }}" alt="">
        </div>
        <div class="whyCurnon-content">
            <p class="p01">TẠI SAO KHÔNG?</p>
            <p class="p02"><i>Đó là câu hỏi của chúng tôi khi bắt đầu.</i></p>
            <p class="p03">Và cũng là tinh thần "Why not" chúng tôi khát khao truyền tải</p>
            <p class="p04">Với những sản phẩm được thiết kế bằng nhiệt huyết, khát khao và khối óc đầy sáng tạo của 
                đội ngũ chính những người trẻ Việt Nam, chúng tôi tin rằng tinh thần "Why not" ấy sẽ luôn đồng hành 
                và truyền cảm hứng cho bạn mỗi ngày.</p>
        </div>
    </div>
    <div class="core-value">
        <div class="core-value-content">
            <h2>GIÁ TRỊ CỐT LỖI</h2>
            <p><i>"Chúng tôi tin rằng cách tốt nhất để truyền tải được thông điệp 
                “Tại sao không?” trước hết phải bắt đầu từ chính tập thể của Curnon.”
            </i></p>
        </div>
        <div class="core-value-img">
            <img src="{{ asset('assets/img/User/aboutMe/Mission.jpg') }}">
        </div>
    </div>
    <div class="grid-img">
        <div class="grid-element">
            <img src="{{ asset('assets/img/User/aboutMe/ImgCore.png') }}">
            <h3>Dám nghĩ, dám làm</h3>
            <p>Với khát khao trở thành người đồng hành của các bạn, 
                chúng tôi tin rằng chính mình phải có đủ can đảm để vượt qua thách thức, 
                dám nghĩ, dám dẫn đầu và khác biệt.</p>
        </div>
        <div class="grid-element">
            <img src="{{ asset('assets/img/User/aboutMe/ImgCore2.png') }}">
            <h3>Bắt đầu và kết thúc bằng khách hàng</h3>
            <p>Với tinh thần của những chiến binh, chúng tôi luôn chiến đấu với chính bản thân mình mỗi ngày để đem lại những trải nghiệm “WOW” nhất cho người trẻ Việt Nam.</p>
        </div>
        <div class="grid-element">
            <img src="{{ asset('assets/img/User/aboutMe/ImgCore3.png') }}">
            <h3>Truyền cảm hứng</h3>
            <p>Tương lai với chúng tôi là những sản phẩm vươn tầm thế giới, là thế hệ trẻ Việt Nam đầy tự tin để theo đuổi đam mê của mình, là "Why not?" trở thành triết lí của tất cả mọi người.</p>
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