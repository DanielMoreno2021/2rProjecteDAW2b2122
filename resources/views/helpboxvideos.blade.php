@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>HelpBox Videos</title>
@endsection

@section('botoncerrarsesion')
        <form>
            <input type="button" class="btn btn-outline-dark" value="Volver Atrás" onclick="history.go(-1)">
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
          <h5 class="modal-title">Selecciona una opción</h5>
        </div>
        <div class="modal-body">
            <div class="row justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcion1" type="button" class="btn btn-primary">Me encuentro mal del estómago y quería pedir cita para el médico.</button>
                </div>
                <div class="col-5 text-center">
                <button id="opcion2" type="button" class="btn btn-primary">Soy Joseba García , del Hospital Don Miguel, necesitamos una ambulancia.</button>
                </div>
            </div>
            <div class="row my-5 justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcion3" type="button" class="btn btn-primary" >¿Llevamos un buen rato esperando la ambulancia, dónde están?</button>
                </div>
                <div class="col-5 text-center">
                <button id="opcion4" type="button" class="btn btn-primary">Ha habido un choque entre un bus y un coche, y el conductor no responde!</button>
                </div>
            </div>
            <div class="row my-5 justify-content-center">
                <div class="col-5 text-center">
                <input type="button" class="btn btn-danger " value="Salir" onclick="history.go(-1)">
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
            <h5 class="modal-title">Quieres escuchar otra respuesta?</h5>
        </div>
        <div class="modal-body">
            <div class="row justify-content-evenly">
                <div class="col-5 text-center">
                <button id="opcionSeguir" type="button" class="btn btn-primary">Sí, seguir.</button>
                </div>
                <div class="col-5 text-center">
                    <input type="button" class="btn btn-danger" value="No, quiero volver" onclick="history.go(-1)">
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin-top: 10px;">
        <button type="button btn-lg" class="btn btn-primary">Manual de Ayuda</button>
        <button type="button btn-lg" class="btn btn-danger">Examen</button>
</div>
<div style="text-align: center;">
    <video width="50%" height="auto" controls="controls" poster="image" preload="true" id="videoAyuda">
      <source src="../resources/videos/Proyecto.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
</div>


<script src="../resources/js/helpboxvideos.js"> </script>

 @endsection
