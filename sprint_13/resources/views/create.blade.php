@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Crear reserva</h1>
        <form method="POST" action="{{ url('reservas') }}" >
            @csrf
            <div class="form-group mt-3">
                <label for="name">Nombre</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-3">
                <label for="dni">DNI</label>
                <input name="dni" type="text" class="form-control" id="dni" value="{{ old('dni') }}">
            </div> 
            @error('dni')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-3">
                <label for="phone">Teléfono</label>
                <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}">
            </div> 
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-3">
                <label for="dia_reserva">Día</label>
                <input name="dia_reserva" type="date" class="form-control" id="dia_reserva" placeholder="Date" value="{{ old('dia_reserva') }}">
            </div> 
            @error('dia_reserva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group mt-3">
                <label for="room">Habitación</label>
                <select class="form-select" name="room">
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}" selected>{{$room->name}}</option>
                    @endforeach
                </select>
            </div> 
            @error('room')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror







            <div class="form-group mt-2">
                <label for="dos">Si no escribes 2, dará error:</label>
                <input name="dos" type="text" class="form-control" id="dos">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
        <!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
        @endsection
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>