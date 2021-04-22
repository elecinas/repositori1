@extends ('layout')
@section ('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <form method="POST" action="{{ route('booking.update', $reserva->id) }}" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $costumer->name) }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="dni">DNI</label>
                <input name="dni" type="text" class="form-control" id="dni" value="{{ old('dni', $costumer->dni) }}">
            </div>  
            @error('dni')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 


            <div class="form-group">
                <label for="phone">Telefono</label>
                <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone', $costumer->phone) }}">
            </div> 
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 

            <div class="form-group">
                <label for="dia_reserva">Día</label>
                <input type="date" name="dia_reserva" class="form-control" id="dia_reserva" value="{{ old('dia_reserva', $reserva->dia_reserva) }}">
            </div>
            @error('dia_reserva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="room">Tema de la habitación</label>
                <select class="form-select" name="room">
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}" 
                            @if ($room->id == old('room', $reserva->room_id))     
                        selected
                        @endif  
                        >{{$room->name}}</option>
                    @endforeach
                </select>
            </div> 
            @error('room')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @endsection
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>