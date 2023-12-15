<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Order;

class CustomerController extends Controller
{
    
    public function __construct() {
       if( Session::has('user_session')){

        return redirect(route('user.login'));
       }
       
    }



    public function getOrderList () {

        // $user = session('user_session');

       $userId = session('user_session')->id_user;

        $orders = Order::where('id_user', $userId )->get();

        // dd($orders);
        return view('user-order', ['orders' =>  $orders]);
    }


    public function getUserProfile () {

        $user = session('user_session');

        return view('user-profile', ['orders' => $user]);
    }

    public function updateUserProfile (Request $request) {

        $userId = session('user_session')->id_user;
        
        $user = User::where( 'id_user', $userId )->firstOrFail();

     
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->save();

        //update session
        Session::put('user_session', $user);

        // redirect
        //  Session::flash('message', 'Successfully updated shark!');

         return redirect(route('user.profile'))->with("update_success", "Cập nhật thành công.");

    }

    // public function getOrderList () {

    //     $user = session('user_session');

    //     return view('user-order', ['orders' => $user]);
    // }
}
