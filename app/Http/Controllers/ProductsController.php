<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;

use App\Models\Product;


class ProductsController extends Controller
{
    public function home(){
        $product = new Product();
        $productList = $product->getAllProduct();
        return view('users.home',['productList'=>$productList]);

    }
}
