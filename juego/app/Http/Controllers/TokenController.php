<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class TokenController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email', 'password'), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'success' => 'false',
                'error' => $validator->errors()
            ], 422);
        }

        $token = JWTAuth::attempt($request->only('email', 'password')); //creando el Jason Web Token

        if($token){
            return response()->json([
                'success' => 'true',
                'token' => $token,
                'user' => Auth::user()
            ], 200);
        } else {
            return response()->json([
                'success' => 'false',
                'error' => 'Unauthorized'
            ], 401);
        }
    }

    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        try{
            $token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'token' => $token], status:200);
        } catch(TokenExpiredException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Need to login again (expired Token)'
            ], status:422);
        } catch(TokenBlacklistedException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Need to ligin again! (blacklisted)'
            ], status:422);
        }
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        try{
            JWTAuth::invalidate($token);
            return response()->json([
                'success' => true,
                'message' => 'Logout successful'
            ], status:200);
        } catch(JWTException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Failed logout, please try again!'
            ], status:422);
        }
    }
}
