<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SuperMiddleware
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
       if (auth()->check()) {
            if (auth()->user()->roll == 'SA') {
                return $next($request);
            }else{
                return redirect('redirect');
            }
        }else{
            return redirect('login');
        }
    }
}
