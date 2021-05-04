@extends('layout')
@section('title', 'titulo')
@section('content')
{{-- DASHBOARD NAV STARTS --}}
 <style type="text/css">
            .page-wrapper { 
                position: relative; 
                top: -10px;
            }

        </style>
<div class="page-wrapper">
<nav class="navbar navbar-expand-md navbar-secondary bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Dashboard|Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{-- route('home') --}}">Cosas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1"  aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="d-flex">
                <form id="form1" method="POST" action="{{ route('logout') }}">
                    @csrf   
                    <a href="#" onclick="event.preventDefault();
                       this.closest('form').submit();"><i class="zmdi zmdi-power"></i>Logout</a>
                </form>
            </div>
        </div>
    </div>
</nav>
{{-- DASHBOARD NAV ENDS --}}
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>
        <p class="lead">Dashboard</p>
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>
</div>
@endsection