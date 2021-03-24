@extends ('layout')
@section ('content')

<form method="POST" action="{{ route('product.update', $product->id) }}" >
   @csrf
   @method('PUT')
  <div class="form-group">
    <label for="name">Nombre</label>
    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $product->name) }}">
  </div>
    
      
   @error('name')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    
   
  <div class="form-group">
    <label for="product_code">Código producto</label>
    <input name="product_code" type="text" class="form-control" id="product_code" value="{{ old('product_code', $product->product_code) }}">
  </div>  
   
      @error('product_code')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror 
   
    
  <div class="form-group">
    <label for="description">Descripción</label>
    <input name="description" type="text" class="form-control" id="description" value="{{ old('description', $product->description) }}">
  </div>     
   
       @error('description')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror 
   
    
  <div class="form-group">
    <label for="price">Precio</label>
    <input name="price" type="text" class="form-control" id="price" value="{{ old('price', $product->price) }}">
  </div> 
   
    @error('price')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror 
    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection