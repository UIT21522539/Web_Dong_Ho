<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Order;

use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function userList(){
        $user = new User();
        $user = $user->getAllUser();

        return view('admin.user.userlist', ['user' => $user]);
    }

    public function userDetail(Request $request, $id){

        $title = 'Thông tin chi tiết khách hàng';
            
            if(!empty($id)){
                $user = new User();
                $userDetail = $user->getUser($id);
                if(!empty($userDetail[0])){
                    $request->session()->put('id',$id);
                    $userDetail = $userDetail[0];

                    $order= new Order();
                    $orderList = $order->getOrderByIdUser($id);
                }else{
                    return redirect()->route('users.list')->with('msg','Người dùng không tồn tại');
                }
            }else{
                return redirect()->route('users.list')->with('msg','Người dùng không tồn tại');
            }
    
            return view('admin.user.userdetail',compact('title','userDetail','orderList'));
        }

        public function searchUser(Request $request){
            $searchKeyword = $request->input('search');

            $user = new User();
            $results = $user->searchUser($searchKeyword);

        return view('admin.user.usersearch', ['results' => $results, 'searchKeyword' => $searchKeyword]);
        }
}
