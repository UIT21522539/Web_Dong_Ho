<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;



class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $data = [
            $request->account,
            $request->password];
        $accountModel = new Account();
        
        if ($accountModel->checkCredentials($data)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }

        return redirect()->route('login.form')->withErrors('Login failed. Check your account and password.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
