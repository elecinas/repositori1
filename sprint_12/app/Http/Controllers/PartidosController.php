<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuentro;
use App\Models\Score;
use App\Models\Stadium;
use App\Models\Team;

class PartidosController extends Controller
{
    public function home() {
        return view('home');//crear view: home.blade.php
    }
    
    public function calendar_list(){
        $encuentros = Encuentro::all();
        return view('encuentros')
            ->with('encuentros', $encuentros);//crear view: home.encuentros.php
    }
    
    public function classification_list(){
       // return view('home');//crear view: home.blade.php
    }
    
    public function teams_list(){
        $teams = Team::all();
        return view('teams')
            ->with('teams', $teams);//crear view: teams.blade.php
    }
}
