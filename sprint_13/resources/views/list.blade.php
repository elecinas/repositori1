@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>Reservas</h1>
<p class="lead">Lista de reservas:</p>


<div class="row">
    <div class="col-md-3 m-4">
        <a class="btn btn-success" href="{{ route('booking.create') }}">Hacer reserva</a>
    </div>
</div>

{{-- Esto es un comentario de Blade --}}
<!--Tabla-->
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">DNI</th>
            <th scope="col">Día de llegada</th>
            <th scope="col">Temática habitación</th>
            <th scope="col">Número</th>
            <th scope="col">Tema planta</th>
            <th scope="col">Planta</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($costumers as $costumer)
        @foreach($costumer->rooms as $room)
        <tr>
            <th scope="row">{{ $room->pivot->id }}</th>
            <td>{{ $costumer->name}} </td>
            <td>{{ $costumer->dni }}</td>
            <td>{{ $room->pivot->dia_reserva }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->number }}</td>
            <td>{{ $room->floor->floor_theme }}</td>
            <td>{{ $room->floor->floor }}</td>

            @can('gestor_reservas')
            <td>
                <div class="btn-group" role="group">
                    <form method="GET" action="{{ route('booking.edit',  $room->pivot->id) }}">
                        @csrf
                        <button type="submit" href="" class="btn btn-warning">Modificar</button>
                    </form>
                    <form method="POST" action="{{ route('booking.delete', $room->pivot->id, $costumer->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="" class="btn btn-danger">Suprimir</button>
                    </form>    
                </div>
            </td>
            @else
            <td>
                No puedes editar reservas.
            </td>
            @endcan

        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>




<!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
@endsection
