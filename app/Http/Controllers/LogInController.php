<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    //
    public function login(Request $request) {
        $user = User::where('id_user', 1)->first();

        Auth::login($user);
        return redirect('home');
    }
}
