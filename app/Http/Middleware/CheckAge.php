<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        $user_age = 19;
        if( $user_age >= 18  ){
            return $next($request);
        }else{
            return redirect('/dang-ky-vip');
        }
        
    }
    /*
    public function handle(Request $request, Closure $next)
    {
        if( $request->age >= 18  ){
            return $next($request);
        }else{
            return redirect('/dang-ky-vip');
        }
        
    }
    */
}
