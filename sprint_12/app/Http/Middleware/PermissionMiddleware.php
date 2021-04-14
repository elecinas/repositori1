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
    public function handle($request, Closure $next, $permission)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        
        if(!Auth::user()->hasPermissionTo('editar_partidos')){
            return redirect('/');
        }
        
        /*if(!$request->user()->can($permission)){
            abort(403);
        }*/
        
        if(Auth::user()->hasPermissionTo('editar_partidos')){
            return $next($request);
        }
        
        return $next($request);
    }
}
