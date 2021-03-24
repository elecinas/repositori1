<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerController extends Controller
{
    public function __construct(){
        $this->middleware('domingo');
    }
}
