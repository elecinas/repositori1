<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function saludar($n = 'anónimo')
    {
        $nombre = $n;
        return view('saludo') -> with ('nombre', $nombre);
    }
}
