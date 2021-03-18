@extends('layouts.app')
@section('content')

    <div class="container">
        @foreach($productos as $producto)
            <div class="card offset-sm-3 col-sm-6">
                <div class="card-header"> <h4>{{ $producto->nombre }}</h4></div>
                <div id="carrusel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">

                        @foreach($producto->imagenes as $imagen)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{ $imagen->ruta }}" alt="" class="d-block img-fluid">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ $imagen->ruta }}" alt="" class="d-block img-fluid">
                                </div>
                            @endif

                        @endforeach
                    </div>
                    <a href="#carrusel" role="button" data-slide="prev" class="carousel-control-prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previus</span>
                    </a>
                    <a href="#carrusel" role="button" data-slide="next" class="carousel-control-next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="card-body">
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="card-text">{{ $producto->precio }}</p>
                    <form action="/carrito/agregar" method="POST">
                        @csrf
                        <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                        <button class="btn btn-primary" type="submit">Añadir al carrito</button>
                    </form>
                </div>
            </div>
            <p></p>
        @endforeach
    </div>
@endsection
