@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Carta Llamada</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex">
        <button class="btn btn-outline-dark" type="submit">Cancelar Carta</button>
    </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/crearUsuari.blade.css">
@endsection

@section('contenido')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <p class="col-12 fs-1">Crear Usuario</p>
    </div>


    <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label">Código</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>


            <label for="" class="col-2 col-form-label">Rol</label>
            <div class="col-4">
                <select class="form-select" aria-label="Default select example">

                    {{-- @foreach ($perfils as $perfil)

                            <option value="{{ $perfil ->id }}">{{ $perfil ->nom }}</option>

                    @endforeach --}}

                    <option selected>Operador</option>
                    <option value="1">Supervisor</option>
                    <option value="2">Administrador</option>
                  </select>
            </div>



        </div>
    </div>
    <div class="mt-3 justify-content-between">
        <div class="row">

            <label for="" class="col-2 col-form-label">Nombre</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

            <label for="" class="col-2 col-form-label">Apellidos</label>
            <div class="col-4">
            <input type="" class="form-control" id="">
            </div>

        </div>
    </div>

      <div class="mt-3 justify-content-evenly">
        <div class="row">

          <label for="" class="col-2 col-form-label">Contraseña:</label>
          <div class="col-5">
              <input type="password" class="form-control" id="">
          </div>

            {{-- <label class="col-2 form-check-label" for="defaultCheck1">
                Fuera de Catalunya
            </label> --}}
            <div class="form-check col-2 offset-md-1">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Activo?
                </label>
            </div>

        </div>
      </div>
      <div class="mt-3 justify-content-evenly">
        <div class="row">

          <label for="" class="col-2 col-form-label">Confirmar Contraseña:</label>
          <div class="col-5">
              <input type="password" class="form-control" id="">
          </div>

            {{-- <label class="col-2 form-check-label" for="defaultCheck1">
                Fuera de Catalunya
            </label> --}}
        </div>
      </div>

      <div class="mt-3 justify-content-center mt-4">
          <div class="row">
          <div class="col-4 d-grid offset-md-8">
              <button type="button" class="btn btn-danger" style="background-color: #104069">Crear usuario</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
