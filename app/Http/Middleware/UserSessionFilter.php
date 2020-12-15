<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class UserSessionFilter
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
        
        if(!Session::has('id'))
        {
            return redirect("/login?return=true");
        }
        return $next($request);
    }
}
