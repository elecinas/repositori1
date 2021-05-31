<?php

namespace App\Traits;

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roll;

trait PlayersArray {

    public function playersResults() {
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
                "id" => $player->id,
            ]);
        }

        return $players_array;
    }
}