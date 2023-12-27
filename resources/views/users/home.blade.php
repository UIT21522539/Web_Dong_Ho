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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}" />
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
            <img src="{{ asset('assets/img/User/Home/banner.jpg') }}">
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
            <a class="cat1" href="/product/men"> 
                <p>ĐỒNG HỒ NAM</p>
            </a>
            <a class="cat2" href="/product/men"> 
                <p>PHỤ KIỆN</p>
            </a>
            <a class="cat3" href="/product/women"> 
                <p>ĐỒNG HỒ NỮ</p>
            </a>
        </div>
    <div class="bestSell">
        <h1>MEN'S BEST SELLERS</h1>
        <a href="/product/men">XEM TẤT CẢ</a>
    </div>
    <div class="product_wrapper">
        <div class="product_top">
        {{-- discount --}}
            @foreach ($productListB as $productItem)    
            <a href="{{ route('detailProduct',['id'=>$productItem->id_product]) }}">
                <div class="product_info product_highlight">
                    <img src="{{ $productItem->img_main }}">
                    <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                    
                    {{-- <form action="/carts" method='POST'> --}}
                       
                        <a class="product_addToCard" target="_self" onclick="AddCart({{ $productItem->id_product }})" href="javascript:">
                            <span class="product_addToCard_font">
                                <input type="text" name='id' style="display: none;" value="{{ $productItem->id_product }}">
                                <input type="submit" value="THÊM VÀO GIỎ">
                            </span>
                        </a>
                  
                    
                    <p class="product_ref_kind">{{ $productItem->brName }}</p>
                    <span class="product_ref_name">{{ $productItem->pdName }}</span>
                    <div class="product_font_price">
                        @if($productItem->isdiscount == '1')
                            @php
                                $discountedPrice =$productItem->sellprice - $productItem->sellprice * ($productItem->discount / 100);
                                $finalPrice = number_format($discountedPrice) . ' đ';
                            @endphp
                            <b>{{ $finalPrice }}</b>
                        @else
                            <b>{{ number_format($productItem->sellprice) }} đ</b>
                        @endif
                        <del class="product_font_price_discount">{{ number_format($productItem->sellprice) }} đ</del>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="bestSell">
        <h1>WOMEN'S BEST SELLERS</h1>
        <a href="/product/women">XEM TẤT CẢ</a>
    </div>
    <div class="product_wrapper">
        <div class="product_top">
        {{-- discount --}}
            @foreach ($productListW as $productItem)    
            <a href="{{ route('detailProduct',['id'=>$productItem->id_product]) }}">
                <div class="product_info product_highlight">
                    <img src="{{ $productItem->img_main }}">
                    <b class="product_image_discount">-{{ $productItem->discount }}%</b>
                    
                    {{-- <form action="/carts" method='POST'> --}}
                       
                        <a class="product_addToCard" target="_self" onclick="AddCart({{ $productItem->id_product }})" href="javascript:">
                            <span class="product_addToCard_font">
                                <input type="text" name='id' style="display: none;" value="{{ $productItem->id_product }}">
                                <input type="submit" value="THÊM VÀO GIỎ">
                            </span>
                        </a>
                  
                    
                    <p class="product_ref_kind">{{ $productItem->brName }}</p>
                    <span class="product_ref_name">{{ $productItem->pdName }}</span>
                    <div class="product_font_price">
                        @if($productItem->isdiscount == '1')
                            @php
                                $discountedPrice =$productItem->sellprice - $productItem->sellprice * ($productItem->discount / 100);
                                $finalPrice = number_format($discountedPrice) . ' đ';
                            @endphp
                            <b>{{ $finalPrice }}</b>
                        @else
                            <b>{{ number_format($productItem->sellprice) }} đ</b>
                        @endif
                        <del class="product_font_price_discount">{{ number_format($productItem->sellprice) }} đ</del>
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
    

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    

    <script>
        function AddCart(id) {
    // Get the CSRF token from the meta tag in the HTML
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // var url = 'Add-Cart/' + id;
        var url = "{{ url('/Add-Cart') }}/" + id;
        console.log( "{{ url('/Add-Cart') }}/" + id);

        // Include the CSRF token in the AJAX request headers
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .done(function (response) {
            // Check if the response contains a redirect URL
            if (response.redirect) {
                window.location.href = response.redirect;
            } else {
                RenderCart(response, id);
                alertify.success('Đã thêm giỏ hàng thành công');
            }
        })
        .fail(function (xhr, status, error) {
            // Handle AJAX request failure
            console.error(error);

            // Check if the response status is 401 (Unauthorized)
            if (xhr.status === 401) {
                // Redirect to the login page
                window.location.href = '/login';
            }
        });
    }
        
        

    function RenderCart(response){
        $("#changeItemCart").empty();
        $("#changeItemCart").append(response);
        if(temp == 1){
            openNav();
        }
    }
    function RenderCart(response , id){
        $("#changeItemCart").empty();
        $("#changeItemCart").append(response);
        if(temp == 1){
            openNav();
        }
    }
    </script>

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