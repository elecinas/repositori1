@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        {{--COMPONENTE VUE--}}
        <div id="app">
            <admin-component></admin-component>
            <script src="{{ asset(mix('js/app.js')) }}"></script>
        </div>
        {{--FIN-COMPONENTE VUE--}}
    </div>
</main>
@endsection