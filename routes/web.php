<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ThanhToanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Đường dẫn trang home


//Đường dẫn vào admin
Route::prefix('admin')->group(function () {
    //Vào trang chủ->Xong
    Route::get('/', [DashBoardController::class, 'view'])->name('dashboard');

    //Quản lí danh sách đơn hàng->Xong
    Route::get('/orders', [OrderController::class, 'orderList'])->name('orders.list');
        //Thông tin chi tiết đơn hàng
    Route::get('/orders/detail/{id}', [OrderController::class, 'orderDetail'])->name('orders.detail');
        //Sửa trạng thái sang xác nhận
    Route::get('/orders/edit/{id}', [OrderController::class, 'updateOrder'])->name('orders.update');
        //Sửa trạng thái sang đã hủy
    Route::get('/orders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('orders.delete');
    
    //Quản lí danh sách sản phẩm->Chưa xử lí hình ảnh và phần sửa đổi chi tiết
        //Xem ds
    Route::get('/products', [ProductController::class, 'productList'])->name('products.list');
        //Xem chi tiết sản phẩm
    Route::get('/products/detail/{id}', [ProductController::class, 'productDetail'])->name('products.detail');
        //Trang hiện thị thêm sản phẩm
    Route::get('/products/add', [ProductController::class, 'productDetailAdd'])->name('products.detailadd');
        //Post thêm
    Route::post('/products/add', [ProductController::class, 'addProduct'])->name('products.add');
        //Trang hiện thị sửa
    Route::get('/products/edit/{id}', [ProductController::class, 'getProduct'])->name('products.get');
        //post update
    Route::post('/products/update', [ProductController::class, 'updateProduct'])->name('products.update');
        //delete xóa sản phẩm
    Route::get('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');
        //Tìm kiếm theo tên
    Route::get('/products/search', [ProductController::class, 'searchProduct'])->name('products.search');
    
    //Quản lí danh sách khách hàng -> Chưa có chặn khách hàng
        //Xem ds
    Route::get('/users', [UserController::class, 'userList'])->name('users.list');
        //Xem chi tiết khách hàng
    Route::get('/users/detail/{id}', [UserController::class, 'userDetail'])->name('users.detail');
        //Tìm kiếm theo tên
    Route::get('/users/search', [UserController::class, 'searchUser'])->name('users.search');

    //Quản lí trang danh sách nhập kho
        //Xem ds nhập kho
    Route::get('/suppliers', [SupplierController::class, 'supplierList'])->name('suppliers.list');
        //Xem chi tiết nhập kho
    Route::get('/suppliers/detail/{id}', [SupplierController::class, 'supplierDetail'])->name('suppliers.detail');
        //Màn hình thêm phiếu nhập kho
    Route::get('/suppliers/add', [SupplierController::class, 'supplierDetailAdd'])->name('suppliers.detailadd');    
        //Thêm
    Route::get('/suppliers/adddetail', [SupplierController::class, 'addSupplier'])->name('suppliers.add');
        
    //Quản lí danh sách brand
    Route::get('/brands', [BrandController::class, 'brandList'])->name('brands.list');
        //Tìm kiếm theo tên
    Route::get('/brands/search', [BrandController::class, 'searchBrand'])->name('brands.search');
        //Hiện trang thêm brand
    Route::get('/brands/add', [BrandController::class, 'addDetailBrand'])->name('brands.detailadd');
        //post update brand
    Route::post('/brands/add', [BrandController::class, 'addBrand'])->name('brands.add');
});


Route::get('/home', [ProductController::class, 'combinedHome'])->name('/users/home');

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/product', function () {
    return view('/users/product');
});
Route::get('/detailproduct', function () {
    return view('/detailproduct');
});
Route::get('/carts', [CartController::class, 'getProduct']);
// Theem gior hangf
Route::post('/carts', [CartController::class, 'addProduct'])->middleware('auth');
// login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/aboutMe', function () {
    return view('aboutMe');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/checkout-done', function () {
    return view('checkout-done');
});

Route::get('/user-info', function () {
    return view('user-info');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/sign-up', function () {
    return view('sign-up');
});

Route::post('/thanhtoan', [ThanhToanController::class, 'paymentProcessing']);

require __DIR__.'/auth.php';