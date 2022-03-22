@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Lista De Expedientes</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex" action="{{ action([App\Http\Controllers\UsuariController::class, 'logout']) }}" method="GET">
        <button class="btn btn-outline-dark" type="submit">Cerrar Sesión <i class="fa fa-sign-out"></i></button>
    </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/lista/listaexpedientes.blade.css">
@endsection

@section('contenido')
    <div class="container" style="margin-top: 30px;">
        <form action="">
            <div class="row">
                <label for="" class="col-1 col-form-label">Buscar Por:</label>
                <div class="col-2 dropdown d-grid gap-2">
                    <select class="form-select" aria-label="Default select example">
                        <option></option>
                        <option value="1">Código</option>
                        <option value="2">F.Creacion</option>
                        <option value="3">F.Modificacion</option>
                        <option value="3">Usuario última modificació</option>
                        <option value="3">Estado</option>
                    </select>
                </div>
            </div>
                <div class="container" style="margin-top: 30px;">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Código</td>
                                    <td>F.Creacion</td>
                                    <td>F.Modificacion</td>
                                    <td>Usuario última modificació</td>
                                    <td>Estado</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-info" type="button">Ver</button>
                                            <button class="btn btn-success" type="button">Añadir</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </form>
    </div>
@endsection
