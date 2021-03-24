<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Response;

class UserController extends Controller
{
    public function index ()
    {
        return view('auth/login');
    }
    
    public function registro (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|max:20',
            'password' => 'required|max:20',
            'dos' => 'required|max:20'
        ]);
        if ($request->input('dos') != 2) {
                return response()->view('error404', array(), 404);
            
         };
        
        //Recogemos y almacenamos las cookies
        cookie()->forever('cookieNombre', $request->input('name'));
        cookie()->forever('cookieEmail', $request->input('email'));
        cookie()->forever('cookiePassword', $request->input('password'));
        //Las guardamos en la sesión
        session(['c_nombre' => $request->input('name')]);
        
        return view('auth/login');
    }
}
