<?php

namespace App\Http\Middleware;

use App\Traits\Responser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    use Responser;


    public function handle($request, Closure $next)
    {
        if (Auth::guard('api')->user()->role == 1) {
            return $next($request);
        }

        return $this->responseFailed('You Are Not Allowed !'  , '');
    }
}
