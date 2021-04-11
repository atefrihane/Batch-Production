<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepTwoMiddleware
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
 
        if (Auth::user()->role->name == 'superadmin' or Auth::user()->role->name == 'second step') {
            return $next($request);
        }
       
        return response()->view('showNotAuthorized');
    }
}
