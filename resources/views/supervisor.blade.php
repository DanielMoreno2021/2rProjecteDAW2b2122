<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/supervisor.blade.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cruzroja.png" type="image/png" height="100"/>
    <link rel="stylesheet" href="FontAwesome6.0.0/css/all.css">
</head>
<body style="font-family: Assistant;">
<!-- Navbar -->
<nav class="navbar navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="{{url('img/projectebrogginavbar.png')}}" width="100" class="img-fluid"
          alt="Sample image">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Nombre de ejemplo - </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mx-auto" href="#">Supervisor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>  
    <div>
      <form class="d-flex">
        <button class="btn btn-outline-dark" type="submit">Cerrar Sesión <i class="fa fa-sign-out"></i></button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Botones -->
<div class="container">
  <div class="row">
    <div class="col-6 text-center">
    <button type="button" class="btn btn-danger crearcartallamada">CREAR CARTA LLAMADA</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button type="button" class="btn btn-danger generargraficos" style="background-color: #104069;">GENERAR GRÁFICOS</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button type="button" class="btn btn-danger consultaexpediente" style="background-color: #104069;">CONSULTAR EXPEDIENTES</button>
    </div>
    <div class="col-6 col-offset-2 text-center">
    <button type="button" class="btn btn-danger consultaayuda" style="background-color: #104069;">CONSULTAR AYUDA</button>
    </div>
  </div>
</div>
<!-- End Botones -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{url('FontAwesome6.0.0/js/All.js')}}" crossorigin="anonymous"></script>
</html>