
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/suplier.css') }}">
@endpush

@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
    @endif

<h1>{{ $title }}</h1>

    <div class="mb-3 select-product-form">
        <div>
            <div class="select-form">
                <div class="form-control">
                    <label>Chọn sản phẩm</label>
                    <div class="select">
                        <select name="id_product" class="form-control" id="product">
                            <option value="0">Chọn sản phẩm</option>
                            @foreach($products as $item)
                                <option value="{{ $item->id_product }}" data-size="{{$item->size}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <button id="add-row" class="button">Thêm </button>
                </div>
            </div>
    
        </div>
    

        @error('id_product')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>

    <div class="table-product-wrapper hidden">
        <table id="product-table-container" class="table-product">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Import price</th>
                    <th>Total</th>
                    <th>Sell price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Các dòng sản phẩm sẽ được thêm vào đây -->
            </tbody>
        </table>
        <p id="amount"></p>
        <button id="btn-create-invoice" class="btn-create">Tạo phiếu nhập</button>
    </div>


    <div id="product-summary" class="product-summary hidden">
        <h2>Bảng đã nhập:</h2>
        <table id="product-summary-table" class="table-product">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Import price</th>
                    <th>Total</th>
                    <th>Sell price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Các dòng sản phẩm sẽ được thêm vào đây -->
            </tbody>
        </table>

        <p id="summary-total-amount"></p>
        <button id="handle-submit-invoice" class="btn">Xác nhận</button>
    </div>



<script>
    let productItemsList = [];
    const btnAddProductRow = document.getElementById('add-row');
    const btnCreateInvoice = document.getElementById('btn-create-invoice');

    const btnSubmitInvoince = document.getElementById('handle-submit-invoice')

    const tableWrapper = document.getElementsByClassName('table-product-wrapper')[0]; 

   

    
    const subtotalResult = document.getElementById('amount');

    btnAddProductRow.addEventListener('click', onAddProductRow );

    btnCreateInvoice.addEventListener('click', onRenderSummary);
    btnSubmitInvoince.addEventListener('click', handleSubmitInvoice)
    function onAddProductRow() {

            const productSelect = document.getElementById('product');
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const productName = selectedOption.text;
            const productId = Number(selectedOption.value);
            const productSize = selectedOption.getAttribute("data-size");
            

            if(productId === 0){
                alert('Vui long chon san pham');
                return;
            }
            const isProductExists = Boolean(productItemsList.find(prd => prd.productId === productId));

            if(isProductExists){
                alert("Sản phẩm đã được chọn.")
                return;
            }

            productItemsList = [...productItemsList, {productName: productName, productId: productId, productSize: productSize, quantity: 0, import_price: 0, sell_price: 0, total: 0}]

            if(tableWrapper.classList.contains('hidden')){
                tableWrapper.classList.remove('hidden')
            }
            //render html
            renderSubtotal(productItemsList)
            renderSelectProductHtml(productItemsList);

    }

    function renderSelectProductHtml (products)  {

        const productTableContainer = document.getElementById('product-table-container');
        const tableBody = productTableContainer.getElementsByTagName('tbody')[0];

        tableBody.innerHTML = "";
        products.forEach(item => {
       
            tableBody.insertRow().innerHTML = `
                    <td>#${item.productId}</td>
                    <td>${item.productName}</td>
                    <td>${item.productSize}</td>
                    <td><input type="number" class="prd-quantity" value="${item.quantity}" data-id="${item.productId}" onchange="onChangeQuantity(event, ${item.productId})"/></td>
                    <td><input type="number" value="${item.import_price}" onchange="onChangeImportPrice(event, ${item.productId}, '${item.productSize}')" data-id="${item.productId}"/></td>
                    <td><p>${item.total}</p></td>
                    <td><input value="${item.sell_price}" data-id="${item.productId}" onchange="onChangeSalePrice(event, ${item.productId})"/></td>
                    <td><span onclick="onDeleteProduct(${item.productId})">Xoá</span></td>
                `;
        })
    }

    function renderSubtotal(items) {
        const total = items.reduce((acc, item) => acc + item.total, 0);
        subtotalResult.innerHTML = total;
    }
 
    function onChangeQuantity (ev, productId) {
      
        const newQuantity = ev.target.value;


        const newProductItems = productItemsList.map(prd => {

            if(prd.productId === productId){
                return {
                    ...prd,
                    quantity: newQuantity,
                    total: prd.import_price * newQuantity
                }
            }else{
                return prd
            }
        })
        productItemsList = [...newProductItems]
        renderSelectProductHtml(newProductItems);
        renderSubtotal(productItemsList)
    }

    function onChangeImportPrice (ev, productId) {
        
        const importPrice = ev.target.value;

  

        const newProductItems = productItemsList.map(prd => {

            if(prd.productId === productId){
                return {
                    ...prd,
                    import_price: importPrice,
                    total: prd.quantity * importPrice
                }
            }else{
                return prd
            }

        })
        productItemsList = [...newProductItems]
        renderSelectProductHtml(newProductItems);
        renderSubtotal(productItemsList)

    }
    function onChangeSalePrice (ev, productId) {
         
        const salePrice = ev.target.value;

        const newProductItems = productItemsList.map(prd => {

            if(prd.productId === productId){
                return {
                    ...prd,
                    sell_price: salePrice,
                }
            }else{
                return prd
            }

        })
        productItemsList = [...newProductItems]
        renderSelectProductHtml(newProductItems);
    }

    function onDeleteProduct (productId) {

        const indexPrd = productItemsList.findIndex(prd => prd.productId === productId);
        
        const newProductList = [...productItemsList]
      
        newProductList.splice(indexPrd, 1)
        productItemsList = newProductList
        renderSelectProductHtml(newProductList);
        renderSubtotal(newProductList)
        
   
    }


    function onRenderSummary () {

        let isValid = true;
        productItemsList.forEach(item => {
            if(item.quantity === 0){
                alert(`Số lượng sản phẩm ${item.productName} tối thiểu > 0.`);
                isValid = false
                return;
            }
            if(item.import_price === 0){
                alert(`Giá tiền sản phẩm ${item.productName} nhập kho > 0`);
                isValid = false
                return;
            }
            if(item.sell_price === 0){
                alert(`Giá bán sản phẩm ${item.productName} nhập kho > 0`);
                isValid = false
                return;
            }
        })

        if(!isValid) return;

        const productSummary = document.getElementById('product-summary-table'); 
        const subtotal = document.getElementById('summary-total-amount'); 
        
        const total = productItemsList.reduce((acc, item) => acc + item.total, 0);
        subtotal.innerHTML = `Tổng tiền: ${total} VND`;
        
        const tableBody = productSummary.getElementsByTagName('tbody')[0];

        const summaryContainer = document.getElementById('product-summary');

        if(summaryContainer.classList.contains('hidden')){
            summaryContainer.classList.remove("hidden")
        }

        tableBody.innerHTML = "";
        productItemsList.forEach(item => {
       
            tableBody.insertRow().innerHTML = `
                    <td>#${item.productId}</td>
                    <td>${item.productName}</td>
                    <td>${item.productSize}</td>
                    <td>${item.quantity}</td>
                    <td>${item.import_price}</td>
                    <td><p>${item.total}</p></td>
                    <td>${item.sell_price}</td>
                `;
        })

    }

    function clearAllData () {
        const productSummary = document.getElementById('product-summary-table'); 
        const tableBody = productSummary.getElementsByTagName('tbody')[0];
        const subtotal = document.getElementById('summary-total-amount'); 
        const productTableContainer = document.getElementById('product-table-container');
        const tableBodyPrepare = productTableContainer.getElementsByTagName('tbody')[0];
        const summaryContainer = document.getElementById('product-summary');
        summaryContainer.classList.add("hidden")

        productItemsList = [];
        tableWrapper.classList.add('hidden')
        subtotalResult.innerHTML = "";
        subtotal.innerHTML = "";
        tableBody.innerHTML = "";
        tableBodyPrepare.innerHTML = "";
    }
    
    async function handleSubmitInvoice () {

        const response = await fetch('http://127.0.0.1:8000/api/product', {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            },
            body: JSON.stringify(productItemsList), 
        })
       

        const data = await response.json();

        if(response.ok){
            alert("Tạo thành công.")
            clearAllData();
        }

    }
    

    
</script>



@endsection