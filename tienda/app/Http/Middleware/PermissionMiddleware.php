<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
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
        if(Auth::guest()){
            return redirect('/home2');
            //return view('fake_home');
        }
        //dd(Auth::user());
        if(!Auth::user()->hasPermissionTo('vista_no_fake')){
            return redirect('/home2');
            //return view('fake_home');
        }
        
        
        return $next($request);
    }
}
