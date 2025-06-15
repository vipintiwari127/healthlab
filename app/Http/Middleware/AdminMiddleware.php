<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('admin_id')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

