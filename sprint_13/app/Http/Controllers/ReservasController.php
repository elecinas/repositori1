<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller {

    public function home() {

        return view('home');
    }

    public function list() {
        //$costumers = Costumer::all(); 
        $costumers = Costumer::join('costumer_room', 'costumer_room.costumer_id', '=', 'costumers.id')
                ->select('costumers.*')
                ->orderBy('dia_reserva')
                ->get();

        return view('list', compact('costumers'));
    }

    public function create() {
        $rooms = Room::all();
        return view('create', compact('rooms'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'dni' => 'required|unique:costumers,dni|max:9',
            'phone' => 'required|unique:costumers,phone|max:12',
            'room' => 'required|unique:costumer_room,dia_reserva',
            'dia_reserva' => 'required|unique:costumer_room,room_id'
        ]);
        
        $costumer = new Costumer();
        $costumer->name = $request->name;
        $costumer->dni = $request->dni;
        $costumer->phone = $request->phone;
        $costumer->save();
        DB::table('costumer_room')->insert([
            'dia_reserva' => $request->dia_reserva,
            'room_id' => $request->room,
            'costumer_id' => $costumer->id
        ]);

        return redirect()->route('booking.list');
    }

    public function edit($id) {
        $reserva = DB::table('costumer_room')->find($id);
        $costumer = Costumer::find($reserva->costumer_id);
        $rooms = Room::all();
        return view('edit')
                        ->with('reserva', $reserva)
                        ->with('costumer', $costumer)
                        ->with('rooms', $rooms);
    }

    public function update(Request $request, $id) {
        $reserva = DB::table('costumer_room')->find($id);
        $costumer = Costumer::find($reserva->costumer_id);

        $request->validate([
            'name' => 'required',
            'room' => 'required|unique:costumer_room,dia_reserva',
            'dia_reserva' => 'required|unique:costumer_room,room_id',
            'dni' => 'required|max:9',
            'phone' => 'required|max:12'
        ]);

        /*//Comprobamos que el valor ha cambiado, si es así validamos
        if ($request->dni != $costumer->dni) {
            $request->validate(['dni' => 'required|unique:costumers,dni|max:9']);
        }
        if ($request->phone != $costumer->phone) {
            $request->validate(['phone' => 'required|unique:costumers,phone|max:12']);
        }*/

        //updateamos los datos, los de la tabla pivote con raw query y los de Costumer con Eloquent
        //Raw Query
        DB::table('costumer_room')->where('costumer_id', $reserva->costumer_id)
                ->update(array(
                    'dia_reserva' => $request->dia_reserva,
                    'room_id' => $request->room,
        ));
        //Eloquent
        $costumer->name = $request->name;
        $costumer->dni = $request->dni;
        $costumer->phone = $request->phone;
        $costumer->save();

        return redirect()->route('booking.list');
    }

    public function delete($id) {
        DB::table('costumer_room')->delete($id);
        return redirect()->route('booking.list');
    }

}
