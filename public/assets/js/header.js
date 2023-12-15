function openDivHeader() {
    var divTables = document.getElementsByClassName("divTable");
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
                        </div>`;
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
    $(".quantity").on("click", ".plus, .minus", function (e) {
        let $form = $(this).closest("form.quantity");
        let $input = $form.find("input.qty");
        let val = parseInt($input.val());
        let price = parseInt(
            $form.closest(".pd03").find(".tien").text().replace(/\D/g, "")
        ); // Lấy giá trị thành tiền

        if ($(this).hasClass("plus")) {
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
        $(".pd03").each(function () {
            let $form = $(this).find("form.quantity");
            let quantity = parseInt($form.find("input.qty").val());
            let price = parseInt(
                $(this).find(".tien").text().replace(/\D/g, "")
            );
            total += quantity * price;
        });

        $("#result").text(total.toLocaleString("vi-VN"));
    }
});

function deleteProduct(productIndex) {
    var divTables = document.getElementsByClassName("show-product-close");
    var html = `<div class="product-close">
                <h3>Đừng làm thế, xin bạn đấy!</h3>
                    <div>
                        <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
                        <button class="bt02">XOÁ SẢN PHẨM</button>
                    </div>
                </div>`;
    for (var i = 0; i < divTables.length; i++) {
        if (i === productIndex) {
            divTables[i].innerHTML = html;
        }
    }
}

function turnback(productIndex) {
    var divTables = document.getElementsByClassName("product-close");
    for (var i = 0; i < divTables.length; i++) {
        if (i === productIndex) {
            divTables[i].style.display = "none";
        }
    }
}
