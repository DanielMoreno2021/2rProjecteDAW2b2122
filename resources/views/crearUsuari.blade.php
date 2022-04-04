@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Crear Usuari</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex">
        <button class="btn btn-outline-dark" type="submit">Cancelar Carta</button>
    </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/crearUsuari.blade.css">
@endsection

@section('contenido')
    <form action="{{ action([App\Http\Controllers\UsuariController::class, 'store']) }}" method="POST">
        @csrf
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <p class="col-12 fs-1">Crear Usuari</p>
            </div>


            <div class="mt-3 justify-content-between">
                <div class="row">

                    <label for="" class="col-2 col-form-label">Codi</label>
                    <div class="col-4">
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>


                    <label for="" class="col-2 col-form-label">Rol</label>
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" id="rol" name="rol">

                            {{-- @foreach ($perfils as $perfil)

                            <option value="{{ $perfil ->id }}">{{ $perfil ->nom }}</option>

                    @endforeach --}}

                            <option value="1" selected>Operador</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Administrador</option>
                        </select>
                    </div>



                </div>
            </div>
            <div class="mt-3 justify-content-between">
                <div class="row">

                    <label for="" class="col-2 col-form-label">Nom</label>
                    <div class="col-4">
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>

                    <label for="" class="col-2 col-form-label">Cognoms</label>
                    <div class="col-4">
                        <input type="text" class="form-control" id="cognoms" name="cognoms">
                    </div>

                </div>
            </div>

            <div class="mt-3 justify-content-evenly">
                <div class="row">

                    <label for="" class="col-2 col-form-label">Contrasenya</label>
                    <div class="col-5">
                        <input type="password" class="form-control" id="contrassenya" name="contrassenya">
                    </div>

                    {{-- <label class="col-2 form-check-label" for="defaultCheck1">
                Fuera de Catalunya
            </label> --}}


                </div>
            </div>
            {{-- <div class="mt-3 justify-content-evenly">
                <div class="row">

                    <label for="" class="col-2 col-form-label">Confirmar Contraseña:</label>
                    <div class="col-5">
                        <input type="password" class="form-control" id="contrassenya" name="contrassenya">
                    </div>

                    {{-- <label class="col-2 form-check-label" for="defaultCheck1">
                Fuera de Catalunya
            </label> --}}
            {{-- </div>
            </div> --}}

            <div class="mt-3 justify-content-center mt-4">
                <div class="row">
                    <div class="col-4 d-grid offset-md-8">
                        <button type="submit" class="btn btn-danger" style="background-color: #104069">Crear
                            Usuari</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
