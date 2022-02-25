    @extends('plantillas.principal')

    @section('titulodecadapagina')
        <title>Administrador</title>
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
        <link rel="stylesheet" href="../resources/css/administrador.blade.css">
    @endsection


@section('contenido')
<div class="container">
  <div class="row">
    <div class="col-12 text-center">
    <button type="button" class="btn btn-danger gestionarusuarios">GESTIONAR USUARIOS</button>
    </div>
    <div class="col-12 col-offset-2 text-center">
    <button type="button" class="btn btn-danger opcionesdeusuario" style="background-color: #104069;">OPCIONES DE USUARIO</button>
    </div>
  </div>
</div>
<!-- End Botones -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{url('FontAwesome6.0.0/js/All.js')}}" crossorigin="anonymous"></script>
</html>
