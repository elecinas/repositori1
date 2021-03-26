@extends('layout')
@section('title', 'titulo')
@section('content')

<h1>{{$position}}</h1>
<p class="lead">Empleados trabajando en este puesto: </p>
<ul>
@foreach($employees as $employee)
<p>{{$employee->name}}</p>
@endforeach
</ul>






<!--<a class="btn btn-lg btn-primary" href="#" role="button">Ver &raquo;</a>-->
@endsection
