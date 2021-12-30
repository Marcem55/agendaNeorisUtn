<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agenda de Contactos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/welcome.css') }}">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #212529;
        }
    </style>
</head>

<body class="antialiased">
    <!-- <div class="relative flex items-top justify-center min-h-screen bg-dark sm:items-center py-4 sm:pt-0"> -->
        @if (Route::has('login'))
            <nav class="navbar navbar-dark bg-dark mb-3">
                <h1>Agendapp</h1>
                <div>
                    @auth
                    <a href="{{ route('contactos.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Contactos</a>
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Perfil</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Sesión</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                    @endif
                    @endauth
                </div>
            </nav>
        @endif
        <div class="container">
            <div class="col-xl-6">
                <p>Bienvenido a la agenda de contactos. Registrate para acceder a los contactos!</p>
                <p>Si ya tenés una cuenta, inicia sesión.</p>
            </div>
        </div>
</body>

</html>
