@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Supervisor</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex" action="{{action([App\Http\Controllers\UsuariController::class,'logout'])}}" method="GET">
        <button class="btn btn-outline-dark" type="submit">Cerrar Sesión <i class="fa fa-sign-out"></i></button>
    </form>
@endsection

@section('bootstrap5.1')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/supervisor.blade.css">
@endsection

@section('contenido')
<div class="container">
  <div class="row">
    <div class="col-6 text-center">
    <button onclick="window.location.href='{{ url('/cartallamada') }}'" type="button" class="btn btn-danger crearcartallamada">CREAR CARTA LLAMADA</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button type="button" class="btn btn-danger generargraficos" style="background-color: #104069;">GENERAR GRÁFICOS</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button onclick="window.location.href='{{ url('/listaexpedientes') }}'" type="button" class="btn btn-danger consultaexpediente" style="background-color: #104069;">CONSULTAR EXPEDIENTES</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button onclick="window.location.href='{{ url('/helpboxvideos') }}'"  type="button" class="btn btn-danger consultaayuda" style="background-color: #104069;">CONSULTAR AYUDA</button>
    </div>
  </div>
</div>
@endsection
