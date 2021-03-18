@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-4">
                <form action="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Datos de Entrega</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" class="form-control">
                                    <option value="">Aguascalientes</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Ciudad</label>
                                <input type="text" name="ciudad" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Código Postal</label>
                                <input type="text" name="codigoPostal" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="offset-md-1 col-md-4">
                <div class="card">
                    <div class="card-header text-center">Datos de Contacto</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="number" name="telefono" class="form-control">
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
            </div>


        </div>
    </div>

@endsection
