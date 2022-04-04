@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Llista De Expedients</title>
@endsection

@section('botoncerrarsesion')
        <form>
            <input type="button" class="btn btn-outline-dark" value="Tornar Enrere" onclick="history.go(-1)">
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
                <label for="" class="col-1 col-form-label">Cercar Per:</label>
                <div class="col-2 dropdown d-grid gap-2">
                    <select class="form-select" aria-label="Default select example">
                        <option></option>
                        <option value="1">Codi</option>
                        <option value="2">Data de Creació</option>
                        <option value="3">Data de Modificació</option>
                        <option value="4">Usuari Ultima Modificació</option>
                        <option value="5">Estat</option>
                    </select>
                </div>
            </div>
                <div class="container" style="margin-top: 30px;">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Codi</td>
                                    <td>Data de Creació</td>
                                    <td>Data de Modificació</td>
                                    <td>Usuari Ultima Modificació</td>
                                    <td>Estat</td>
                                    <td>Edició</td>
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
                                            <button class="btn btn-info" type="button">Veure</button>
                                            <button class="btn btn-success" type="button">Afegir</button>
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
