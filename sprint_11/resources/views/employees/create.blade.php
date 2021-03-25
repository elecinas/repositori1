@extends ('layout')
@section ('content')

<h1>Añadir producto</h1>
<form method="POST" action="{{ url('employees') }}" >
    @csrf
    <div class="form-group mt-2">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
    </div>
    @error('name')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="email">Correo electrónico</label>
        <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}">
    </div> 
   @error('email')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="dni">DNI</label>
        <input name="dni" type="text" class="form-control" id="dni" value="{{ old('dni') }}">
    </div> 
   @error('dni')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <div class="form-group mt-2">
        <label for="phone">Teléfono</label>
        <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}">
    </div> 
   @error('phone')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
   <div class="form-group">
        <label for="position">Puesto</label>
        <select class="form-select" name="position_id">
            @foreach($positions as $position)
            <option value="{{$position->id}}" selected>{{$position->name}}</option>
            @endforeach
        </select>
    </div> 
    @error('position')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
@endsection