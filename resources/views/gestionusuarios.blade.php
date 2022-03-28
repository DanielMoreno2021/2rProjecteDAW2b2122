@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Gestion de Usuarios</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex" action="{{ action([App\Http\Controllers\UsuariController::class, 'logout']) }}"
        method="GET">
        <button class="btn btn-outline-dark" type="submit">Cerrar Sesión <i class="fa fa-sign-out"></i></button>
    </form>
@endsection

@section('bootstrap5.1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('cssdecadapagina')
    <link rel="stylesheet" href="../resources/css/gestionusuarios.blade.css">
@endsection

@section('contenido')
    <div class="container text-center" style="margin-top: 30px;">
        <button onclick="window.location.href='{{ url('gestionusuarios/create') }}'" class="btn btn-success"
            type="button"><i class="fa-solid fa-plus"></i> Crear Usuario</button>
    </div>

    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Código</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Contraseña</td>
                        <td>Edición</td>
                        <td>Rol</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuaris as $usuari)
                        <tr>
                            <td>{{ $usuari->id }}</td>
                            <td>{{ $usuari->codi }}</td>
                            <td>{{ $usuari->nom }}</td>
                            <td>{{ $usuari->cognoms }}</td>
                            <td>{{ $usuari->contrassenya }}</td>
                            <td>
                                <button class="btn btn-secondary" type="button"><i class="fa-solid fa-pen-to-square"></i>
                                    Modificar</button>
                                <form class="float-right ml-1"
                                    action="{{ action([App\Http\Controllers\UsuariController::class, 'destroy'], ['usuari' => $usuari->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash "
                                            aria-hidden="true"></i>Esborrar</button>
                                </form>
                            </td>
                            <td>
                                @if ($usuari->perfils_id == 1)
                                    Operador
                                @elseif ($usuari->perfils_id == 2)
                                    Supervisor
                                @else
                                    Administrador
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
