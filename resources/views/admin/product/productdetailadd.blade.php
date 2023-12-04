<link rel="stylesheet" href="{{ asset('assets/css/Admin/productdetailadd.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif
    <div class="add-product">

        <div class="show-product">
            @if ($errors->any())
            <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div>
            @endif
            <h1>{{ $title }}</h1>
            <div class="img-main">
                <img src="">
            </div>
            <div class="img-spt">
                <div>
                    <img src="">
                </div>
                <div>
                    <img src="">
                </div>
                <div>
                    <img src="">
                </div>
            </div>
        </div>

        <div class="input-product">
            <form action="{{ route('products.add') }}" method="POST" >
                {{-- Layer 01 --}}
                <div class="lay01">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label><br>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label">Branch</label><br>
                        <select name="id_brand" class="form-control" id="branch">
                            
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id_brand }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('id_brand')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label><br>
                        <select name="id_category" class="form-control" id="category">
                            
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('id_category')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label><br>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                        @error('description')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>

                {{-- Layer 02 --}}
                <div class="lay02">
                    <div class="mb-3">
                        <label for="" class="form-label">Sell Price</label><br>
                        <input type="text" name="sellprice" value="{{ old('sellprice') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                        @error('sellprice')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label><br>
                        <input type="text" name="pty_store" value="0" class="form-control" id="exampleInputTen" aria-describedby="emailHelp" readonly>
                        @error('pty_store')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Discount</label><br>
                        <input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="">
                        @error('discount')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IsDiscount</label>
                        <div class="form-check">
                            <input type="radio" name="isdiscount" value="1" id="isdiscount_yes" class="form-check-input" {{ old('isdiscount') == '1' ? 'checked' : '' }}>
                            <label for="isdiscount_yes" class="form-check-label">Yes</label>
                        </div>
                    
                        <div class="form-check">
                            <input type="radio" name="isdiscount" value="0" id="isdiscount_no" class="form-check-input" {{ old('isdiscount') == '0' ? 'checked' : '' }}>
                            <label for="isdiscount_no" class="form-check-label">No</label>
                        </div>
                  
                        @error('isdiscount')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
              
                {{-- Layer 03 --}}
                <div class="lay03">
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label><br>
                        <input type="text" name="status" value="Hết hàng" class="form-control" id="" readonly>
                        @error('status')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <select name="gender" class="form-control" id="gender">
                            <option value="Nam" {{ (old('gender') ) === 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ (old('gender') ) === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        </select>
                        @error('gender')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Layer 04 --}}
                <div class="lay04">
                    <div class="mb-3">
                        <label for="img_main" class="form-label">Image main</label><br>
                        <input type="text" name="img_main" value="{{ old('img_main')  }}" class="form-control" id="img_main">
                        @error('image')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="img1" class="form-label">Image 1</label><br>
                        <input type="text" name="img1" value="{{ old('img1')  }}" class="form-control" id="img1">
                        @error('image')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="img2" class="form-label">Image 2</label><br>
                        <input type="text" name="img2" value="{{ old('img2')  }}" class="form-control" id="img2">
                        @error('image')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="img3" class="form-label">Image 3</label><br>
                        <input type="text" name="img3" value="{{ old('img3')  }}" class="form-control" id="img3">
                        @error('image')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm</button>
                @csrf 
            </form>
        </div>
    </div>
@endsection