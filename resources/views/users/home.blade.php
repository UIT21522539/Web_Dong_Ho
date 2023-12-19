<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/User/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider/lightslider.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/Jquery.js')}}"></script>
    <script type="text/javascript" src="assets/js/lightslider/lightslider.js"></script>
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
        @if (Session::has('success'))
            <div class="notice-message success"><p>{{ Session::get('success') }}</p></div>
                <script>
                    alert('Thêm sản phẩm thành công')
                </script>
        @endif

        @if (Session::has('error'))
         
            <div class="notice-message error">
                <p>{{ Session::get('error') }}</p>
            </div>
                <script>
                    alert("Sản phẩm tạm hết hàng")
                </script>
        @endif

        <div class="product_top">
        {{-- discount --}}
            @foreach ($productListB as $productItem)
            <div class="product-item">
                <a href="#" class="inner">
                    <div class="product_info product_highlight">
                        {{-- <img src="{{ $productItem->img_main }}"> --}}
                        <div class="thumb">
                            <img src="{{ asset('images/products/'.$productItem->img_main.'') }}" alt="{{ $productItem->name }}">
                            <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                        </div>
                        <div class="item-content">
                            
                            <p class="product_ref_kind">{{ $productItem->brand->name }}</p>
                            <p class="product_ref_name">{{ $productItem->name }}</p>
                            <div class="product_font_price">
                                <b>{{ $productItem->sellprice }}</b>
                                {{-- <del class="product_font_price_discount">2.499.000 đ</del> --}}
                            </div>
                            <form method="POST" action="{{route('addToCart')}}" class="add-to-cart-form">
                                @csrf
                                    <input type="hidden" name="product_id" value={{$productItem->id_product}}/>
                                    <input type="hidden" name="quantity" value="1"/>
                                    <button class="product_addToCard" type="submit">
                                        <span class="product_addToCard_font">THÊM VÀO GIỎ</span>
                                    </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            {{-- Không discount --}}
          
            {{-- <a href="#">
                <div class="product_info product_highlight">
                        <img  alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fh%2Fe%2Fheinz_1.png&w=640&q=75">
                        <b class="product_image_discount">-8%</b>
                        <a class="product_addToCard" href="#" target="_self">
                            <span class="product_addToCard_font">THÊM VÀO GIỎ</span>
                        </a>
                        <p class="product_ref_kind">KABHMIR</p>
                        <span class="product_ref_name">CALM</span>
                    <div class="product_font_price">
                        <b>2.124.000 đ</b>
                        <del class="product_font_price_discount">2.499.000 đ</del>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="product_info product_highlight">
                        <img  alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                        <b class="product_image_discount">-8%</b>
                        <a class="product_addToCard" href="#" target="_self">
                            <span class="product_addToCard_font">THÊM VÀO GIỎ</span>
                        </a>
                        <p class="product_ref_kind">KABHMIR</p>
                        <span class="product_ref_name">CALM</span>
                    <div class="product_font_price">
                        <b>2.124.000 đ</b>
                        <del class="product_font_price_discount">2.499.000 đ</del>
                    </div>
                </div>
            </a> --}}
        </div>
    </div>

  
    <div class="bestSell">
        <h1>WOMEN'S BEST SELLERS</h1>
        <a href="#">XEM TẤT CẢ</a>
    </div>
    <div class="product_wrapper">
        <div class="product_top">
            @foreach ($productListW as $productItem)    
            <div class="product-item">
                <a href="#" class="inner">
                    <div class="product_info product_highlight">
                        {{-- <img src="{{ $productItem->img_main }}"> --}}
                        <div class="thumb">
                            <img src="{{ asset('images/products/'.$productItem->img_main.'') }}" alt="{{ $productItem->name }}">
                            <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                        </div>
                        <div class="item-content">
                            
                            <p class="product_ref_kind">{{ $productItem->brand->name }}</p>
                            <p class="product_ref_name">{{ $productItem->name }}</p>
                            <div class="product_font_price">
                                <b>{{ $productItem->sellprice }}</b>
                                {{-- <del class="product_font_price_discount">2.499.000 đ</del> --}}
                            </div>
                            <form method="POST" action="{{route('addToCart')}}" class="add-to-cart-form">
                                @csrf
                                    <input type="hidden" name="product_id" value={{$productItem->id_product}}/>
                                    <input type="hidden" name="quantity" value="1"/>
                                    <button class="product_addToCard" type="submit">
                                        <span class="product_addToCard_font">THÊM VÀO GIỎ</span>
                                    </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
         
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