<link rel="stylesheet" href="{{ asset('assets/css/Admin/supplier/supplieradd.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/User/layouts/curnonlogo.svg') }}" />
<title>Supplier</title>
@extends('layouts.admin.sidebar')
@section('content')
@if (session('msg'))
<div class="alert alert-success"> {{ session('msg') }}</div>
@endif

<div class="supplier-header">  
    <div class="supplier-header-img">
        <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
    </div>
    <div class="supplier-header-content">
        @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
        @endif
        <h2>{{ $title }}</h2>
    </div>
</div>
<div class="supplier-choose">
    <div class="mb-3">
        <label for="product" class="form-label">Product Name</label>
        <select name="id_product" class="form-control" id="product">
            @foreach($products as $item)
                <option value="{{ $item->id_product }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('id_product')
            <span style="color: red">{{ $message }}</span>
        @enderror

        
        {{-- <select id="size" name="size">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
        </select> --}}
        <button onclick="addRow()">
            Thêm
        </button>

    </div>
</div>

<div class="supplier-body">
    <div class="supplier-body-content"> 
        <table  id="productTable">
            <thead>
                <tr class="table-header">
                    <th>Id</th>
                    <th>Product</th>
                    {{-- <th>Size</th> --}}
                    <th>Quantity</th>
                    <th>Import price</th>
                    <th>Total</th>
                    {{-- <th>Sell price</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
            
        </table>

        <p id="amount"> </p>
        <button class="create-invoice" onclick="createInvoice()">Tạo phiếu nhập</button>

        <div id="result" style="display:none;">
            <div class="input-table">
                <h3>Bảng đã nhập:</h3>
            </div>
            
            <table id="resultTable">
                <thead>
                    <tr class="table-header">
                        <th>Id</th>
                        <th>Product</th>
                        {{-- <th>Size</th> --}}
                        <th>Quantity</th>
                        <th>Import price</th>
                        <th>Total</th>
                        {{-- <th>Sell price</th> --}}
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <p id="resultAmount"> </p>
            <button class="approve" onclick="confirmInvoice()">Xác nhận</button>
        </div>
    </div>
</div>


<script>
    function addRow() {

        var productSelect = document.getElementById('product');
        // var sizeSelect = document.getElementById('size');

        // // Lấy giá trị Product và Size đã chọn
        var selectedProduct = productSelect.options[productSelect.selectedIndex].text;
        var selectedIdProduct = productSelect.options[productSelect.selectedIndex].value;
        // var selectedSize = sizeSelect.value;

        // // Kiểm tra xem cặp Product và Size đã tồn tại trong bảng hay chưa
        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        for (var i = 0; i < table.rows.length; i++) {
            var cells = table.rows[i].cells;
            var existingProduct = cells[1].innerHTML;

            if (existingProduct === selectedProduct ) {
                alert("Sản phẩm đã tồn tại trong phiếu nhập");
                return;
            }
        }

        // Nếu không có sự trùng lặp, thêm dòng mới vào bảng
        var newRow = table.insertRow(table.rows.length);
        newRow.className = "table-content";
        var cellId = newRow.insertCell(0);
        var cellProduct = newRow.insertCell(1);
        //var cellSize = newRow.insertCell(2);
        var cellQuantity = newRow.insertCell(2);
        var cellImportPrice = newRow.insertCell(3);
        var cellTotal = newRow.insertCell(4);
        // var cellSellPrice = newRow.insertCell(5);
        var cellDelete = newRow.insertCell(5);

        cellId.innerHTML = '#' + selectedIdProduct;
        cellProduct.innerHTML = selectedProduct;
        // cellSize.innerHTML = selectedSize;
        cellQuantity.innerHTML = '<input class="number-input" type="number" name="quantity[]" value="0" oninput="updateTotal(this)">';
        cellImportPrice.innerHTML = '<input class="number-input" type="text" name="import_price[]" value="0" oninput="updateTotal(this)" onkeypress="return isNumberKey(event)">';
        cellTotal.innerHTML = '<input class="number-input" type="text" name="total[]" value="0" readonly>';
        // cellSellPrice.innerHTML = '<input class="number-input" type="text" name="sell_price[]" value="0" oninput="validateNumberInput(this)" onkeypress="return isNumberKey(event)">';
        cellDelete.innerHTML = '<button onclick="deleteRow(this)">Xóa</button>';

    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function updateTotal(input) {
        var row = input.parentNode.parentNode; // Dòng chứa input
        var quantity = row.cells[2].getElementsByTagName('input')[0].value;
        var importPrice = row.cells[3].getElementsByTagName('input')[0].value;
        var total = quantity * importPrice;

        // Cập nhật giá trị của ô Total
        row.cells[4].getElementsByTagName('input')[0].value = total;

        // Cập nhật tổng giá trị ("Amount")
        updateAmount();
    }

    function updateAmount() {
        var table = document.getElementById('productTable');
        var rows = table.rows;

        var totalAmount = 0;

        // Tính tổng giá trị từ các ô Total
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].cells;
            var total = parseFloat(cells[4].getElementsByTagName('input')[0].value);
            totalAmount += isNaN(total) ? 0 : total;
        }

        // Cập nhật giá trị của ô "Amount"
        document.getElementById('amount').innerHTML = 'Amount: ' + totalAmount.toFixed(0) +' VNĐ';
    }

    function deleteRow(button) {
        var row = button.parentNode.parentNode; // Dòng chứa nút xóa
        row.parentNode.removeChild(row);

        // Cập nhật lại tổng giá trị ("Amount")
        updateAmount();
    }

    function validateNumberInput(input) {
        // Loại bỏ các ký tự không phải số từ giá trị của input
        input.value = input.value.replace(/[^0-9.]/g, '');

        // Kiểm tra xem giá trị mới có phải là số không
        if (isNaN(input.value)) {
            alert("Please enter a valid number.");
            input.value = 0;
        }
    }

    function createInvoice() {
        var table = document.getElementById('productTable');
        var rows = table.rows;

        var invoiceData = [];

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].cells;
            var rowData = {
                id: cells[0].innerHTML,
                product: cells[1].innerHTML,
                // size: cells[2].innerHTML,
                quantity: cells[2].getElementsByTagName('input')[0].value,
                import_price: cells[3].getElementsByTagName('input')[0].value,
                total: cells[4].getElementsByTagName('input')[0].value,
                // sell_price: cells[5].getElementsByTagName('input')[0].value,
            };
            invoiceData.push(rowData);
        }

        // Hiển thị bảng đã nhập
        showResultTable(invoiceData);
    }

    function showResultTable(invoiceData) {
        var resultTable = document.getElementById('resultTable').getElementsByTagName('tbody')[0];
        var resultAmount = 0;

        // Xóa dữ liệu cũ trong bảng kết quả
        while (resultTable.rows.length > 0) {
            resultTable.deleteRow(0);
        }

        // Thêm dữ liệu mới từ invoiceData vào bảng kết quả
        for (var i = 0; i < invoiceData.length; i++) {
            var newRow = resultTable.insertRow(resultTable.rows.length);
            newRow.className = "table-content";
            var cellId = newRow.insertCell(0);
            var cellProduct = newRow.insertCell(1);
            // var cellSize = newRow.insertCell(2);
            var cellQuantity = newRow.insertCell(2);
            var cellImportPrice = newRow.insertCell(3);
            var cellTotal = newRow.insertCell(4);
            // var cellSellPrice = newRow.insertCell(5);

            cellId.innerHTML = invoiceData[i].id;
            cellProduct.innerHTML = invoiceData[i].product;
            // cellSize.innerHTML = invoiceData[i].size;
            cellQuantity.innerHTML = invoiceData[i].quantity;
            cellImportPrice.innerHTML = invoiceData[i].import_price;
            cellTotal.innerHTML = invoiceData[i].total;
            // cellSellPrice.innerHTML = invoiceData[i].sell_price;

            resultAmount += parseFloat(invoiceData[i].total);
        }

        // Cập nhật tổng giá trị ("Amount") trên bảng kết quả
        document.getElementById('resultAmount').innerHTML = 'Amount: ' + resultAmount.toFixed(0) +' VNĐ';

        // Hiển thị bảng kết quả và nút xác nhận
        document.getElementById('result').style.display = 'block';
    }

    function confirmInvoice() {
        var table = document.getElementById("resultTable");
        var tbody = table.getElementsByTagName("tbody")[0];
        var rows = tbody.getElementsByTagName("tr");
        var data = [];

        for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName("td");
        var rowData = {
            id: cells[0].innerText,
            product: cells[1].innerText,
            // size: cells[2].innerText,
            quantity: cells[2].innerText,
            importPrice: cells[3].innerText,
            total: cells[4].innerText,
            // sellPrice: cells[5].innerText
        };
        data.push(rowData);
        }

        // Chuyển đổi dữ liệu thành chuỗi JSON
        var jsonData = JSON.stringify(data);

        // Xây dựng URL với dữ liệu đã mã hóa
        var url = "{{ route('suppliers.add')}}?data=" + encodeURIComponent(jsonData);

        // Chuyển hướng đến URL mới
        window.location.href = url;
    }
    
</script>



@endsection