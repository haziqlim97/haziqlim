<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CanUseCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (auth()->user()) {
            return $next($request);
        }
        Session::flash('warning', Sprintf('Please login to use cart or make payment'));
        return redirect()->route('login');
    }
}
