<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {   
        // dd($request->expectsJson());
    
        // return session('current_user') ? null : route('user.login');

        // if(Session::has('user_session')) {
        //     return $next($request);
        // }
        return Session::has('user_session') ? null : route('user.login');

        // return $request->expectsJson() ? null : route('user.login');
    }

}
