<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view ('catalog/index');
    }
    
    public function show($p){
        $producto = $p;
        return view ('catalog/show')
                        ->with('producto', $producto)
                        ->with('mensaje', 'Muestra el producto: ');
    }
    
    public function create(){
        return view ('catalog/create');
    }
    
    public function store(){
        return 'store';
    }
    
    public function edit($p){
        $producto = $p;
        return view ('catalog/edit')
                        ->with('producto', $producto)
                        ->with('mensaje', 'Se edita el producto: ');
    }
    
    public function update(){
        return 'method update (put)';
    }
}
