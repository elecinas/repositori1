@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Calendario de partidos</h1>
<p class="lead"></p>
@can('editar_partidos')
<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="{{route('calendar.create')}}">Añadir partido</a>
    </div>
</div>
@else
No puedes crear partidos.
@endcan
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Día</th>
            <th scope="col">Lugar</th>
            <th scope="col">Equipo local</th>
            <th scope="col">Equipo visitante</th>
            <th scope="col">Resultado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($encuentros as $encuentro)
        <tr>
            <th scope="row">{{ $encuentro->id }}</th>
            <td>{{ $encuentro->programacion_partido }}</td>
            <td>{{ $encuentro->stadium->name }}</td>
            <td>{{ $encuentro->local->name }}</td>
            <td>{{ $encuentro->visitante->name }}</td>
            <td>{{ $encuentro->result }}</td>
            
            @can('editar_partidos')
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="{{route('calendar.edit', $encuentro->id)}}">
                        @csrf
                        <button type="submit" href="" class="btn btn-warning">Modificar</button>
                    </form>
                    <form method="POST" action="{{route('calendar.delete', $encuentro->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="" class="btn btn-danger">Suprimir</button>
                    </form>
                </div>
            </td>
            @else
            <td>
                No puedes editar equipos.
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
