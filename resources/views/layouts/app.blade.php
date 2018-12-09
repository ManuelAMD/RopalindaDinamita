<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Principal</title>
    <link rel="stylesheet" href="/css/principal.css">
    <link href="https://fonts.googleapis.com/css?family=Spinnaker" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('img/principal.jpg') }}">

</head>
<body style="background: #E4E4E4">
    <header>
        <a href="{{ route('registro') }}" id="registro">Registrarse</a>
        <img id="carrito" src="img/carrito.png" alt="">
    </header>
    <ul style="background: #242323" id="banner">
        <a href="{{ route('principal') }}">
        <img id="logo" src="img/logo.png" alt="">
        </a> 
        <nav id="menu">
        <ul>
            <li><a href="{{ route('principal') }}">Inicio</a></li>
            <li><a href="#">Catálogo</a></li>
            <li><a href="#">Personalizar</a></li>
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                
            @else
                <li><a href="{{ route('info') }}">Información de usuario</a></li>
                <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
            @endif
        </ul>
        </nav>
        
    </ul>
    @yield('content')
    
    
</body>
</html>