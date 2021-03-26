@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Inicio</h1>
<p class="lead">Bienvenido/a a la aplicación para gestionar empleados</p>
<h3>Búsqueda especial de empleados</h3>
<p class="lead">Empleados según puesto de trabajo:</p>
<form method="POST" action="{{ route('employee.inposition') }}" >
    @csrf
    <div class="form-group">
        <label for="position">Puesto</label>
        <select class="form-select" name="position_id">
            @foreach($positions as $position)
            <option value="{{$position->id}}" selected>{{$position->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>





<!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
@endsection
