<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roll;
use Tymon\JWTAuth\Facades\JWTAuth;

class PlayersController extends Controller
{
    public function index()
    {   //retorna el llistat de tots els jugadors del sistema
        $players = User::all();
        return response()->json($players, 200);
    }

    public function create(Request $request)
    {   //crea un jugador + token (JWT)
        //valida el request
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,{$this->user->id}',
            'name' => 'required|unique:users,name,{$this->user->id}',
            'password' => 'required|min:8'
        ]);
        //crea el registe a la taula users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //l'autentiquem
        $data = $request->only('email', 'password');
        if (auth()->attempt($data)) {
            $token = JWTAuth::attempt($data); //creando el Jason Web Token
            $id = auth()->user()->id;
            $user = User::find($id);

            return response()->json(['token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
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
