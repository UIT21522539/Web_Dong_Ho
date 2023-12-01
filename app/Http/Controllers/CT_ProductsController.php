<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CT_ProductsController extends Controller
{
    //
    public function addCtSupplier($item){
        DB::insert('INSERT INTO product (id_ir, id_product, pty, import_price,item_total) VALUES (?, ?, ?, ?, ?)', $item);
    }
}
