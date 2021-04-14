@extends ('layout')
@section ('content')

<h1>Añadir equipo</h1>
<form method="POST" action="{{ url('teams') }}" >
    @csrf
    <div class="form-group mt-3">
        <label for="name">Nombre equipo</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group mt-3">
        <label for="stadium">Nombre del estadio</label>
        <input name="stadium" type="text" class="form-control" id="stadium" value="{{ old('stadium') }}">
    </div> 
    @error('stadium')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group mt-3">
        <label for="foundation_year">Año de fundación</label>
        <input name="foundation_year" type="text" class="form-control" id="foundation_year" value="{{ old('foundation_year') }}">
    </div> 
    @error('foundation_year')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <div class="form-group mt-2">
        <label for="dos">Si no escribes 2, dará error:</label>
        <input name="dos" type="text" class="form-control" id="dos">
    </div>
    
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
@endsection