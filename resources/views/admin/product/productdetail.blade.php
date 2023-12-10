<link rel="stylesheet" href="{{ asset('assets/css/Admin/product/productdetail.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    
    <div class="product-header">
        @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
        @endif
        <div class="product-header-img">
            <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
        </div>
        <div class="product-header-content">
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="body-content">
        <form action="{{ route('products.update') }}" method="POST">
            {{-- hiện ảnh --}}
            <div class="img-content">
                {{-- img main --}}
                <div class="img-main">
                    <div class="mb-3">
                        <img src="{{ $productDetail->img_main }}" alt="Product Image Main" >
                        @error('img')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="img-secondary">
                    <div class="img-secondary-grid">
                        <div class="mb-3">
                            <img src="{{ $productDetail->img_main }}" alt="Product Image Main"  width="220px" height="220px">
                            @error('img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <img src="{{ $productDetail->img1 }}" alt="Product Image 1" width="220px" height="220px">
                            @error('img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="img-secondary-grid">
                        <div class="mb-3">
                            <img src="{{ $productDetail->img2 }}" alt="Product Image 2" width="220px" height="220px">
                            @error('img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <img src="{{ $productDetail->img3 }}" alt="Product Image 3" width="220px" height="220px">
                            @error('img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- Hiện thông tin --}}
            <div class="product-description">
                <div class="product-description-bg">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? $productDetail->name }}" class="form-control" id="name" aria-describedby="emailHelp" readonly>
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" value="{{ old('description') ?? $productDetail->description }}" class="form-control" id="description" aria-describedby="emailHelp" readonly>
                        @error('description')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label">Branch</label>
                        <input type="text" value="{{ $brandDetail->name }}" class="form-control" readonly>
                        @error('id_brand')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" value="{{ $categoryDetail->name }}" class="form-control" readonly>
                        @error('id_category')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="sellprice" class="form-label">Sell Price</label>
                        <input type="text" name="sellprice" value="{{ old('sellprice') ?? $productDetail->sellprice }}" class="form-control" id="sellprice" aria-describedby="emailHelp" readonly>
                        @error('sellprice')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pty_store" class="form-label">Quantity</label>
                        <input type="text" name="pty_store" value="{{ old('pty_store') ?? $productDetail->qty_store }}" class="form-control" id="pty_store" aria-describedby="emailHelp" readonly>
                        @error('pty_store')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" name="discount" value="{{ old('discount') ?? $productDetail->discount }}" class="form-control" id="discount" readonly>
                        @error('discount')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IsDiscount</label>
                        <input type="text" value="{{ $productDetail->isdiscount == '1' ? 'Yes' : 'No' }}" class="form-control" readonly>
                        @error('isdiscount')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" value="{{ old('status') ?? $productDetail->status }}" class="form-control" id="status" readonly>
                        @error('status')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" name="gender" value="{{ old('gender') ?? $productDetail->gender }}" class="form-control" id="gender" readonly>
                        @error('status')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
     
                    <table border="1">
                        <tr>
                            <th>Size</th>
                            <th>Quantity</th>
                        </tr>
                            @foreach ($ct_productList as $item)
                            <tr>                  
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->qty_store}}</td>    
                            </tr>
                            @endforeach 
                    </table>
                </div>
            </div>
            @csrf 
        </form>
    </div>
@endsection
