<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class EmpMiddleware
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
       if (Auth::check()) {
            if (in_array(auth()->user()->Level,[1,3])) {
                return $next($request);
            }elseif(auth()->user()->Level == 2){
                return redirect('ClientEnd');
            }elseif(auth()->user()->Level == 1){
                return redirect('MainPort');
            }else{
                return redirect('redirect');
            }
        }else{
            return redirect('login');
        }
    }
}
