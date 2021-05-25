<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PlayersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(){
        //retorna el llistat de jugades per un jugador
    }

    public function create(){
        //un jugador fa una tirada (crea un registre a rolls)
    }

    public function destroy(){
        //elimina totes les tirades d'un jugador (tots els seus registres a rolls)
    }

    public function ranking(){
        // retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
    }

    public function loser(){
        //mostra el pitjor jugador
    }

    public function winner(){
        //mostra el millor jugador
    }
}
