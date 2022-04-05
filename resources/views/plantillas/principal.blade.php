<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>

    @yield('titulodecadapagina')
    @yield('bootstrap5.1')
    @yield('cssdecadapagina')


    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cruzroja.png" type="image/png" height="100"/>
    <link rel="stylesheet" href="FontAwesome6.0.0/css/all.css">
</head>

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
              <a class="navbar-brand mx-auto" href="#">{{Auth::user()->nom}} {{Auth::user()->cognoms}} - </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse1">
                  <span class="navbar-toggler-icon"></span>
              </button>
              @if (Auth::user()->perfils_id == 1)
                  <a class="navbar-brand mx-auto" href="#">Operador</a>
              @elseif ((Auth::user()->perfils_id == 3))
                  <a class="navbar-brand mx-auto" href="#">Administrador</a>
              @else
                  <a class="navbar-brand mx-auto" href="#">Supervisor</a>
              @endif

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                  <span class="navbar-toggler-icon"></span>
              </button>
          </div>
          <div>

          @yield('botoncerrarsesion')

    </div>
  </div>
</nav>
<body style="font-family: Assistant;">

@yield('contenido')

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@yield('javascript')

<script src="{{url('FontAwesome6.0.0/js/All.js')}}" crossorigin="anonymous"></script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
</html>
