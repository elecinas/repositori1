<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roll;
use App\Traits\PlayersArray;//return percentages players

class GamesController extends Controller
{
    use PlayersArray;//return percentages players

    public function index($id)
    {   //retorna el llistat de jugades per un jugador
        $rolls = Roll::where('user_id', $id)->get();

        return response()->json($rolls, 200);
    }

    public function create(Request $request, $id)
    {   //un jugador fa una tirada (crea un registre a rolls)
        $roll = Roll::create([
            'result_dice_1' => $request->result_dice_1,
            'result_dice_2' => $request->result_dice_2,
            'result_total' => $request->result_total,
            'user_id' => $id
        ]);

        return response()->json($roll, 200);
    }

    public function destroy($id)
    {   //elimina totes les tirades d'un jugador (tots els seus registres a rolls)
        $rolls = Roll::where('user_id', $id)->get();
        Roll::where('user_id', $id)->delete();

        return response()->json($rolls, 200);
    }

    public function ranking()
    {   // retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
        $players_array = $this->playersResults();//trait PlayersArray.php

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
    {  //mostra el pitjor jugador
        $players_array = $this->playersResults();//trait PlayersArray.php

        //Establecemos el porcentaje en 100% y recorremos los jugadores buscando el peor
        $val_min = 100;
        foreach ($players_array as &$player) {
            if (!is_null($player['percentage']) && $player['percentage'] <= $val_min) {
                $val_min = $player['percentage'];
                $loser_id = $player['id'];
            }
        }

        $loser = User::find($loser_id);

        return response()->json($loser, 200);
    }

    public function winner()
    {   //mostra el millor jugador
        $players_array = $this->playersResults();//trait PlayersArray.php

        //Establecemos el porcentaje en 0% y recorremos los jugadores buscando el mejor
        $val_min = 0;
        foreach ($players_array as &$player) {
            if (!is_null($player['percentage']) && $player['percentage'] >= $val_min) {
                $val_min = $player['percentage'];
                $loser_id = $player['id'];
            }
        }

        $winner = User::find($loser_id);

        return response()->json($winner, 200);
    }
}
