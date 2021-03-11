<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $pais = 'aún no se ha introducido ninguno D:';
        return view('paises') 
                -> with ('pais', $pais)
                -> with ('metodo', 'GET');
    }
    
    public function store()
    {
        $pais = 'aún no se ha introducido ninguno D:';
        return view('paises') 
                -> with ('pais', $pais)
                -> with ('metodo', 'POST');
    }
    
    public function show($p)
    {
        $pais = $p;
        return view('paises') 
                -> with ('pais', $pais)
                -> with ('metodo', 'GET');
    }
    
    public function update($p)
    {
        $pais = $p;
        return view('paises') 
                -> with ('pais', $pais)
                -> with ('metodo', 'PUT');
    }
    
    public function destroy($p)
    {
        $pais = $p;
        return view('paises') 
                -> with ('pais', $pais)
                -> with ('metodo', 'DELETE');
    }
}
