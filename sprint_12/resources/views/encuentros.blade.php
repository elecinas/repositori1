@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Calendario de partidos</h1>
<p class="lead"></p>

<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="">Añadir partido</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Día</th>
            <th scope="col">Lugar</th>
            <th scope="col">Primer equipo</th>
            <th scope="col">Segundo equipo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($encuentros as $encuentro)
        <tr>
            <th scope="row">{{ $encuentro->id }}</th>
            <td>{{ $encuentro->programacion_partido }}</td>
            <td>{{ $encuentro->stadium->name }}</td>
            <td>{{ $encuentro->team_1->name }}</td>
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="">
                        @csrf
                    <button type="submit" href="" class="btn btn-warning">Modificar</button>
                    </form>
                    <form method="POST" action="">
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
