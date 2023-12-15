
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

@push('scripts')
    <script src="{{asset('/assets/js/header.js')}}"></script>
@endpush