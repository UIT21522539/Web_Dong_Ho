<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/User/home.css') }}" rel="stylesheet">
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
    <div class="product-container">
        <div class="product-container">
        <div class="product" data-index="0">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
                        <img  alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75" loading="lazy">
                    </picture>
                </figure>
            </div>
            </a>
            <div class="product-content" >
                <p>KABHMIR</p>
                <div  style="margin-bottom: 5px;">
                    <p>CALM</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
        </div>
        <div  class="product" data-index="1">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
                            <img alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75" loading="lazy">
                    </picture>
                </figure>	
            </div></a>
            <div class="product-content" >
                <p>KABHMIR</p>
                <div  style="margin-bottom: 5px;">
                    <p>CALM</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
        </div>
        <div class="product" data-index="2">
            <a href="#" target="_self">
                <div>
                    <figure>
                        <picture>
                            <img alt="Standup image of Ultra-Complication Universelle (RD#4)" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fv%2Fd%2Fvd.dapper.png&w=640&q=75" loading="lazy">
                        </picture>
                    </figure>
                </div>
            </a>
            <div class="product-content" >
                <p>KABHMIR</p>
                <div  style="margin-bottom: 5px;">
                    <p>CALM</p>
                </div>
                <p><b>2.124.000 đ</b></p>
            </div>
        </div> 
	</div>
    </div>
    <div class="bestSell">
        <h1>WOMEN'S BEST SELLERS</h1>
        <a href="#">XEM TẤT CẢ</a>
    </div>
    <div class="product-container">
        <div class="product-container">
        <div class="product" data-index="0">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
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
        </div>
        <div  class="product" data-index="1">
            <a href="#" target="_self">
            <div>
                <figure>
                    <picture>
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
    @endsection
</body>
</html>