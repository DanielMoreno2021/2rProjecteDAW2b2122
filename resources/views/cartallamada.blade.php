<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta Llamada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/cartallamada.blade.css">
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
        <a class="navbar-brand mx-auto" href="#">Carta Llamada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>  
    <div>
      <form class="d-flex">
        <button class="btn btn-outline-dark" type="submit">Cancelar Carta</button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="container" style="margin-top: 10px;">
  <div class="row">
    <div class="col-2">
    <p>Tipo de Emergencia</p>
    </div>
    <div class="col-4">
        <div class="dropdown d-grid gap-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Buscar ...
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
    <div class="col-2">
    <p>Emergencia</p>
    </div>
    <div class="col-4">
        <div class="dropdown d-grid gap-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Buscar ...
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>

    <form>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nota Comuna</label>
            <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
    </form>
    <div class="my-2 d-flex justify-content-between">
    <div class="col-4">
    <p>Localización</p>
    </div>
    <div class="col-4 d-grid gap-2">
        <button type="button" class="btn btn-danger" style="background-color: #104069">Abrir Mapa</button>
    </div>
    <div class="col-3 offset-1 form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Fuera de Catalunya
        </label>
    </div>
    </div>
    <div class="my-2 d-flex justify-content-between">
        <div class="col-4 row">
            <label for="" class="col-4 col-form-label">Provincia</label>
            <div class="col-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
        <div class="col-4 row">
            <label for="" class="col-4 col-form-label">Comarca</label>
            <div class="col-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
        <div class="col-4 row">
            <label for="" class="col-4 col-form-label">Municipio</label>
            <div class="col-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="my-2 d-flex justify-content-between">
        <div class="col-6 row">
            <label for="" class="col-4 col-form-label">Descripción</label>
            <div class="col-sm-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
        <div class="col-5 offset-1 row">
            <label for="" class="col-2 col-form-label">Detalles</label>
            <div class="col-sm-10">
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
    <div class="my-2 d-flex justify-content-between">
        <div class="col-6 row">
            <label for="" class="col-4 col-form-label">Telefono</label>
            <div class="col-sm-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
        <div class="col-6 row">
            <label for="" class="col-4 col-form-label">Alertante</label>
            <div class="col-sm-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="my-2 d-flex justify-content-between">
        <div class="col-6 row">
            <label for="" class="col-4 col-form-label">Nombre</label>
            <div class="col-sm-8">
            <input type="" class="form-control" id="">
            </div>
        </div>
        <div class="col-5 row">
            <button type="button" class="btn btn-danger" style="background-color: #104069">Registrar/Antecedentes</button>
        </div>
    </div>
    <div class="my-2 d-flex justify-content-center">
        <div class="col-4 row">
            <button type="button" class="btn btn-danger" style="background-color: #104069">Añadir a un expediente</button>
        </div>
        <div class="col-4 offset-1 row">
            <button type="button" class="btn btn-danger" style="background-color: #104069">Crear expediente nuevo</button>
        </div>
    </div>
  </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{url('FontAwesome6.0.0/js/All.js')}}" crossorigin="anonymous"></script>
</html>