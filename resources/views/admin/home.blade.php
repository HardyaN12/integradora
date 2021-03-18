
@extends('layouts.admin')
@section('content')





















    {{--<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ ('Seguimiento de Transacciones')}}
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="">Buscar por:</label>
                            </div>
                            <div class="col">
                                <select name="opc" id="opc" class="form-control">
                                    <option value="fecha">Fecha</option>
                                    <option value="estado">Estado</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="valor" class="form-control">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>Cliente</th>
                            <th>#Pedido</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($pedidos as $pedido)

                            <form action="{{ route ('pedido_seguimiento') }}" method="post">
                                @csrf
                                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                <tr>
                                    <td> {{ $pedido->cliente }}</td>
                                    <td> {{ $pedido->id }}</td>
                                    <td> {{ $pedido->fecha }}</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="estado" id="estado" class="form-control form-control-sm">
                                                <option value="{{ $pedido->estado }}">{{ $pedido->estado }}</option>
                                                <option value="pagado">Pagado</option>
                                                <option value="enviado">Enviado</option>
                                                <option value="entregado">Entregado</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td colspan="2" class="text-center">
                                        <a href="item/{{ $pedido->id }}" class="btn btn-primary btn-sm">Mostrar Productos</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach

                        </tbody>
                    </table>
                    @yield('item')
                    {{ $pedidos->links() }}
                </div>

            </div>
        </div>
    </div>--}}


@endsection
