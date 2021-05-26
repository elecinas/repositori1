<div class="col-6">
    <h3>Login</h3>
    <form method="POST" action="{{ url('/api/login') }}">
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