<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Order;
use App\Models\CT_Order;
use App\Models\User;
use App\Models\Product;
use DB;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function makeLogin(LoginRequest $request) {


        $credentials = $request->only("email", "password");
  
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            //$request->session()->regenerate();
            Session::put('user_session', Auth::user());

            //dd(Auth::user());
             return redirect()->intended(route('user.info'))->with('login_success', "Đăng nhập thành công");
        }

        return redirect(route("user.login"))->with('login_error', "Tên tài khoản hoặc mật khẩu không đúng.");
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
    public function makeRegister (RegisterRequest $request) {

        $data['first_name'] = $request->firstname;
        $data['last_name'] = $request->lastname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        // $emailExists = User::where('email');
        $user = User::create($data);
        if(!$user){
            return redirect(route('user.register'))->with("error", "Registration fail.");
        }

        return redirect(route("user.login"))->with('create_success', "Tạo tài khoản thành công, vui lòng thực hiện đăng nhập");

    }
    public function userInfo () {
        $user = auth()->user();
        $order= new Order();
        $orderList = $order->getOrderByIdUserProduct($user->id_user);
        return view('user-info', compact('user','orderList'));
    }
    public function addUser(Request $request){
        // Nhận dữ liệu từ request
        $id_user = $request->id;
        $data = [
            'id_user' => $request->id,
            'email' => $request->email,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'location' => $request->location,
        ];
        
        $user= new User();
        $user->updateUser($data);
        $result = $user-> getUser($id_user);

        return back();
    }
    
}
