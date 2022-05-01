@extends('plantillas.principal')

@section('titulodecadapagina')
    <title>Gestió de Usuaris</title>
@endsection

@section('botoncerrarsesion')
    <form class="d-flex" action="{{ action([App\Http\Controllers\UsuariController::class, 'logout']) }}"
        method="GET">
        <button class="btn btn-outline-dark" type="submit">Cerrar Sessió <i class="fa fa-sign-out"></i></button>
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
            type="button"><i class="fa-solid fa-plus"></i> Crear Usuari</button>
    </div>

    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Codi</td>
                        <td>Nom</td>
                        <td>Cognoms</td>
                        <td>Edició</td>
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
                            <td>
                                <form class="float-right"
                                    action="{{ action([App\Http\Controllers\UsuariController::class, 'edit'], ['gestionusuario' => $usuari->id]) }}"
                                    method="GET">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-edit "
                                            aria-hidden="true"></i>Modificar</button>
                                </form>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-nombre="{{ $usuari->nom }}"
                                    data-bs-whatever="{{ action([App\Http\Controllers\UsuariController::class, 'destroy'], ['gestionusuario' => $usuari->id]) }}">
                                    <i class="fa fa-trash " aria-hidden="true"></i>Esborrar</button>

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
            {{ $usuaris->links() }}
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="formBorrar" class="float-right ml-1" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash "
                                aria-hidden="true"></i>Esborrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            var recipient2 = button.getAttribute('data-bs-nombre')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('#exampleModalLabel')
            var form = exampleModal.querySelector('#formBorrar')
            form.setAttribute('action', recipient)

            modalTitle.textContent = 'Segur que vols eliminar a  ' + recipient2 + '?'
            modalBodyInput.value = recipient
        })
    </script>
@endsection
