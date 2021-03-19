@extends ('layout')
@section ('content')

<h1>Añadir producto</h1>
<form method="POST" action="{{ url('catalog') }}" >
    @csrf
    <div class="form-group mt-2">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
    </div>
    @error('name')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="product_code">Codigo producto</label>
        <input name="product_code" type="text" class="form-control" id="product_code" value="{{ old('product_code') }}">
    </div> 
   @error('product_code')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="description">Descripcion</label>
        <input name="description" type="text" class="form-control" id="description" value="{{ old('description') }}">
    </div> 
   @error('description')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="price">Precio</label>
        <input name="price" type="text" class="form-control" id="price" value="{{ old('price') }}">
    </div> 
   @error('price')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
@endsection