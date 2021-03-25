@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Empleados</h1>
<p class="lead">Lista de empleados disponibles en la base de datos</p>

<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="{{ url('employees/create') }}">Añadir empleado</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Empleado</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col">DNI</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Puesto</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <th scope="row">{{ $employee->id }}</th>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->dni }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->position->name }}</td>
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="{{ route('employee.edit', $employee->id) }}">
                        @csrf
                    <button type="submit" href="" class="btn btn-warning">Modificar</button>
                    </form>
                    <form method="POST" action="{{ route('employee.delete', $employee->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="" class="btn btn-danger">Suprimir</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
