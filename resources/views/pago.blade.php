@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Código Promocional</th>
                        <th>Direccion de Envio:</th>
                        <th>Método de Pago</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="offset-md-2 col-8">
                                <form action="" method="post">
                                    <input type="text" name="cogioPromo" class="form-control form-control-sm">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Aplicar</button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('perfil_editar') }}" class="btn btn-outline-success btn-sm">
                                Añadir dirección
                            </a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <select name="metodoPago" class="form-control form-control-sm" id="metodoPago">
                                    <option value="paypal">Paypal</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>

            <div class="col-md-3">
                <table class="table">
                    <tr class="table-success text-center">
                        <td colspan="2">Resumen del Pedido</td>
                    </tr>
                    <tr>
                        <td>Precio Total</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td>Envío</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td>Impuestos</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>$$$</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary btn-sm">Confirmar Pedido</button>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection
