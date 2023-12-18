<link rel="stylesheet" href="{{ asset('assets/css/Admin/productdetailadd.css')}}">
@extends('layouts.admin.sidebar')
@section('content')
    @if (session('msg'))
    <div class="alert alert-success"> {{ session('msg') }}</div>
    @endif
    <div class="add-product">
        <div class="product-header">
            {{-- @if ($errors->any())
             <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div> 
            @endif --}}
            <div class="product-header-img">
                <img width="38px"src="{{ asset('assets/img/Admin/product/tag.png')}}">
            </div>
            <div class="product-header-content">
                <h2>{{ $title }}</h2>
                <div style="display: flex; margin-bottom: 8%">
                    <a href="#">Home</a>
                    <a href="#">/</a>
                    <a href="#">Product</a>
                </div>
                
            </div>
        </div>
        <div class="product-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            {{-- <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ</div> --}}
            @endif
            <div class="input-product">
              
                <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Name</label>
                      <div class="input">
                            <input placeholder="Type here" type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                            @error('name')
                            <p style="color: red">{{ $message }}</p>
                            @enderror
                      </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="branch" class="form-label">Branch</label>
                        <div class="select">
                            <select name="id_brand" class="form-control" id="branch">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id_brand }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('id_brand')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="category" class="form-label">Category</label>
                      <div class="select">
                        <select name="id_category" class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('id_category')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Description</label>
                        <div class="input">
                            <input placeholder="Type here" type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                            @error('description')
                            <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Size</label>
                       

                        <div class="input">
                            <div style="display: flex">
                                <div class="form-check">
                                    <input type="radio" name="size" value="S" id="size_s" class="form-check-input" {{ old('size') == 'S' ? 'checked' : '' }}>
                                    <label for="size_s" class="form-check-label">S</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="size" value="M" id="size_m" class="form-check-input" {{ old('size') == 'M' ? 'checked' : '' }}>
                                    <label for="size_m" class="form-check-label">M</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="size" value="L" id="size_l" class="form-check-input" {{ old('size') == 'L' ? 'checked' : '' }}>
                                    <label for="size_l" class="form-check-label">L</label>
                                </div>
                            </div>
                            @error('description')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Sell Price</label>
                        <div class="input">
                            <input placeholder="Type here" type="text" name="sellprice" value="{{ old('sellprice') }}" class="form-control" id="exampleInputTen" aria-describedby="emailHelp">
                            @error('sellprice')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Quantity</label>
                        <div class="input">
                            <input placeholder="Type here" type="text" name="pty_store" value="0" class="form-control" id="exampleInputTen" aria-describedby="emailHelp" readonly>
                            @error('pty_store')
                                 <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Discount</label>
                        <div class="input">
                            <input placeholder="Type here" type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="">
                            @error('discount')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label class="form-label">IsDiscount</label>
                        <div class="checkbox">
                            <div style="display: flex">
                                <div class="form-check">
                                    <input type="radio" name="isdiscount" value="1" id="isdiscount_yes" class="form-check-input" {{ old('isdiscount') == '1' ? 'checked' : '' }}>
                                    <label for="isdiscount_yes" class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="isdiscount" value="0" id="isdiscount_no" class="form-check-input" {{ old('isdiscount') == '0' ? 'checked' : '' }}>
                                    <label for="isdiscount_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            @error('isdiscount')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 form-control">
                        <label for="" class="form-label">Status</label>
                        {{-- <input placeholder="Type here" type="text" name="status" value="1" class="form-control" id="" readonly> --}}
                        <div class="checkbox">
                            <div class="status-checks" style="display: flex">
                                <div class="form-check">
                                    <input id="instock" type="radio" {{ (old('status') ) === '1' ? 'checked' : '' }} name="status" value="1" />
                                    <label for="instock">Còn hàng</label>
                                </div>
                                <div class="form-check">
                                    <input id="outofstock" type="radio" {{ (old('status') ) === '0' ? 'checked' : '' }}  name="status" value="0" />
                                    <label for="outofstock">Hết hàng</label>
                                </div>
                            </div>
                            @error('status')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="select">
                            <select name="gender" class="form-control" id="gender">
                                <option value="Nam" {{ (old('gender') ) === 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ (old('gender') ) === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('gender')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
{{-- 
                    <div class="mb-3 form-control">
                        <label for="img_main" class="form-label">Image main</label>
                        <input placeholder="Type here" type="text" name="img_main" value="{{ old('img_main')  }}" class="form-control" id="img_main">
                        @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img1" class="form-label">Image 1</label>
                        <input placeholder="Type here" type="text" name="img1" value="{{ old('img1')  }}" class="form-control" id="img1">
                        @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img2" class="form-label">Image 2</label>
                        <input placeholder="Type here" type="text" name="img2" value="{{ old('img2')  }}" class="form-control" id="img2">
                        @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img3" class="form-label">Image 3</label>
                        <input placeholder="Type here" type="text" name="img3" value="{{ old('img3')  }}" class="form-control" id="img3">
                        @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="mb-3 form-control">
                        <label for="img_main" class="form-label">Image main</label>
                        <div>
                            <input placeholder="Type here" type="file" name="img_main" value="{{ old('img_main')  }}" class="form-control" id="img_main">
                                @error('img_main')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img1" class="form-label">Image 1</label>
                        <div class="input">
                            <input placeholder="Type here" type="file" name="img1" value="{{ old('img1')  }}" class="form-control" id="img1">
                            @error('img1')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img2" class="form-label">Image 2</label>
                        <div class="input">
                            <input placeholder="Type here" type="file" name="img2" value="{{ old('img2')  }}" class="form-control" id="img2">
                            @error('img2')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <div class="mb-3 form-control">
                        <label for="img3" class="form-label">Image 3</label>
                        <div class="input">
                            <input placeholder="Type here" type="file" name="img3" value="{{ old('img3')  }}" class="form-control" id="img3">
                            @error('img3')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    <div class="buttons">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                    @csrf 
                </form>
            </div>
        </div>
    </div>
@endsection