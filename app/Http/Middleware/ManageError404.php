<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\Handler;

class ManageError404 {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, Exception $exception) {
        
        App::error(function($exception, $code) {
            if ($code == 404) {
                return Response::view('error404', array(), 404);
            }
        });


        //Si no se encuentra la página:
        /* if($error404){
          return response()->view('error404', [], 404);
          } */
        return $next($request);
    }

}
