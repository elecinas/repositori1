<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;

class Gestor404
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
        try {
            if ($request->input('dos') != 2) {
                throw new Exception("El valor introducido no es 2.");
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            return response()->view('error404', array(), 404);
        }
        
        return $next($request);
    }
}
