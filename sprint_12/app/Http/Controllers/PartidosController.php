<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuentro;
use App\Models\Score;
use App\Models\Stadium;
use App\Models\Team;

class PartidosController extends Controller {

    public function home() {
        return view('home'); //crear view: home.blade.php
    }

    public function calendar_list() {
        $encuentros = Encuentro::all(); //elloquent collection, contiene elloquent models
        return view('encuentros/encuentros')
                        ->with('encuentros', $encuentros);
    }

    public function classification_list() {
        return view('classification'); //crear view: classification.blade.php
    }

    /* CONTROLADORES DE EQUIPO */

    public function teams_list() {
        $teams = Team::all();
        return view('teams/teams')
                        ->with('teams', $teams); //crear view: teams.blade.php
    }

    public function create_team() {
        $stadiums = Stadium::all();
        return view('teams/create')
                        ->with('stadiums', $stadiums);
    }

    public function store_team(Request $request) {

        $request->validate([
            'name' => 'required|max:50',
            'stadium' => 'required|max:50', //hacerlo nullable
            'foundation_year' => 'required|max:4'
        ]);

        $stadium = new Stadium();
        $stadium->name = $request->stadium;
        $stadium->save();

        $team = new Team();
        $team->name = $request->name;
        $team->stadium_id = $stadium->id;
        $team->foundation_year = $request->foundation_year;
        $team->save();

        return redirect()->route('teams.list');
    }

    public function edit_team($id) {
        $team = Team::find($id);
        $stadium = Stadium::find($team->stadium_id);
        return view('teams/edit')
                        ->with('team', $team)
                        ->with('stadium', $stadium);
    }

    public function update_team(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:50',
            'stadium' => 'required|max:50', //hacerlo nullable
            'foundation_year' => 'required|max:4'
        ]);

        $team = Team::find($id);
        $stadium = Stadium::find($team->stadium_id);

        $team->name = $request->name;
        $team->foundation_year = $request->foundation_year;
        $team->save();

        $stadium->name = $request->stadium;
        $stadium->save();

        return redirect()->route('teams.list');
    }

    public function delete_team($id) {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.list');
    }

}
