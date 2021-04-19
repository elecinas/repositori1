@extends ('layout')
@section ('content')

<form method="POST" action="{{ route('calendar.edit', $encuentro->id) }}" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="programacion_partido">Fecha</label>
        <input type="datetime" name="programacion_partido" min=”2021-12-08T23:59:60Z″ class="form-control" id="programacion_partido" value="{{ old('programacion_partido', $encuentro->programacion_partido) }}">
    </div>
    @error('programacion_partido')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="stadium">Estadio</label>
        <select class="form-select" name="stadium">
            @foreach($stadiums as $stadium)
                <option value="{{$stadium->id}}" 
                  @if ($stadium->id == old('stadium', $encuentro->stadium_id))     
                    selected
                  @endif  
                >{{$stadium->name}}</option>
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
                <option value="{{$team->id}}" 
                  @if ($team->id == old('local', $encuentro->team_1))     
                    selected
                  @endif  
                >{{$team->name}}</option>
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
                <option value="{{$team->id}}" 
                  @if ($team->id == old('visitante', $encuentro->team_2))     
                    selected
                  @endif  
                >{{$team->name}}</option>
            @endforeach
        </select>
    </div> 
    @error('visitante')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <div class="form-group mt-3">
        <label for="result">Resultado</label>
        <input type="text" name="result" class="form-control" id="result" value="{{ old('result', $encuentro->result) }}">
    </div>
    @error('result')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection