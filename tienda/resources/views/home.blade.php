@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <style>
        .card{ margin-bottom: 1rem; }
        .formulario{ margin-bottom: 3rem; }
    </style>
    <div class="bg-light p-5 rounded">
        <x-guest-layout>
            <h1>API con AXIOS (CUADROS)</h1>
            <p class="lead">El e-mail y password del administrador es: <strong>e-mail:</strong> admin@istra.dor | <strong>password:</strong> 12345678</p>
            
            {{--COMPONENTE VUE--}}
           <div id="app">
                <admin-component></admin-component>
                <script src="{{ mix('js/app.js') }}"></script>
            </div>
            {{--FIN-COMPONENTE VUE--}}
            
        </x-guest-layout>
    </div>
</main>
@endsection