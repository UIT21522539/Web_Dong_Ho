@if(Session::has("Cart") != null)

<div id="mySidebar" class="sidebar">
    <div class="sidebar-header">
        <p style="font-size: 25px; margin-left: 40px; font-weight: 600">GIỎ HÀNG CỦA BẠN</p>
        <p style="font-size: 45px; margin-left: 60px"><a href="javascript:void(0)" class="closebtn"
                onclick="closeNav()">×</a></p>
    </div>
    <div class="sidebar-shipping">
        <p><img width="26px" height="26px" src="{{ asset('assets/img/User/Home/shipped.png') }}"></p>
        <p style="font-size:12px; color: black; margin-left: 12px">MIỄN PHÍ VẬN CHUYỂN ĐƠN HÀNG > 700K</p>
    </div>
    <div class="sidebar-product">
        @foreach(Session::get("Cart")->products as $item)
       
        <div class="product01">
            <div class="pd01">
                <button class="si-close" data-id="{{$item['productInfo']->id_product }}">×</button>
                <img width="84px" height="84px" src="{{ $item['productInfo']->img_main }}">
            </div>
            <div class="pd02">
                <p>{{$item['productInfo']->name }}</p>
            </div>
            <div class="pd03">
                <p class="tien">{{ number_format($item['productInfo']->sellprice) }} đ</p>
                <div class="Qty">
                    <form>
                        <input type='button' value='-' class='qtyminus minus' field='quantity' />
                        <input type='text' name='quantity' value='{{ $item["quanty"] }}' class='qty' />
                        <input type='button' value='+' class='qtyplus plus' field='quantity' />
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <div class="sidebar-total">
        <hr>
        <div class="sidebar-total-content">
            <div style="display: flex; margin-bottom: 10%">
                <p style="color:black">Thành tiền:</p>
                <p style="color:red; margin-left: 45%"><b id="result">{{ number_format(Session::get("Cart")->totalPrice) }} đ</b>
                </p>
            </div>
            <div class="sidebar-total-purchase">
                <a href="javascript:void(0)" onclick="redirectToCheckout()">
                    <button>
                        THANH TOÁN NGAY
                        <img width="12px" height="12px" src="{{ asset('assets/img/User/Blog/arrow.png') }}">
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // Đảm bảo rằng mã JavaScript này được đặt trong một tệp script hoặc thẻ <script>
    $(document).ready(function(){
        // Nút trừ
        $(".minus").click(function() {
            var field = $(this).attr("field");
            var currentVal = parseInt($("input[name=" + field + "]").val());

            if (!isNaN(currentVal) && currentVal > 0) {
                $("input[name=" + field + "]").val(currentVal - 1);
            }
        });

        // Nút cộng
        $(".plus").click(function() {
            var field = $(this).attr("field");
            var currentVal = parseInt($("input[name=" + field + "]").val());

            if (!isNaN(currentVal)) {
                $("input[name=" + field + "]").val(currentVal + 1);
            }
        });
    });
</script>
<script>
    function redirectToCheckout() {
       // Lấy giỏ hàng từ Session
    var cart = {!! json_encode(Session::get("Cart")) !!};

// Tạo một mảng key-value từ giỏ hàng
    var queryParams = [];
    for (var i = 0; i < cart.products.length; i++) {
        var product = cart.products[i];
        queryParams.push('products[' + i + '][id]=' + product.productInfo.id_product);
        queryParams.push('products[' + i + '][quanty]=' + product.quanty);
        // Thêm các thông tin khác của sản phẩm nếu cần thiết
    }

    // Tạo chuỗi truy vấn từ mảng key-value
    var queryString = queryParams.join('&');

    // Chuyển hướng đến trang thanh toán với tham số giỏ hàng
    window.location.href = '/checkout?' + queryString;
}
</script>
@endif