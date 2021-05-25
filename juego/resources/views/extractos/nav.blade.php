<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">#</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Juego</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Jugadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="d-flex">
                <!--<span color="white">{{session('c_nombre')}}</span>-->
                @if (Route::has('login'))
                @auth
                <span class="ms-3" class="text-sm text-gray-700 underline">{{Auth::user()->email}}
                    {{-- @if(Auth::user()->hasPermissionTo('vista_no_fake')) --}}
                    /Editor
                   {{-- @endif --}}
                </span>
                <form id="form1">
                    <a class="ms-3" href="#" class="text-sm text-gray-700 underline" onclick="logout();"><i class="zmdi zmdi-power"></i>Logout</a>
                </form>
                @else
                <a class="ms-3" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                <a class="ms-3" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</nav>