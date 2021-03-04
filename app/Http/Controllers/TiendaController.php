<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function producto($id)
    {
        dd('tienda controller');
        return "Esto muestra un producto. Recibiendo $id";
    }
}
