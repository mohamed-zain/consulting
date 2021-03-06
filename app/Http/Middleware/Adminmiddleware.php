<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Adminmiddleware
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
            if (auth()->user()->roll == 'CO') {
                return $next($request);
            }else{
                return redirect('redirect');
            }
        }else{
            return redirect('login');
        }
        
    }
}
