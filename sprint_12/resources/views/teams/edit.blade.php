@extends ('layout')
@section ('content')

<form method="POST" action="{{ route('team.edit', $team->id) }}" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $team->name) }}">
    </div>


    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
        <label for="foundation_year">Año de fundación</label>
        <input name="foundation_year" type="text" class="form-control" id="foundation_year" value="{{ old('foundation_year', $team->foundation_year) }}">
    </div>  

    @error('foundation_year')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 


    <div class="form-group">
        <label for="stadium">Nombre del estadio</label>
        <input name="stadium" type="text" class="form-control" id="stadium" value="{{ old('stadium', $stadium->name) }}">
    </div> 

    @error('stadium')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection