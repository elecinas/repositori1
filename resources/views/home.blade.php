@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Inicio</h1>
<p class="lead">Pantalla principal</p>

<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="{{ url('catalog/create') }}">Añadir producto</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Código</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="{{ route('product.edit', $product->id) }}">
                        @csrf
                    <button type="submit" href="" class="btn btn-warning">Modify</button>
                    </form>
                    <form method="POST" action="{{ route('product.delete', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
@endsection
