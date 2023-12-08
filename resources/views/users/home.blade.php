<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/User/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider/lightslider.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/Jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/lightslider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.1.js" integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="tbody">
        <div class="banner-button">
            <h2 style="font-size: 16px">SIÊU SALE -50% BLACK FRIDAY</h2>
            <h2 style="font-size: 38px">22.11-27.11</h2>
            <h2 style="font-weight: 100; letter-spacing: 3px; margin-bottom: 10%">ƯU ĐÃI LỚN NHẤT NĂM</h2>
            <button class="button-57" role="button"><span class="text">MUA NGAY</span><span>MUA ĐI</span></button>
        </div>
        <div class="banner">
            <img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fcms.curnonwatch.com%2Fuploads%2FWeb_2_dd00957b0f.jpg&w=3840&q=100">
        </div>
        <div class="info">
            <div>
                <h2>FREESHIP ĐƠN HÀNG > 700K</h2>
            </div>
            <div>
                <h2>BẢO HÀNH 10 NĂM</h2>
            </div>
            <div>
                <h2>ĐỔI TRẢ MIỄN PHÍ TRONG VÒNG 3 NGÀY</h2>
            </div>
        </div>
        <div class="categoryCard">
            <a class="cat1" href="#"> 
                <p>ĐỒNG HỒ NAM</p>
            </a>
            <a class="cat2" href="#"> 
                <p>PHỤ KIỆN</p>
            </a>
            <a class="cat3" href="#"> 
                <p>ĐỒNG HỒ NỮ</p>
            </a>
        </div>
    <div class="bestSell">
        <h1>MEN'S BEST SELLERS</h1>
        <a href="#">XEM TẤT CẢ</a>
    </div>
    <div class="product_wrapper">
        <div class="product_top">
        {{-- discount --}}
            @foreach ($productListB as $productItem)    
            <a >
                <div class="product_info product_highlight">
                    <img src="{{ $productItem->img_main }}">
                    <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                    <form action="/carts" method='POST'>
                        @csrf
                        <a class="product_addToCard" target="_self">
                            <span class="product_addToCard_font">
                                <input type="text" name='id' style="display: none;" value="{{ $productItem->id_product }}">
                                <input type="submit" value="THÊM VÀO GIỎ">
                            </span>
                        </a>
                    </form>
                    
                    <p class="product_ref_kind">{{ $productItem->brName }}</p>
                    <span class="product_ref_name">{{ $productItem->pdName }}</span>
                    <div class="product_font_price">
                        <b>{{ $productItem->sellprice }}</b>
                        <del class="product_font_price_discount">2.499.000 đ</del>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="bestSell">
        <h1>WOMEN'S BEST SELLERS</h1>
        <a href="#">XEM TẤT CẢ</a>
    </div>
    <div class="product_wrapper">
        <div class="product_top">
            @foreach ($productListW as $productItem)    
            <a >
                <div class="product_info product_highlight">
                    <img src="{{ $productItem->img_main }}">
                    <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                    <form action="/carts" method='POST'>
                        @csrf
                        <a class="product_addToCard" target="_self">
                            <span class="product_addToCard_font">
                                <input type="text" name='id' style="display: none;" value="{{ $productItem->id_product }}">
                                <input type="submit" value="THÊM VÀO GIỎ">
                            </span>
                        </a>
                    </form>
                    
                    <p class="product_ref_kind">{{ $productItem->brName }}</p>
                    <span class="product_ref_name">{{ $productItem->pdName }}</span>
                    <div class="product_font_price">
                        <b>{{ $productItem->sellprice }}</b>
                        <del class="product_font_price_discount">2.499.000 đ</del>
                    </div>
                </div>
            </a>
            @endforeach
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
    </div>
    
    {{-- Them gio hang --}}
    {{-- <script>
        $(document).ready(function(){
            var csrf = $('meta[name="csrf-token"]').attr('content');
            console.log(csrf);

            $(".product_addToCard").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '/carts',  
                    data: {'id': 4},
                    error:  function () {
                        windows.location = '/login'
                    },
        
                })
            });
        }); 
    </script> --}}
    <script>
        function showButton(){
            var productbutton = document.getElementById("product-button");
            productbutton.style.display="";
        }
        function hideButton(){
            var productbutton = document.getElementById("product-button");
            productbutton.style.display="none";
        }

    </script>
    @endsection
</body>
</html>