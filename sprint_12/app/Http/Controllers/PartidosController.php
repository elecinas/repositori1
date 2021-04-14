<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuentro;
use App\Models\Score;
use App\Models\Stadium;
use App\Models\Team;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PartidosController extends Controller {

    public $role;
    public $permission;

    public function home() {

        return view('home');
    }

    /* CONTROLADORES DE CALENDARIO */

    public function calendar_list() {
        $encuentros = Encuentro::all(); //elloquent collection, contiene elloquent models
        return view('encuentros/encuentros', compact('encuentros'));
    }

    public function create_calendar() {
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('encuentros/create')
                        ->with('teams', $teams)
                        ->with('stadiums', $stadiums);
    }

    public function store_calendar(Request $request) {
        $request->validate([
            'programacion_partido' => 'required',
            'stadium' => 'required',
            'local' => 'required',
            'visitante' => 'required'
        ]);

        if ($request->input('dos') != 2) {
            return response()->view('error404', array(), 404);
        };

        $encuentro = new Encuentro();
        $encuentro->programacion_partido = $request->programacion_partido;
        $encuentro->stadium_id = $request->stadium;
        $encuentro->team_1 = $request->local;
        $encuentro->team_2 = $request->visitante;
        $encuentro->save();

        return redirect()->route('calendar.list');
    }

    public function edit_calendar($id) {
        $encuentro = Encuentro::find($id);
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('encuentros/edit')
                        ->with('teams', $teams)
                        ->with('stadiums', $stadiums)
                        ->with('encuentro', $encuentro);
    }

    public function update_calendar(Request $request, $id) {
        $request->validate([
            'programacion_partido' => 'required',
            'stadium' => 'required',
            'local' => 'required',
            'visitante' => 'required'
        ]);

        $encuentro = Encuentro::find($id);
        $encuentro->programacion_partido = $request->programacion_partido;
        $encuentro->stadium_id = $request->stadium;
        $encuentro->team_1 = $request->local;
        $encuentro->team_2 = $request->visitante;
        $encuentro->save();

        return redirect()->route('calendar.list');
    }

    public function delete_calendar($id) {
        $encuentro = Encuentro::find($id);
        $encuentro->delete();
        return redirect()->route('calendar.list');
    }

    /* CONTROLADORES DE RESULTADOS */

    public function classification_list() {
        return view('classification'); //crear view: classification.blade.php
    }

    /* CONTROLADORES DE EQUIPO */

    public function teams_list() {
        $teams = Team::all();
        return view('teams/teams')
                        ->with('teams', $teams);
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

        if ($request->input('dos') != 2) {
            return response()->view('error404', array(), 404);
        };

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
