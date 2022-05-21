<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportDepartment
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
            if (in_array(auth()->user()->Level,[1,3])) {
                $access = DB::table('user_groups')
                    ->where('UID',auth()->user()->id)
                    ->where('Sys','SupportDepartment')
                    ->first();
                //$arr = $access->toArray();
                //dd($access);
                if ($access->accessH == 1){
                    return $next($request);
                }else{
                    session()->flash('Flash', 'ليس لديك صلاحية');
                    return redirect('Dispatcher');
                }
            }else{
                return redirect('redirect');
            }
        }else{
            return redirect('login');
        }
    }
}
