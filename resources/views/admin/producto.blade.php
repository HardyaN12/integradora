@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ ('Control de Productos') }}</div>
                    <div class="card-body">
                        <form action="{{ route('producto_filtrar') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="">Buscar por:</label>
                                </div>
                                <div class="col">
                                    <select name="opc" id="opc" class="form-control">
                                        <option value="nombre">Nombre</option>
                                        <option value="precio">Precio</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" name="valor" id="" class="form-control">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                    <a href="{{ route('producto_agregar') }}" class="btn btn-primary btn-sm">Agregar</a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-hover">

                            <thead>
                            <tr class="text-center">
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($productos as $producto)
                                <form action="{{ route('producto_eliminar') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td colspan="2" class="text-center">
                                            <a href="/admin/productos/editar/{{ $producto->id }}" class="btn btn-primary btn-sm">Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $productos->links() }}
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
