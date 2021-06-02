<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roll;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class PlayersController extends Controller
{
    public function index()
    {   //retorna el llistat de tots els jugadors del sistema
        $players = User::all();
        return response()->json($players, 200);
    }

    public function create(Request $request)
    {   //crea un jugador + token (JWT)
        $validator = Validator::make($request->only('email', 'name', 'password'), [
            'email' => 'required|email|unique:users,email,{$this->user->id}',
            'name' => 'required|unique:users,name,{$this->user->id}',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => 'false',
                'error' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

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

    public function update(Request $request, $id)
    {   //modifica el nom d'un jugador
        $this->validate($request, [
            'name' => 'required|unique:users,name,{$this->user->id}',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return response()->json(['user' => $user, 'message' => 'nombre cambiado :D'], 200);
    }
}
