<?php

namespace App\Http\Middleware;

use App\Traits\Responser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPremium
{
    use Responser;


    public function handle($request, Closure $next)
    {
        if (Auth::guard('api')->user()->premium == 1) {
            return $next($request);
        }

        return 'unauth';
    }

}
