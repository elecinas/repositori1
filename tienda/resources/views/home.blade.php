@extends('layout')
@section('title', 'titulo')
@section('content')
<main class="container">
    <style>
        .card{
            margin-bottom: 1rem;
        }

        form{
            margin-bottom: 3rem;
        }
    </style>
    <div class="bg-light p-5 rounded">
        <h1>API con AXIOS (CUADROS)</h1>
        <p class="lead">El e-mail y password del administrador es:<br> <strong>e-mail:</strong> admin@istra.dor | <strong>password:</strong> 12345678</p>
        {{-- STARTS -- Formulario insercion datos --}}
        <form method="POST" action="{{-- route('booking.update', $reserva->id) --}}" >
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Nombre obra</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Descripción obra</label>
                        <input name="description" type="text" class="form-control" id="description" value="{{ old('description') }}">
                    </div>

                    <div class="form-group">
                        <label for="photo">Imagen obra</label>
                        <input name="photo" type="text" class="form-control" id="photo" value="{{ old('photo') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Precio cuadro</label>
                        <input name="price" type="text" class="form-control" id="price" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input name="author" type="text" class="form-control" id="author" value="{{ old('author') }}">
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group">
                        <label for="name_fake">Nombre collar</label>
                        <input name="name_fake" type="text" class="form-control" id="name_fake" value="{{ old('name_fake') }}">
                    </div>

                    <div class="form-group">
                        <label for="description_fake">Descripción collar</label>
                        <input name="description_fake" type="text" class="form-control" id="description_fake" value="{{ old('description_fake') }}">
                    </div>

                    <div class="form-group">
                        <label for="photo_fake">Imagen collar</label>
                        <input name="photo_fake" type="text" class="form-control" id="photo_fake" value="{{ old('photo_fake') }}">
                    </div>

                    <div class="form-group">
                        <label for="price_fake">Precio collar</label>
                        <input name="price_fake" type="text" class="form-control" id="price_fake" value="{{ old('price_fake') }}">
                    </div>

                    <div class="form-group">
                        <label for="dia_reserva">Día llegada</label>
                        <input type="date" name="dia_reserva" class="form-control" id="dia_reserva" value="{{ old('dia_reserva') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- ENDS -- Formulario insercion datos --}}

        {{-- STARTS -- Cards que muestran las obras --}}
        <div class="d-flex flex-wrap justify-content-between flex-row bd-highlight mb-3">
            <div class="card" style="width: 18rem;">
                <img src="https://img.culturacolectiva.com/content/2016/01/francis-bacon-medium.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://img.culturacolectiva.com/content/2016/01/Le-Pigeon-aux-peitis-pois-medium.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Raphael_missing.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://img.culturacolectiva.com/content/2016/01/Natividad-con-San-Francisco-y-San-Lorenzo-medium.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://img.culturacolectiva.com/content/2016/01/Congregacion-saliendo-de-la-iglesia-reformada-en-Nuenen-medium.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://img.culturacolectiva.com/content/2016/01/Chez-Tortoni-medium.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        {{-- ENDS -- Cards que muestran las obras --}}
    </div>
    <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
</main>
@endsection