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
    <link rel="stylesheet" href="{{ asset('css/prendaper.css') }}">
    

</head>
<body style="background: #E4E4E4">
    <header>
        @if (Auth::guest())
        <a href="{{ route('registro') }}" id="registro">Registrarse</a>
        @endif
        @if (Auth::User())
        <img id="carrito" src="img/carrito.png" alt="">
        @endif
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
            
            @elseif (Auth::User()->type==1111)
                <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
            @endif
        </ul>
        </nav>
        
    </ul>
    @yield('content')
    <footer id="footer">
        <img src="img/logo.png" alt="" id="logoF">
        <ul id="empresa" style="list-style:none;">
            <span id="us">Sobre Nosotros</span>
            <li>Misión</li>
            <li>Visión</li>
            <li>Valores</li>
            <li>Terminos y condiciones de compra</li><br>
            <li id="correo">ropalindaDinamita@gmail.com</li>
        </ul>
    </footer>
    
    
</body>
</html>