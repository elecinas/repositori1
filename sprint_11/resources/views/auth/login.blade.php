@extends ('layout')
@section ('content')
<div class="row">
    <div class="col-6">
        <h1>Registro usuario</h1>
        <form method="POST" action="{{ url('/login') }}" >
            @csrf
            <div class="form-group mt-2">
                <label for="name">Nombre</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2">
                <label for="email">Correo electrónico</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
            </div> 
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2">
                <label for="password">Contraseña</label>
                <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}">
            </div> 
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2">
                <label for="dos">Si no escribes 2, dará error:</label>
                <input name="dos" type="text" class="form-control" id="dos">
            </div> 
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
    
    <div class="mt-2">
        <a href="">¿Olvidaste la contraseña?</a>
    </div>

</div>
@endsection