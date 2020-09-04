<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Authbooking
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
         
            if(!Auth::user()) {
                  Session::flash('Authbooking_status', '0');
              return redirect()->back();
            } 
        return $next($request);
    }
}
