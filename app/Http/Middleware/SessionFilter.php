<?php

namespace App\Http\Middleware;
use Session;

use Closure;

class SessionFilter
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
        if(!Session::has('id') || !Session::has('userType') || Session::get('userType') != "ADMIN")
        {
             return redirect("/loginer");
        }
        
        return $next($request);
    }
}
