<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;

class EmployeeController extends Controller {

    public function home() {
        $positions = Position::all();
        return view('home')
                        ->with('positions', $positions);
    }

    public function empleadosPuesto(Request $request) {
        $request->validate([
            'position_id' => 'required'
        ]);
        $id = $request->position_id;
        //dd($id);
        $position = Position::find($id)->name;
        $employees = Position::find($id)->employees;
        return view('employees/inposition')
                    ->with('employees', $employees)
                    ->with('position', $position);
    }

    public function list() {
        $employees = Employee::all();
        return view('employees/employees', compact('employees'));
    }

    public function create() {
        $positions = Position::all();
        return view('employees/create')
                        ->with('positions', $positions);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50',
            'dni' => 'required|max:9',
            'phone' => 'required|max:12',
            'position_id' => 'required'
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index');
    }

    public function edit($id) {
        $employee = Employee::find($id);
        $positions = Position::all();
        return view('employees/edit')
                        ->with('employee', $employee)
                        ->with('positions', $positions);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50',
            'dni' => 'required|max:9',
            'phone' => 'required|max:12',
            'position_id' => 'required'
        ]);


        $employee = Employee::find($id);
        $employee->update($request->all());

        return redirect()->route('employee.index');
    }

    public function delete($id) {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }

}
