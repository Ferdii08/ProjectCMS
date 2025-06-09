<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return route('login'); // atau bisa diganti dengan url('/custom-login')
    }
}

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    }

