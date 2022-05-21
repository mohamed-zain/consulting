<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dispatcher
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
        if (auth()->check()) {
            if (in_array(auth()->user()->Level, [1,3])) {
                return $next($request);
            }else{
                return redirect('client_join');
            }
        }else{
            return redirect('login');
        }
    }
}
