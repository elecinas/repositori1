@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
    <div class="row">
    <div class="col-6">
        <h1>Login</h1>
        <form method="POST" action="{{ url('/login') }}" >
            @csrf
            <div class="form-group mt-2">
                <label for="email">Correo electrónico</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="example@mail.com">
            </div> 
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2">
                <label for="password">Contraseña</label>
                <input name="password" type="text" class="form-control" id="password" value="{{ old('password') }}" placeholder="password">
            </div> 
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-dark mt-4">Submit</button>
        </form>
    </div>
</div>
    </div>
</main>
@endsection