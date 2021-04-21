<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Room;

class ReservasController extends Controller
{
    public function home() {

        return view('home');
    }
    
    public function list() {
        $costumers = Costumer::all(); 
        return view('list', compact('costumers'));
    }
    
    public function create() {
        $rooms = Room::all();
        return view('create', compact('rooms'));
    }
    
    public function store(Request $request) {
        /*$request->validate([
            'programacion_partido' => 'required',
            'stadium' => 'required',
            'local' => 'required',
            'visitante' => 'required',
            'result' => 'required|max:20'
        ]);

        if ($request->input('dos') != 2) {
            return response()->view('error404', array(), 404);
        };

        $encuentro = new Encuentro();
        $encuentro->programacion_partido = $request->programacion_partido;
        $encuentro->stadium_id = $request->stadium;
        $encuentro->team_1 = $request->local;
        $encuentro->team_2 = $request->visitante;
        $encuentro->result = $request->result;
        $encuentro->save();

        return redirect()->route('calendar.list');*/
    }
    
    public function edit($id) {
        //$encuentro = Encuentro::find($id);
        //$teams = Team::all();
        //$stadiums = Stadium::all();
        /*return view('encuentros/edit')
                        ->with('teams', $teams)
                        ->with('stadiums', $stadiums)
                        ->with('encuentro', $encuentro);*/
    }
    
    public function update(Request $request, $id) {
        /*$request->validate([
            'programacion_partido' => 'required',
            'stadium' => 'required',
            'local' => 'required',
            'visitante' => 'required',
            'result' => 'required|max:20'
        ]);

        $encuentro = Encuentro::find($id);
        $encuentro->programacion_partido = $request->programacion_partido;
        $encuentro->stadium_id = $request->stadium;
        $encuentro->team_1 = $request->local;
        $encuentro->team_2 = $request->visitante;
        $encuentro->result = $request->result;
        $encuentro->save();

        return redirect()->route('calendar.list');*/
    }
    
    public function delete($id) {
        //$encuentro = Encuentro::find($id);
        //$encuentro->delete();
        //return redirect()->route('calendar.list');
    }
}
