@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <div class="bg-light p-5 rounded">
        <x-guest-layout>
            <h1>White collar</h1>
            <p class="lead">El e-mail y password del administrador es:<br> <strong>e-mail:</strong> admin@istra.dor | <strong>password:</strong> 12345678</p>
            <div class="d-flex flex-wrap justify-content-between flex-row bd-highlight mb-3">
                @foreach($collars as $collar)
                <div class="card" style="width: 18rem">
                    <img src="{{ $collar->photo_fake }}" class="card-img-top" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $collar->name_fake }}</h5>
                        <p class="card-text">{{ $collar->description_fake }}</p>
                        <p class="card-text"><i>{{ $collar->price_fake }}€</i></p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-dark">Order jewel</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-guest-layout>
    </div>
</main>
@endsection

