<?php

namespace App\Http\Middleware;

use Closure;

class is_owner
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
        if(auth()->user()->user_type == 2){
            return $next($request);
        }
   
        return redirect()->back()->with('error',"You don't have Owner access.");

    }
}
