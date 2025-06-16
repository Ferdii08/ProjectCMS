<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return url('/custom-login'); // ganti sesuai URL login kamu
    }
}


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    }

