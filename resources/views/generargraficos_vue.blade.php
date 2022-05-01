@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Generar Graficos</title>
@endsection

@section('botoncerrarsesion')
    <form>
        <input type="button" class="btn btn-outline-dark" value="Tornar Enrere" onclick="history.go(-1)">
    </form>
@endsection

@section('bootstrap5.1')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
@endsection

@section('cssdecadapagina')
    {{-- <link rel="stylesheet" href="../resources/css/cartallamada.blade.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@endsection

@section('contenido')
<div class="container generargraficos" id="app">

   <generar-graficos></generar-graficos>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
