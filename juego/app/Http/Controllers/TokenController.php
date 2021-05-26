<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenController extends Controller
{
    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            $token = JWTAuth::attempt($data);//creando el Jason Web Token
            $id = auth()->user()->id;
            $user = User::find($id);
            
            return response()->json(['token' => $token, 'user' => $user], 200);
            //return redirect()->route('home', ['user' => $user]);

        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        //nuevoo
        $token = JWTAuth::attempt($data);//creando el Jason Web Token
        
    }

    public function refreshToken(){

    }

    public function expireToken(){

    }
}
