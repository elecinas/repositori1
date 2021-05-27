<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roll;

class GamesController extends Controller
{   
    public function index($id)
    {
        //retorna el llistat de jugades per un jugador
        $rolls = Roll::where('user_id', $id)->get();
        return response()->json($rolls, 200);
    }

    public function create(Request $request, $id)
    {
        //un jugador fa una tirada (crea un registre a rolls)
        $roll = Roll::create([
            'result_dice_1' => $request->result_dice_1,
            'result_dice_2' => $request->result_dice_2,
            'result_total' => $request->result_total,
            'user_id' => $id
        ]);

        return response()->json($roll, 200);
    }

    public function destroy($id)
    {
        //elimina totes les tirades d'un jugador (tots els seus registres a rolls)
        $rolls = Roll::where('user_id', $id)->get();
        Roll::where('user_id', $id)->delete();

        return response()->json($rolls, 200);
    }

    public function ranking()
    {
        // retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
        /***STARTS**** */
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
        /***ENDS**** */
        //$players_array = Playerscontroller::playersResults();

        //esto debe ordenar descendentemente por resultados
        /*
        foreach ($players_array as $llave => $fila) {
            $percentage[$llave]  = $fila['percentage'];
        }
        array_multisort($percentage, SORT_DESC, $players_array);
        */

        return response()->json($players_array, 200);
    }

    public function loser()
    {
        //mostra el pitjor jugador
        /***STARTS**** */
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
        /***ENDS**** */
        //$players_array = Playerscontroller::playersResults();
        $val_min = 0;
        foreach ($players_array as &$player) {
            if($player['percentage'] <= $val_min){
                $val_min = $player['percentage'];
                $loser = $player['name'];
            }
        }

        //@TODO (habría que añadir la id de jugador para devolver una instancia de USER D:)

    }

    public function winner()
    {
        //mostra el millor jugador
    }
}
