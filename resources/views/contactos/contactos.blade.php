<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/paginate.css') }}">
    <title>Agenda de Contactos</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark mb-3">
            <h4 style="color: white; margin-left: 10px">{{$titulo}}</h4>
            <a href="{{route('contactos.create')}}" style="text-decoration: none; color: #FFC107; margin: 10px">Añadir contacto</a>
        </nav>
        <div class="row">
            <div class="col-lx-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="tablaContactos">
                        <thead class="bg-dark" style="color: #FFC107;">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($contactos) <= 0) <tr>
                                <td colspan="8">No hay resultados</td>
                                </tr>
                                @else
                                @foreach($contactos as $contacto)
                                <tr>
                                    <td>{{$contacto->nombre}}</td>
                                    <td>{{$contacto->apellido}}</td>
                                    <td>{{$contacto->telefono}}</td>
                                    <td>{{$contacto->email}}</td>
                                    <td>{{$contacto->direccion}}</td>
                                    <td>
                                        <a href="{{route('contactos.edit', $contacto->id)}}" class="btn btn-warning btn-sm"><img src="https://img.icons8.com/material-two-tone/24/000000/edit--v1.png" /></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$contacto->id}}">
                                            <img src="https://img.icons8.com/material-outlined/24/000000/filled-trash.png" />
                                        </button>
                                    </td>
                                </tr>
                                @include('contactos.delete-contacto')
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="/cursoFullStack/agenda/public" class="btn btn-secondary my-5">Página principal</a>

        <!-- DataTables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tablaContactos').DataTable({
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "Todas"]
                    ],
                    "drawCallback": function(settings) {
                        $('ul.pagination').addClass("pagination-sm warning");
                    },
                    // "responsive": true,
                    "language": {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Contactos",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ contactos totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Contactos",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
