@extends('layout')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Error 404</h1>
        <p class="lead">Pues eso...</p>
        <a class="btn btn-lg btn-primary" href="{{ url('/') }}" role="button">Volver a inicio</a>

        @endsection
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>