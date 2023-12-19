<header>
    <div class="grid-container" style="top: 32px;">    
        <nav role="tablist">
            <div class="navbar">
                <ul class="menu">
                    <li>
                        <div class="d">
                            <button class="d-btn">NAM GIỚI</button>
                            <div class="divTable"></div>
                            <script>
                                window.onload = function() {
                                openDivHeader();
                            };
                            </script>
                        </div>
                    </li>
                    <li>
                        <div class="d">
                            <button class="d-btn">NỮ GIỚI</button>
                            <div class="divTable"></div>
                            <script>
                                window.onload = function() {
                                openDivHeader();
                            };
                            </script>
                        </div>
                    </li>
                    <li>
                        <div class="d">
                            <button class="d-btn">VỀ CURNON</button>
                            <div class="d2-content">
                                <div class="row2">
                                    <div class="column2">
                                        <a href="#"><h3>Blog</h3></a>
                                        <a href="#"><h3>Về chúng tôi</h3></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div style="display: flex">
                    <li>
                        <div>
                            <a href="#">
                                <img class="nav-img" src="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}">
                            </a>
                        </div>
                    </li>
                    <li class="cart">
                        <div>
                            @if(session()->has('user_session'))
                            <a href="{{route('getCart')}}" class="item-header-user">
                                <div class="cart-align">
                                    <p style="font-weight: lighter">GIỎ HÀNG</p>
                                    <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/cart.png') }}">
                                </div>
                            </a>
                        @else
                        <a href="#" onclick="openNav()">
                            <div class="cart-align">
                                <p style="font-weight: lighter">GIỎ HÀNG</p>
                                <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/cart.png') }}">
                            </div>
                        </a>
                        @endif

                        </div>
                    </li>
                    <li class="user">
                        <div>
                              
                                @if(session()->has('user_session'))
                                    <a href="{{route('user.profile')}}" class="item-header-user">
                                        <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/user.png') }}">
                                        <span>{{session('user_session')->last_name}},{{session('user_session')->first_name}}</span>
                                    </a>
                                @else
                                <a href="{{route('user.login')}}" class="item-header-user">
                                    <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/user.png') }}">
                                    <span>Đăng nhập</span>
                                </a>
                                @endif
                         
                        </div>
                    </li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>
{{-- 
<div>
    <div id="mySidebar" class="sidebar">
        <div class="sidebar-header">
            <p style="font-size: 25px; margin-left: 40px; font-weight: 600">GIỎ HÀNG CỦA BẠN</p>
            <p style="font-size: 45px; margin-left: 60px"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a></p>
        </div>
        <div class="sidebar-shipping">
            <p><img width="26px" height="26px" src="{{ asset('assets/img/User/Home/shipped.png') }}"></p>
            <p style="font-size:12px; color: black; margin-left: 12px">MIỄN PHÍ VẬN CHUYỂN ĐƠN HÀNG > 700K</p>
        </div>
        <div class="sidebar-product">
            <div class="show-product-close">
                <script>
                    deleteProduct(0);
                </script>
            </div>
            <div class="product01">
                <div class="pd01">
                    <button onclick="deleteProduct(0)">×</button>
                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fh%2Fe%2Fherbert.png&w=640&q=75">
                </div>
                <div class="pd02">
                    <p>HERBERT</p>
                    <p style="margin-top: 60%">40MM</p>
                </div>
                <div class="pd03">
                    <p class="tien">2.124.000</p>
                    <div class="Qty">
                        <form id='myform' method='POST' class='quantity' action='#'>
                            <input type='button' value='-' class='qtyminus minus' field='quantity' />
                            <input type='text' name='quantity' value='1' class='qty' />
                            <input type='button' value='+' class='qtyplus plus' field='quantity' />
                        </form>
                    </div>
                </div>
            </div>
            <div class="show-product-close">
                <script>
                    deleteProduct(1);
                </script>
            </div>
            <div class="product01">
                <div class="pd01">
                    <button onclick="deleteProduct(1)">×</button>
                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                </div>
                <div class="pd02">
                    <p>HERBERT</p>
                    <p style="margin-top: 60%">40MM</p>
                </div>
                <div class="pd03">
                    <p class="tien">8.124.000</p>
                    <div class="Qty">
                        <form id='myform' method='POST' class='quantity' action='#'>
                            <input type='button' value='-' class='qtyminus minus' field='quantity' />
                            <input type='text' name='quantity' value='1' class='qty' />
                            <input type='button' value='+' class='qtyplus plus' field='quantity' />
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="sidebar-total">
            <hr>
            <div class="sidebar-total-content">
                <div style="display: flex; margin-bottom: 10%">
                    <p style="color:black">Thành tiền:</p>
                    <p style="color:red; margin-left: 45%"><b id="result">10.248.000</b></p>
                </div>
                <div class="sidebar-total-purchase">
                    <button>
                        THANH TOÁN NGAY
                        <img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openDivHeader(){
        var divTables = document.getElementsByClassName('divTable');
        var html = `<div class='d-content'>
                                <div class='row'>
                                    <div class='column'>
                                        <a onmouseover="openCity(event, 'watch')" href='#'><h3>ĐỒNG HỒ</h3></a>
                                        <a onmouseover="openCity(event, 'accessories')" href='#'><h3>PHỤ KIỆN</h3></a>
                                        <a onmouseover="openCity(event, 'leather')" href='#'><h3>DÂY ĐỒNG HỒ</h3></a>
                                    </div>
                                    <div class='row-content'>
                                        <div id="watch" class="tabcontent">
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FKashmir.png&w=128&q=75">
                                                <p>KASHMIR</p>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <p style="margin-bottom: 12%; margin-top: 50%">XEM TẤT CẢ</p>
                                                <img width="24px" height="24px" src="{{ asset('assets/img/User/Blog/arrow.png') }}" >
                                            </div>
                                        </div>
                                        <div id="accessories" class="tabcontent">
                                            <div class="tabcontent-all">
                                                <div class="tabcontent-accessories">
                                                    <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FCuff_1.png&w=128&q=75">
                                                    <p>VÒNG TAY</p>
                                                </div>
                                                <div class="tabcontent-watch">
                                                    <img width="114px" height="114px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fcategory%2FDa_y_ba_t_gia_c_che_o.jpg&w=128&q=75">
                                                    <p>VÒNG CỔ</p>
                                                </div>
                                            </div>
                                            <div class="tabcontent-watch">
                                                <p style="margin-bottom: 12%; margin-top: 140%">XEM TẤT CẢ</p>
                                                <img width="24px" height="24px" src="{{ asset('assets/img/User/Blog/arrow.png') }}" >
                                            </div>
                                        </div>
                                        <div id="leather" class="tabcontent">
                                            <img width="310px" height="310px" style="margin-left: 8%; margin-top: 4%" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fcms.curnonwatch.com%2Fuploads%2F3_ebc2dc50c4.jpeg&w=384&q=75">
                                            <div class="leather-content">
                                                <p>Từ nay bạn đã có thể biến một thành nhiều chiếc đồng hồ để thay đổi phong cách thời trang của bản thân với dây đồng hồ Curnon.
                                                </p>
                                                <button>MUA NGAY</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
        for (var i = 0; i < divTables.length; i++) {
            divTables[i].innerHTML = html;
        }
    }

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            if (tabcontent[i].id === cityName) {
                tabcontent[i].style.display = "flex";
            } else {
                tabcontent[i].style.display = "none";
            }
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
    }

    const body = document.body;
    let lastScroll = 0;
    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            body.classList.remove("scroll-up");
            return;
        }

        if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
            body.classList.remove("scroll-up");
            body.classList.add("scroll-down");
        } else if (
            currentScroll < lastScroll &&
            body.classList.contains("scroll-down")
        ) {
            body.classList.remove("scroll-down");
            body.classList.add("scroll-up");
        }
        lastScroll = currentScroll;
    });

    function openNav() {
      document.getElementById("mySidebar").style.width = "400px";
    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

    jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus, .minus', function (e) {
            let $form = $(this).closest('form.quantity');
            let $input = $form.find('input.qty');
            let val = parseInt($input.val());
            let price = parseInt($form.closest('.pd03').find('.tien').text().replace(/\D/g, '')); // Lấy giá trị thành tiền

            if ($(this).hasClass('plus')) {
                $input.val(val + 1).change();
            } else {
                if (val > 1) {
                    $input.val(val - 1).change();
                }
            }

            // Cập nhật thành tiền
            let newTotal = $input.val() * price;
            updateTotal();
        });

        function updateTotal() {
            let total = 0;
            $('.pd03').each(function () {
                let $form = $(this).find('form.quantity');
                let quantity = parseInt($form.find('input.qty').val());
                let price = parseInt($(this).find('.tien').text().replace(/\D/g, ''));
                total += quantity * price;
            });

            $('#result').text(total.toLocaleString('vi-VN'));
        }
    });

    function deleteProduct(productIndex) {
        var divTables = document.getElementsByClassName('show-product-close');
        var html = `<div class="product-close">
                    <h3>Đừng làm thế, xin bạn đấy!</h3>
                        <div>
                            <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
                            <button class="bt02">XOÁ SẢN PHẨM</button>
                        </div>
                    </div>`
        for (var i = 0; i < divTables.length; i++) {
            if (i === productIndex) {
                divTables[i].innerHTML = html;
            }
        }
    }

    function turnback(productIndex){
        var divTables = document.getElementsByClassName('product-close');
        for (var i = 0; i < divTables.length; i++) {
            if (i === productIndex) {
                divTables[i].style.display = 'none';
            }
        }
    }
        

</script> --}}