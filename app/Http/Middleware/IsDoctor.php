<?php

namespace App\Http\Middleware;

use App\Traits\Responser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDoctor
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('api')->user()->role == 2) {
            return $next($request);
        }

        return 'unauth';
    }


}
