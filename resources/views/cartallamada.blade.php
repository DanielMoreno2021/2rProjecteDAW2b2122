@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Carta Llamada</title>
@endsection

@section('botoncerrarsesion')
    <form>
        <input type="button" class="btn btn-outline-dark" value="Cancelar Carta" onclick="history.go(-1)">
    </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/cartallamada.blade.css">
@endsection

@section('contenido')
    <div class="container cartallamada">
        <div class="row">

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                title="What is your type of Emergency?">Tipo de Emergencia</label>
            <div class="col-4 dropdown d-grid gap-2">
                <select class="form-select" aria-label="Default select example">
                    @foreach ($tipusincidents as $tipusincident)
                        <option value="">{{ $tipusincident->descripcio }}</option>
                    @endforeach
                </select>
            </div>

            <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                title="What is your Emergency? / What do you need?">Emergencia</label>
            <div class="col-4 dropdown d-grid gap-2">
                <select class="form-select" aria-label="Default select example">
                    @foreach ($incidents as $incident)
                        <option value="">{{ $incident->descripcio }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <form>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nota Comuna</label>
                <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
        </form>

        <div class="mt-3 justify-content-between">
            <div class="row">

                <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What is your Location?">Localización</label>
                <div class="col-3">
                    <input type="" class="form-control" id="" readonly>
                </div>


                <div class="col-5 d-grid gap-2">
                    <button type="button" class="btn btn-danger" style="background-color: #104069">Abrir Mapa</button>
                </div>


                {{-- <label class="col-2 form-check-label" for="defaultCheck1">
                Fuera de Catalunya
            </label> --}}
                <div class="form-check col-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Fuera de Catalunya
                    </label>
                </div>

            </div>
        </div>


        <div class="mt-3 justify-content-between">
            <div class="row">

                <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What province are you in?">Provincia</label>
                <div class="col-3">
                    <input type="" class="form-control" id="">
                </div>


                <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What region are you in?">Comarca</label>
                <div class="col-3">
                    <input type="" class="form-control" id="">
                </div>


                <label for="" class="col-1 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What municipality are you in?">Municipio</label>
                <div class="col-3">
                    <input type="" class="form-control" id="">
                </div>

            </div>
        </div>

        <div class="mt-3 justify-content-between">
            <div class="row">

                <label for="" class="col-2 col-form-label">Descripción</label>
                <div class="col-4">
                    <input type="" class="form-control" id="">
                </div>

                <label for="" class="col-2 col-form-label">Detalles</label>
                <div class="col-4">
                    <input type="" class="form-control" id="">
                </div>

            </div>
        </div>
        <form>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Otras Referencias</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>

        <div class="mt-3 justify-content-between">
            <div class="row">

                <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What is your telephone number?">Telefono</label>
                <div class="col-4">
                    <input type="" class="form-control" id="">
                </div>

                <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What is your address?">Dirección</label>
                <div class="col-4">
                    <input type="" class="form-control" id="">
                </div>

            </div>
        </div>
        <div class="mt-3 justify-content-between">
            <div class="row">

                <label for="" class="col-2 col-form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="What is your name?">Nombre</label>
                <div class="col-4">
                    <input type="" class="form-control" id="">
                </div>

                <div class="col-6 d-grid gap-2">
                    <button type="button" class="btn btn-danger"
                        style="background-color: #104069">Registrar/Antecedentes</button>
                </div>
            </div>

            <div class="mt-3 justify-content-center">
                <div class="row">

                    <div class="col-6 d-grid gap-2">
                        <button type="button" class="btn btn-danger" style="background-color: #104069">Añadir a un
                            expediente</button>
                    </div>
                    <div class="col-6 d-grid gap-2">
                        <button type="button" class="btn btn-danger" style="background-color: #104069">Crear expediente
                            nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
