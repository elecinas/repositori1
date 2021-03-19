<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    
    public function __construct(){
        $this->middleware('whatdate');
    }

    public function home() {
        $products = Product::all(); // Eloquent
        return view('home', compact('products'));
    }

    public function index() {
        return view('catalog/index');
    }

    public function show($p) {
        $producto = $p;
        return view('catalog/show')
                        ->with('producto', $producto)
                        ->with('mensaje', 'Muestra el producto: ');
    }

    public function create() {
        return view('catalog/create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:20',
            'product_code' => 'required|max:5',
            'description' => 'required|max:255',
            'price' => 'required|max:20'
        ]);
        
        $product = Product::create($request->all());

        return view('catalog/index');
    }

    public function edit($p) {
        $producto = $p;
        return view('catalog/edit')
                        ->with('producto', $producto)
                        ->with('mensaje', 'Se edita el producto: ');
    }

    public function update() {
        return 'method update (put)';
    }
    
    public function delete($product) {
        //$product->delete();
       // return redirect()->route('product.list');
        return $product;
    }

}
