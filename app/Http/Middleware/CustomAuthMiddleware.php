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
    protected function redirectTo(Request $request, $id): ?string
    {   
        

        if (($id == '1') && !Session::has('user_session')){
            return route('admin.login');
         }
        else {
            if (!Session::has('user_session'))
                return route('user.login');
            }
        

        return null;
    } // If user is authenticated, return null to continue the request
}
