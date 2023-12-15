<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    //
    protected $user;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

 
    public function login() {

        return view('login');

    }

    public function register(Request $request) {


       return view('sign-up');

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

    public function logout(Request $request) {
        Session::flush();
        Auth::logout();

        return redirect(route("user.login"));
    }

    public function userInfo () {
        return view('user-info');
    }
}
