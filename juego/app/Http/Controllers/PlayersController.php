<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roll;

class PlayersController extends Controller
{
    public function index()
    {
        //retorna el llistat de tots els jugadors del sistema
        $players = User::all();
        return response()->json($players, 200);
    }

    public function create(Request $request)
    {
        //crea un jugador
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
            //$token = auth()->user()->createToken('Personal Access Token')->accessToken;

            return response()->json(['user' => $user, 'message' => 'Registrado :D'], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        //modifica el nom d'un jugador
        
        $this->validate($request, [
            'name' => 'required|unique:users,name,{$this->user->id}',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return response()->json(['user' => $user, 'message' => 'nombre cambiado :D'], 200);
        
    }
    
    //Para usar desde GamesController, regresa array de puntuaciones
    public function playersResults()
    {
        $players = User::all();
        $players_array = array();

        foreach ($players as &$player) {
            $total_rolls = Roll::where('user_id', $player->id)->count();
            $winner_rolls = Roll::where('user_id', $player->id)->where('result_total', 7)->count();

            if ($total_rolls == 0) {
                $percentage = null;
            } else {
                $percentage = $winner_rolls * 100 / $total_rolls;
            }

            array_push($players_array, [
                "percentage" => $percentage,
                "name" => $player->name,
            ]);
        }

        return $players_array;
    }
}
