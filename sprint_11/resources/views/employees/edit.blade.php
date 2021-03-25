@extends ('layout')
@section ('content')

<form method="POST" action="{{ route('employee.update', $employee->id) }}" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $employee->name) }}">
    </div>


    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input name="email" type="email" class="form-control" id="email" value="{{ old('email', $employee->email) }}">
    </div>  

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 


    <div class="form-group">
        <label for="dni">DNI</label>
        <input name="dni" type="text" class="form-control" id="dni" value="{{ old('dni', $employee->dni) }}">
    </div>     

    @error('dni')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 


    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone', $employee->phone) }}">
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

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection