@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Inicio</h1>
        <p class="lead">Aplicación API, sea lo que sea eso! ;_;</p>
        <p class="lead">El e-mail y password del administrador es:</p>
        <ul>
            <li>e-mail: admin@istra.dor</li>
            <li>password: 12345678</li>
        </ul>
        <!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
        @endsection
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>