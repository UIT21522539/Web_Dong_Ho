<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/User/home.css') }}" rel="stylesheet">
<<<<<<< HEAD
=======
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider/lightslider.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/Jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lightslider/lightslider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.1.js" integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
>>>>>>> 6633ae973e0d2ab111164a8877702bf6292c6242
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
<<<<<<< HEAD
    <div class="product-container">
        <div class="product-container">
        @foreach ($productList as $product)
        <div class="product" data-index="0">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
                        <source media="(min-width: 1025px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <source media="(min-width: 768px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <source media="(min-width: 0px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <img  alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75" loading="lazy">
                    </picture>
                </figure>
            </div>
            </a>
            <div class="product-content" >
                <p> {{ $product->name }}</p>
                {{-- <div  style="margin-bottom: 5px;">
                    <p>CALM</p>
                </div> --}}
                <p><b>{{ $product->sellprice }}đ</b></p>
            </div>
        </div> 
        @endforeach
	</div>
=======
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
>>>>>>> 6633ae973e0d2ab111164a8877702bf6292c6242
    </div>
    <div class="bestSell">
        <h1>WOMEN'S BEST SELLERS</h1>
        <a href="#">XEM TẤT CẢ</a>
    </div>
<<<<<<< HEAD
    <div class="product-container">
        <div class="product-container">
        <div class="product" data-index="0">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
                        <source media="(min-width: 1025px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <source media="(min-width: 768px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <source media="(min-width: 0px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
                        <img  alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fe%2Fbellini_2.png&w=640&q=75" loading="lazy">
                    </picture>
                </figure>
            </div>
            </a>
            <div class="product-content" >
                <p>SICILY</p>
                <div  style="margin-bottom: 5px;">
                    <p>BELLINI</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
=======
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
>>>>>>> 6633ae973e0d2ab111164a8877702bf6292c6242
        </div>
        <div  class="product" data-index="1">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
                            <source media="(min-width: 1025px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                            <source media="(min-width: 768px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                            <source media="(min-width: 0px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                            <img alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2F3%2F_%2F3_2.png&w=640&q=75" loading="lazy">
                    </picture>
                </figure>	
            </div></a>
            <div class="product-content" >
                <p>AURORA</p>
                <div  style="margin-bottom: 5px;">
                    <p>MORGANITE</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
        </div>
        <div class="product" data-index="2">
            <a href="#" target="_self">
                <div>
                    <figure>
                        <picture>
                            <source media="(min-width: 1025px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fv%2Fd%2Fvd.dapper.png&w=640&q=75">
                            <source media="(min-width: 768px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fv%2Fd%2Fvd.dapper.png&w=640&q=75">
                            <source media="(min-width: 0px)" data-srcset="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fv%2Fd%2Fvd.dapper.png&w=640&q=75">
                            <img alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fc%2Fh%2Fcharm.png&w=640&q=75" loading="lazy">
                        </picture>
                    </figure>
                </div>
            </a>
            <div class="product-content" >
                <p>MORAINE</p>
                <div  style="margin-bottom: 5px;">
                    <p>CHARM</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
        </div> 
	</div>
    </div>
<<<<<<< HEAD
=======
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
>>>>>>> 6633ae973e0d2ab111164a8877702bf6292c6242
    @endsection
</body>
</html>