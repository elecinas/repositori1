@extends ('layout')
@section ('content')
    <h1>Catalog</h1>
    <form method="POST" action="" >
   @csrf
  <div class="form-group">
    <label for="name">Nombre</label>
    <input name="name" type="text" class="form-control" id="name" value="">
  </div>
  <div class="form-group">
    <label for="product_code">Codigo producto</label>
    <input name="product_code" type="text" class="form-control" id="product_code" value="">
  </div> 
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input name="description" type="text" class="form-control" id="description" value="">
  </div> 
  <div class="form-group">
    <label for="price">Precio</label>
    <input name="price" type="text" class="form-control" id="price" value="">
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection