@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>HelpBox Videos</title>
@endsection

@section('botoncerrarsesion')
        <form>
            <input type="button" class="btn btn-outline-dark" value="Tornar Enrere" onclick="history.go(-1)">
        </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/helpboxvideos.blade.css">
@endsection


@section('contenido')

<div class="modal" id="modalInicio" tabindex="-1" aria-labelledby="modalInicioLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Selecciona una opció</h5>
        </div>
        <div class="modal-body">
            <div class="row justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcion1" type="button" class="btn btn-primary">Em trobo malament de l'estómac i volia demanar cita per al metge.</button>
                </div>
                <div class="col-5 text-center">
                <button id="opcion2" type="button" class="btn btn-primary">Sóc Joseba García, de l'Hospital Don Miguel, necessitem una ambulància.</button>
                </div>
            </div>
            <div class="row my-5 justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcion3" type="button" class="btn btn-primary">Fa una bona estona que esperem l'ambulància, on són?</button>
                </div>
                <div class="col-5 text-center">
                <button id="opcion4" type="button" class="btn btn-primary">Hi ha hagut un xoc entre un bus i un cotxe, i el conductor no respon!</button>
                </div>
            </div>
            <div class="row my-5 justify-content-center">
                <div class="col-5 text-center">
                <input type="button" class="btn btn-danger" value="Sortir" onclick="history.go(-1)">
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="modal" id="modalVolver" tabindex="-1" aria-labelledby="modalInicioLabel" aria-hidden="true" data-bs-backdrop="static">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="color:black">Vols escoltar una altra resposta?</h5>
        </div>
        <div class="modal-body">
            <div class="row justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcionSeguir" type="button" class="btn btn-primary">Si, seguir.</button>
                </div>
                <div class="col-5 text-center">
                    <input type="button" class="btn btn-danger" value="No, vull tornar." onclick="history.go(-1)">
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin-top: 20px;">
    <video width="50%" height="auto" poster="image" preload="true" id="medio">
      <source src="../resources/videos/Proyecto.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <nav>
		<input type="button" class="botonesvideo" id="reiniciar" value="Reiniciar">
		<input type="button" class="botonesvideo" id="retrasar" value="&laquo;">
		<input type="button" class="botonesvideo" id="play" value="&#9658;">
		<input type="button" class="botonesvideo" id="adelantar" value="&raquo;">
		<input type="button" class="botonesvideo" id="silenciar" value="Silenciar">
		<input type="button" class="botonesvideo" id="dessilenciar" value="Activar Volumen">
        <br><br>
            Tiempo actual: <span id="tiempo"></span> || Tiempo total: <span id="tiempoTotal"></span>
        <br>
        <label id="timer" for="progress" role="timer"></label>
        <progress id="progress" max="100" value="0">Progress</progress>
    </nav>
</div>


<script src="../resources/js/helpboxvideos.js"> </script>

 @endsection
