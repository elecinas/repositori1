@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <x-guest-layout>
            <h1>API con AXIOS (COLLARES)</h1>
            <p class="lead">El e-mail y password del administrador es:<br> <strong>e-mail:</strong> admin@istra.dor | <strong>password:</strong> 12345678</p>
        </x-guest-layout>
    </div>
</main>
@endsection

