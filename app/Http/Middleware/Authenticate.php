<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    { 
        if (! $request->expectsJson()) {
            if (strpos($request->getPathInfo(), 'admin')) {
                return route('admin.auth.login');
            }else{
                return route('home');
            }
        }
    }
}
/* if (! $request->expectsJson()) {
             dd($request->getPathInfo());
             if (strpos($request->getPathInfo(), 'admin')) {
                return route('admin.login');
        }
            }
          dd($request->getRequestUri());//  return route('login');
        }*/