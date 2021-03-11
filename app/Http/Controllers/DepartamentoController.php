<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller {

    public function index($p) {
        $pais = $p;
        return view('departamentos')
                        ->with('pais', $pais)
                        ->with('departamento', 'aún no se ha introducido ninguno D:')
                        ->with('metodo', 'GET');
    }

    public function store($p) {
        $pais = $p;
        return view('departamentos')
                        ->with('pais', $pais)
                        ->with('departamento', 'aún no se ha introducido ninguno D:')
                        ->with('metodo', 'POST');
    }

    public function show($p, $d) 
    {
        $pais = $p;
        $departamento = $d;
        return view('departamentos')
                        ->with('pais', $pais)
                        ->with('departamento', $departamento)
                        ->with('metodo', 'GET');
    }

    public function update($p, $d) {
        $pais = $p;
        $departamento = $d;
        return view('departamentos')
                        ->with('pais', $pais)
                        ->with('departamento', $departamento)
                        ->with('metodo', 'PUT');
    }

    public function destroy($p, $d) {
        $pais = $p;
        $departamento = $d;
        return view('departamentos')
                        ->with('pais', $pais)
                        ->with('departamento', $departamento)
                        ->with('metodo', 'DELETE');
    }

}
