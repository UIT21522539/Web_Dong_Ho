<header>
    <div class="grid-container" style="top: 32px;">    
        <nav role="tablist">
            <div class="navbar">
                <ul class="menu">
                    <li>
                        <div class="d">
                            <button class="d-btn">NAM GIỚI</button>
                            <div class="d-content">
                                <div class="row">
                                    <div class="column">
                                        <a href="#"><h3>ĐỒNG HỒ</h3></a>
                                        <a href="#"><h3>PHỤ KIỆN</h3></a>
                                        <a href="#"><h3>DÂY ĐỒNG HỒ</h3></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d">
                            <button class="d-btn">NỮ GIỚI</button>
                            <div class="d-content">
                                <div class="row">
                                    <div class="column">
                                        <a href="#"><h3>ĐỒNG HỒ</h3></a>
                                        <a href="#"><h3>PHỤ KIỆN</h3></a>
                                        <a href="#"><h3>DÂY ĐỒNG HỒ</h3></a>
                                    </div>
                                </div>
                            </div>
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
                            <a href="#">
                                <div class="cart-align">
                                    <p style="font-weight: lighter">GIỎ HÀNG</p>
                                    <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/cart.png') }}">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="user">
                        <div>
                            <a href="#">
                                <img width="24px" height="24px" src="{{ asset('assets/img/User/layouts/user.png') }}">
                            </a>
                        </div>
                    </li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div>
    {{ $price = 0 }}
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
            @if (auth()->user())
            @foreach (auth()->user()->cartProducts as $product)
                <div class="show-product-close">
                    <script>
                        deleteProduct(0);
                    </script>
                </div>
                
                <div class="product01">
                    <div class="pd01">
                        <button onclick="deleteProduct(0)">×</button>
                        <img width="84px" height="84px" src="{{ $product->img_main }}">
                    </div>
                    <div class="pd02">
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="pd03">
                        <p class="tien">{{ $product->sellprice }} đ</p>
                        <div style="display: none;">{{ $price += $product->sellprice }}</div>
                        <div class="Qty">
                            <form id='myform' method='POST' class='quantity' action='#'>
                                <input type='button' value='-' class='qtyminus minus' field='quantity' />
                                <input type='text' name='quantity' value='1' class='qty' />
                                <input type='button' value='+' class='qtyplus plus' field='quantity' />
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            
            
        </div>
        <div class="sidebar-total">
            <hr>
            <div class="sidebar-total-content">
                <div style="display: flex; margin-bottom: 10%">
                    <p style="color:black">Thành tiền:</p>
                    <p style="color:red; margin-left: 45%"><b id="result">{{ $price }} đ</b></p>
                </div>
                <div class="sidebar-total-purchase">
                    <a href="/checkout">
                        <button>
                            THANH TOÁN NGAY
                            <img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
            if(i == productIndex)
                divTables[i].innerHTML += html;
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
        

</script>