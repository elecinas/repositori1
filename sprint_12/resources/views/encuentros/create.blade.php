@extends ('layout')
@section ('content')

<h1>Añadir partido</h1>
<form method="POST" action="{{ url('calendario') }}" >
    @csrf
    <div class="form-group mt-3">
        <label for="programacion_partido">Fecha</label>
        <input type="datetime" name="programacion_partido" min=”2021-12-08T23:59:60Z″ class="form-control" id="programacion_partido" placeholder="AAAA-MM-DDTHH:MM" value="{{ old('programacion_partido') }}">
    </div>
    @error('programacion_partido')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="stadium">Estadio</label>
        <select class="form-select" name="stadium">
            @foreach($stadiums as $stadium)
            <option value="{{$stadium->id}}" selected>{{$stadium->name}}</option>
            @endforeach
        </select>
    </div> 
    @error('stadium')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="local">Equipo local</label>
        <select class="form-select" name="local">
            @foreach($teams as $team)
            <option value="{{$team->id}}" selected>{{$team->name}}</option>
            @endforeach
        </select>
    </div> 
    @error('local')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="visitante">Equipo visitante</label>
        <select class="form-select" name="visitante">
            @foreach($teams as $team)
            <option value="{{$team->id}}" selected>{{$team->name}}</option>
            @endforeach
        </select>
    </div> 
    @error('local')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group mt-3">
        <label for="result">Resultado</label>
        <input type="text" name="result" class="form-control" id="result" value="{{ old('result') }}">
    </div>
    @error('result')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    

    <div class="form-group mt-2">
        <label for="dos">Si no escribes 2, dará error:</label>
        <input name="dos" type="text" class="form-control" id="dos">
    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
@endsection