<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CTOrder;
use App\Models\Carts;

class CT_ThanhToanController extends Controller
{
    //
    
    public function paymentProcessed(Request $request){
        $user = auth()->user();
        foreach($user->cartProducts as $product) {
            Carts::where('id_product', $product->id_product)->delete();
        }
        
        return redirect('/home');
    }

}
