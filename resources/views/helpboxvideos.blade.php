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
<div style="text-align: center; margin-top: 10px;">
        <button type="button" class="btn btn-primary">PARTE 1</button>
        <button type="button" class="btn btn-secondary">PARTE 2</button>
        <button type="button" class="btn btn-success">PARTE 3</button>
        <button type="button" class="btn btn-danger">PARTE 4</button>
        <button type="button" class="btn btn-warning">PARTE 5</button>
        <button type="button" class="btn btn-info">PARTE 6</button>
</div>
<div style="text-align: center;">
    <video width="500" height="450" controls="controls" poster="image" preload="true">
      <source src="../resources/videos/aguana.webm" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
</div>
 @endsection
