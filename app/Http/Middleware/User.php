<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            if(Auth::guard('user')->user())
            {
                return $next($request);
            }
            else{
                return redirect()->route('login.form');
            }

        }else{
            return redirect()->route('login.form');
        }
    }
}
