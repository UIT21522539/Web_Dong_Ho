<div class="order-bg" id="#changeItemCart2">
    @if(Session::has("Cart") != null)
    <div class="order">
        <div class="order-header">
            <h1>ĐƠN HÀNG</h1> 
        </div>
        <hr>
        <div class="order-update">
            <a  href="#" onclick="toggleProduct()">Sửa</a>
        </div>
        @foreach (Session::get('Cart')->products as $item)
            <div class="show-product-close" id="{{$item['productInfo']->id_product }}">
                {{-- <script>
                    deleteProduct({{$item['productInfo']->id_product }});
                </script> --}}
            </div>
            <div class="order-product">
                <div>
                    <button onclick="deleteProduct({{$item['productInfo']->id_product }})" style="display: none;" class="showBTN">×</button>
                </div>
                <img width="84px" height="84px" src="{{ $item['productInfo']->img_main }}">
                <div class="pd02">
                    <p style="margin-bottom: 3%;">{{ $item['productInfo']->name }}</p>
                    <p style="margin-top: 10%">Qty:{{ $item["quanty"] }}</p>
                </div>
                <p style="margin-top: 2%; font-size: 18px; position: absolute; margin-left: 500px">
                    <b>{{ number_format($item['productInfo']->sellprice * $item["quanty"]) }} ₫</b>
                </p>
            </div>
        @endforeach
        
        <hr style="margin-top: 6%; margin-bottom: 5%">
        <div class="bill">
            <div class="bill-total">
                <p style="display: flex;font-size: 18px; margin-bottom: 12px">Thành tiền</p>
                <p><b style="right:0; margin-left: 430px" > {{ number_format(Session::get('Cart')->totalPrice) }} ₫</b></p>
            </div>
            <div class="bill-shipped">
                <p>Phí ship</p>
                <p><b style="right:0; margin-left: 486px" > 0 ₫</b></p>
            </div>
            <hr style="margin-top: 6%; margin-bottom: 5%">
        </div>
        <div class="order-product-sum">
            <p style="font-size: 20px">TỔNG:</p>
            <p><h1 style="margin-left: 370px">{{ number_format(Session::get('Cart')->totalPrice) }} ₫</h1></p>
         </div>
</div>
@endif
</div>

<script>
    function toggleProduct(){
        var divTables = document.getElementsByClassName("showBTN");
        for (var i = 0; i < divTables.length; i++) {
            divTables[i].style.display = (divTables[i].style.display === 'none') ? '' : 'none';
    }
    }

    function deleteProduct(productIndex) {
        var divTables = document.getElementById(productIndex);
        divTables.style.display = '';
        var html = `<div class="product-close">
                    <h3>Đừng làm thế, xin bạn đấy!</h3>
                        <div>
                            <button class="bt01" onclick="turnback(${productIndex})">QUAY LẠI</button>
                            <button class="bt02" data-id="${productIndex}">XOÁ SẢN PHẨM</button>
                        </div>
                    </div>`

        divTables.innerHTML = html;
        
    }

    function turnback(productIndex){
        var divTables = document.getElementById(productIndex);
        divTables.style.display = 'none';
    }

    $(document).on("click", ".bt02", function() {
        // console.log("{{ url('/Delete-Cart/') }}/" + $(this).data('id') +'/'+ 2) ;
        var url = "{{ url('/Delete-Cart/') }}/" + $(this).data('id') +'/'+ 2;

        $.ajax({
            url: url,
            type: 'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Đã xoá giỏ hàng thành công');
        });
    });

    function RenderCart(response){
        $("#changeItemCart2").empty();
        $("#changeItemCart2").append(response);
    }
</script>