@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Listado de equipos</h1>
<p class="lead"></p>
@can('editar_partidos')
<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="{{route('team.create')}}">Añadir equipo</a>
    </div>
</div>
@else
No puedes crear equipos.
@endcan
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Equipo</th>
            <th scope="col">Estadio</th>
            <th scope="col">Año de fundación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <th scope="row">{{ $team->id }}</th>
            <td>{{ $team->name }}</td>
            <td>{{ $team->stadium->name }}</td>
            <td>{{ $team->foundation_year }}</td>

            @can('editar_partidos')
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="{{route('team.edit', $team->id)}}">
                        @csrf
                        <button type="submit" href="" class="btn btn-warning">Modificar</button>
                    </form>
                    <form method="POST" action="{{route('team.delete', $team->id)}}">
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
