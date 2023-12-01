<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductsController;
use app\Http\Requests\ProductRequest;

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
Route::get('/', [ProductsController::class,'home']);
Route::get('/home', [ProductsController::class,'home'])->name('product.home');

// Đường dẫn trang danh sách sản phẩm
Route::get('/product', function () {
    return view('product');
});



