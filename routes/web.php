<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerOrderController;

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
    Route::post('/orders/detail/{id}', [OrderController::class, 'updateOrder'])->name('orders.update.detail');
        //Sửa trạng thái sang xác nhận
    // Route::get('/orders/edit/{id}', [OrderController::class, 'updateOrder'])->name('orders.update');
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

Route::get('/aboutMe', function () {
    return view('aboutMe');
});





Route::group(['middleware' => 'customer'], function () {


    Route::get('/user-info', [AuthController::class, "userInfo"])->name('user.info');
    Route::post('/logout', [AuthController::class, "logout"])->name('user.post.logout');
    Route::get('/order', [CustomerController::class, "getOrderList"])->name('user.orders');
    Route::get('/profile', [CustomerController::class, "getUserProfile"])->name('user.profile');
    Route::post('/profile', [CustomerController::class, "updateUserProfile"])->name('user.update.profile');

    Route::get('/checkout', [CustomerOrderController::class, 'showCheckout'])->name('user.checkout');
    Route::post('/checkout', [CustomerOrderController::class, 'makeOrder'])->name('user.makeOrder');

    Route::post('/customer-update-order', [CustomerOrderController::class, 'updateStatusOrder'])->name('user.order.updateStatus');

    Route::get('/checkout-done', [CustomerOrderController::class, 'confirmOrder'])->name('user.confirmOrder');


    Route::get('/cart', [CartController::class, "getCart"])->name('getCart');
    Route::post('/cart', [CartController::class, "addToCart"])->name('addToCart');
    Route::delete('/cart/{id}', [CartController::class, "deleteCart"])->name('deleteCart');
    Route::post('/clearCart', [CartController::class, "clearCart"])->name('clearCart');

});

Route::group(['middleware' => 'anonymous'], function () {


    Route::get('/login', [AuthController::class, "login"])->name('user.login');
    
    Route::post('/login', [AuthController::class, "makeLogin"])->name('user.post.login');
    
    Route::get('/sign-up', [AuthController::class, 'register'])->name('user.register');
    
    Route::post('/sign-up', [AuthController::class, "makeRegister"])->name('user.post.register');
    
});




