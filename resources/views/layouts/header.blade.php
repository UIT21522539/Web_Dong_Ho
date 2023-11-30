<header>
    <div class="grid-container" style="top: 32px;">    
        <nav role="tablist">
            <div class="navbar">
                <ul class="menu">
                    <li>
                        <div class="d">
                            <button class="d-btn">NAM GIỚI</button>
                            <div class='d-content'>
                                <div class='row'>
                                    <div class='column'>
                                        <a onmouseover="openCity(event, 'London')" href='#'><h3>ĐỒNG HỒ</h3></a>
                                        <a onmouseover="openCity(event, 'Paris')" href='#'><h3>PHỤ KIỆN</h3></a>
                                        <a onmouseover="openCity(event, 'Tokyo')" href='#'><h3>DÂY ĐỒNG HỒ</h3></a>
                                    </div>
                                    <div class='row-content'>
                                        <div id="London" class="tabcontent">
                                            <h3>London</h3>
                                            <p>London is the capital city of England.</p>
                                        </div>
                                        
                                        <div id="Paris" class="tabcontent">
                                            <h3>Paris</h3>
                                            <p>Paris is the capital of France.</p> 
                                        </div>
                                        
                                        <div id="Tokyo" class="tabcontent">
                                            <h3>Tokyo</h3>
                                            <p>Tokyo is the capital of Japan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <a href="#" onclick="openNav()">
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
            <div  class="product01">
                <div class="pd01">
                    <button>×</button>
                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fh%2Fe%2Fherbert.png&w=640&q=75">
                </div>
                <div class="pd02">
                    <p>HERBERT</p>
                    <p style="margin-top: 60%">40MM</p>
                </div>
                <div class="pd03">
                    <p id="tien">2.124.000</p>
                    <div class="Qty">
                        <div class="quantity-container">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="text" value="1" name="so" id="so" class="quantity-input" oninput="updateResult()">
                            <button onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div  class="product01">
                <div class="pd01">
                    <button>×</button>
                    <img width="84px" height="84px" src="https://curnonwatch.com/_next/image/?url=https%3A%2F%2Fshop.curnonwatch.com%2Fmedia%2Fcatalog%2Fproduct%2Fb%2Fx%2Fbx.swank.png&w=640&q=75">
                </div>
                <div class="pd02">
                    <p>HERBERT</p>
                    <p style="margin-top: 60%">40MM</p>
                </div>
                <div class="pd03">
                    <p id="tien">2124000</p>
                    <div class="Qty">
                        <div class="quantity-container">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="text" value="1" name="so" id="so" class="quantity-input" oninput="updateResult()">
                            <button onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-total">
            <hr>
            <div class="sidebar-total-content">
                <div style="display: flex; margin-bottom: 10%">
                    <p style="color:black">Thành tiền:</p>
                    <p style="color:red; margin-left: 45%"><b id="result">2.124.000</b></p>
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
                                        <a href='#'><h3>ĐỒNG HỒ</h3></a>
                                        <a href='#'><h3>PHỤ KIỆN</h3></a>
                                        <a href='#'><h3>DÂY ĐỒNG HỒ</h3></a>
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
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
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

    // Lấy thẻ input và phần hiển thị kết quả
    const inputElement = document.getElementById('so');
    const resultElement = document.getElementById('result');

    // Hàm giảm giá trị của input
    function decreaseQuantity() {
        let currentValue = parseInt(inputElement.value);
        if (currentValue > 1) {
            currentValue--;
        }
        inputElement.value = currentValue;
        updateResult();
    }

    // Hàm tăng giá trị của input
    function increaseQuantity() {
        let currentValue = parseInt(inputElement.value);
        currentValue++;
        inputElement.value = currentValue;
        updateResult();
    }

    // Hàm cập nhật kết quả dựa trên giá trị mới
    function updateResult() {
        const value = parseInt(inputElement.value);
        const tienValue = parseFloat(document.getElementById('tien').textContent.replace(/\./g, '').replace(',', '.')) || 0; 
        const result = value * tienValue || 0;
        resultElement.textContent = `${result.toLocaleString('vi-VN',)}`;
    }
</script>