@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="offset-md-2 col-md-8">

            <a href="../home" class="btn btn-primary">Seguir Comprando</a>
            <table class="table table-hover table-borderless">
                <tbody>
                @php $total = 0;   @endphp

                @foreach($productos as $producto)
                    <tr>
                        <td>
                            <img src="{{ asset($producto->imagenes->first()->ruta) }}" class="img-fluid" alt="">
                        </td>
                        <td>
                            <h4>{{ $producto->nombre }}</h4> <br><br><br><br>

                            <form action="{{ route('carrito_modificar') }}" method="get">
                                @csrf
                                <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                <input type="number" name="Cantidad" placeholder="cantidad" class="text-center"
                                       value="{{ $producto->pivot->cantidad }}" style="width: 3em;">
                                <button type="submit">
                                    <img src="{{ asset('img/productos/actualizado.svg') }}" width="20px" height="20px"
                                         alt="">
                                </button>
                            </form>

                            <form action="{{ route('carrito_eliminar') }}" method="post">
                                @csrf
                                <br><br><br>
                                <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>

                        </td>
                        <td>{{ $producto->precio }}
                        <td>
                            @php
                                $subtotal = $producto->precio * $producto->pivot->cantidad;
                                $total = $total + $subtotal;
                            @endphp

                            <br><br><br> ${{$subtotal}}
                        </td>
                        <td></td>
                    </tr>
                @endforeach

                <form action="{{ route('pago_index') }}" method="post">
                    @csrf
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm">Procesar</button>
                        </td>
                        <td>Subtotal</td>
                        <td>${{ $total }}</td>
                    </tr>
                </form>


                </tbody>
            </table>

        </div>
    </div>


@endsection
