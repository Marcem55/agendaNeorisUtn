<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Agenda de Contactos</title>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <h4 style="color: white; margin-left: 10px">Nuevo Contacto</h4>
        <a href="javascript:history.back()" style="text-decoration: none; color: #FFC107; margin: 10px">Volver al inicio</a>
    </nav>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('contactos.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" required maxlength="60">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required maxlength="90">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-warning" value="Guardar">
                        <input type="reset" class="btn btn-secondary" value="Restablecer cambios">
                    </div>
                    @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>
