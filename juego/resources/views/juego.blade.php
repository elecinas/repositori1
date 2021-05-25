@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Juego</h1>
        <p class="lead">El e-mail y password del administrador es: <strong>e-mail:</strong> admin@istra.dor | <strong>password:</strong> 12345678</p>
        {{--COMPONENTE VUE--}}
        <div id="app">
            <admin-component></admin-component>
            <script src="{{ asset(mix('js/app.js')) }}"></script>
        </div>
        {{--FIN-COMPONENTE VUE--}}
    </div>
</main>
@endsection