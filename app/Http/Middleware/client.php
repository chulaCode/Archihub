<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class client
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
        if(Auth::check()&&Auth::user()->user_type=='client')
           return $next($request);
        else
           return redirect('/');
    }
}
