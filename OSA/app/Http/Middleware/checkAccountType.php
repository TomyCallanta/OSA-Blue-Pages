<?php

namespace App\Http\Middleware;

use Closure;

class checkAccountType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user() && $request->user()->account_type == $role){
            return $next($request);
        }

        return abort('404');
    }
}
