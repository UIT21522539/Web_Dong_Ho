<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('assets/css/User/detailProduct.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="{{ asset('assets/css/User/detailproduct.css') }}" rel="stylesheet">
	<title>Sản phẩm</title>
</head>
<body>
	@extends('layouts.app')
    @section('content')
	<div class="detailproduct_container">
		<div class="detailproduct_choose">
			<div class="hinhTron" onclick="showImage(0)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
			</div>
			<div class="hinhTron" onclick="showImage(1)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fr%2Fbr.dapper.2.png&w=640&q=75">
			</div>
			<div class="hinhTron" onclick="showImage(2)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2F2%2F_%2F2_1_2_.jpg&w=640&q=75">
			</div>
			<div class="hinhTron" onclick="showImage(3)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fc%2Fa%2Fcalm_3.jpg&w=640&q=75">
			</div>
			<div class="hinhTron" onclick="showImage(4)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fc%2Fa%2Fcalm.jpg.jpg&w=640&q=75">
			</div>
			<div class="hinhTron" onclick="showImage(5)">
				<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fm%2Fimg_1423.jpg&w=640&q=75">
			</div>
		</div>
		<div class="detailproduct_image">
				<img id="mainImageDisplay" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75">
		</div>

		<script>
			function showImage(index) {
				// Array of main image URLs
				var mainImages = [
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Ft%2Fbt.calm.png&w=640&q=75",
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fr%2Fbr.dapper.2.png&w=640&q=75",
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2F2%2F_%2F2_1_2_.jpg&w=640&q=75",
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fc%2Fa%2Fcalm_3.jpg&w=640&q=75",
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fc%2Fa%2Fcalm.jpg.jpg&w=640&q=75",
					"https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fi%2Fm%2Fimg_1423.jpg&w=640&q=75",					
				];
				// Display the selected image in the mainImageDisplay element
				document.getElementById("mainImageDisplay").src = mainImages[index];
			}
		</script>
		
		<div class="detailproduct_info">
			<div class="detailproduct_kind">KASHMIR</div>
			<div class="detailproduct_name">CALM</div>
			<div class="detailproduct_font_price">
				<b class="detailproduct_price">2.324.000 đ</b> 
				<del class="detailproduct_delprice">2.499.000 đ</del><br>
			</div>
			<div class="detailproduct_situation">
				<span>Tình trạng:  </span>
				<span class="detailproduct_stocking">Còn hàng</span>
				<img class="detailproduct_situation_line" src="{{ asset('assets/img/User/line.png') }}"> 
				<i class="fa fa-ruler-vertical"></i>
				<button class="detailproduct_situation_size" >Cỡ cổ tay </button>
			</div>
			<hr  width="90%" align="center" color="black" size="1px"/>
			<div class="detailproduct_text_discount">
				GIẢM TỚI 
				<span class="text_discount">30%</span>
				CHO PHỤ KIỆN ĐI KÈM <br>
			</div>
			<div class="detailproduct_moreitem">
				<div class="detailproduct_image_moreitem">
					<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fc%2Fu%2Fcuff-jackie-sil-shadow.png&w=1920&q=75">
					<p><a class="moreitem_name" href="">JACKIE SILVER</a></p>
					<del class="moreitem_discount">399.000đ </del>
					<span class="moreitem_price">+319.000đ</span> <br>
					<button class="moreitem_add">+THÊM</button>
				</div>
				<div class="detailproduct_image_moreitem">
					<img src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fcache%2Fd96eb53c23516f6ca600411b8495131f%2Fc%2Fu%2Fcuff-jackie-sil-shadow.png&w=1920&q=75">
					<p><a class="moreitem_name" href="">JACKIE SILVER</a></p>
					<del class="moreitem_discount">399.000đ </del>
					<span class="moreitem_price">+319.000đ</span> <br>
					<button class="moreitem_add">+THÊM</button>
				</div>
			</div>
			<button class="payment highlight">Thanh Toán Ngay</button> <br>
			<button class="addToCart">Thêm vào giỏ</button><br>
		</div>
		
	</div>
	<div class="product_policy">
		<div>
			<span class="material-symbols-outlined">
				local_shipping
			</span>
			<span class="product_policy_text">MIỄN PHÍ VẬN CHUYỂN ĐƠN HÀNG >500K</span>
		</div>
		<div>
			<span class="material-symbols-outlined">
				verified_user
			</span>
			<span class="product_policy_text">BẢO HÀNH 10 NĂM</span>
		</div>
		<div>
			<span class="material-symbols-outlined">
				inventory_2
			</span>
			<span class="product_policy_text">ĐỔI TRẢ MIỄN PHÍ TRONG VÒNG 3 NGÀY</span>
		</div>
	</div>
	<div class="ct-product-info">
		<div class="ct-product-tab">
			<button class="tablinks" onclick="openCity(event, 'description')">THÔNG TIN SẢN PHẨM</button>
			<button class="tablinks" onclick="openCity(event, 'delivering')">CHÍNH SÁCH VẬN CHUYỂN</button>
			<button class="tablinks" onclick="openCity(event, 'return')">ĐỔI TRẢ & BẢO HÀNH</button>
		</div>
		<hr>
		<div class="info-tag">
			<div style="display: none" id="description" class="tabcontent" >
				<p>Đồng hồ nam Curnon Colosseum Mortar - Thiết kế mạnh mẽ cho người trẻ Việt; Dây da, Kích thước mặt lớn 42mm, Chống nước đến 5ATM, Mặt kính Sapphire chống xước vượt trội...</p>
			</div>
			<div style="display: none" id="delivering" class="tabcontent" >
				<h2>Phí vận chuyển:</h2>
				<p>- MIỄN PHÍ VẬN CHUYỂN với đơn hàng từ 500,000đ trở lên</p>
				<p>- 30,000đ với đơn hàng có giá trị thấp hơn 500,000đ</p>
				<h2>Thời gian vận chuyển:</h2>
				<p>- Nội thành TP.HCM: 1-2 ngày</p>
				<p>- Miền Trung: 3-5 ngày</p>
				<p>- Miền Bắc: 5-7 ngày</p>
			</div>
			<div style="display: none" id="return" class="tabcontent">
				<h2>Chính sách đổi trả:</h2>
				<p>- 1 ĐỔI 1 trong vòng 3 ngày kể từ khi nhận hàng (kèm theo các điều kiện)</p>
				<h2>Chính sách bảo hành:</h2>
				<p>- BẢO HÀNH 10 NĂM đối với những lỗi từ nhà sản xuất</p>
				<p>- BẢO HÀNH MIỄN PHÍ (1 lần) trong 1 năm đầu tiên với những lỗi người dùng như: vỡ, nứt kính, hấp hơi nước, va đập mạnh, rơi linh kiện bên trong mặt đồng hồ...</p>
				<p>- THAY PIN MIỄN PHÍ TRỌN ĐỜI</p>
			</div>
		</div>
	</div>
</div>

<script>
	function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
</script>
@endsection
</body>
</html>