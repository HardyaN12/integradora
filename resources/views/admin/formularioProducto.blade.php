@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Agregar Nuevo Producto') }}</div>
                <div class="card-body">
                    <div class="col-md-6 offset-3">
                        <form action="{{ route('producto_registrar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($producto->id))
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            @endif
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" autocomplete="off" class="form-control" value="{{ $producto->nombre ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                               <textarea class="form-control"  autocomplete="off" name="descripcion" cols="30" rows="10">
                                   {{ $producto->descripcion ?? '' }}
                               </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="text" name="precio"  autocomplete="off" class="form-control" value="{{ $producto->precio ?? '' }}">
                            </div>

                            @if(isset($producto))
                                @foreach($producto->imagenes as $imagen)
                                    <input type="hidden" name="idImagen[]" value="{{ $imagen->id }}">
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" name="imagen[]" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción de la Imagen</label>
                                <input type="text" class="form-control"  autocomplete="off" name="descImagen[]" value="{{ $imagen->descripcion }}">
                            </div>
                                <div class="form-group">
                                    <img src="/{{ $imagen->ruta }}" class="img-fluid" alt="">
                                </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" name="imagen[]" class="form-control">
                                </div>
                            <div class="form-group">
                                <label for="">Descripcion de la imagen</label>
                                <input type="text"  autocomplete="off" class="form-control" name="descImagen[]">
                            </div>
                            @endif

                            <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
