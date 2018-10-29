<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>Principal</title>
    <link rel="stylesheet" href="/css/principal.css">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('img/principal.jpg') }}">

</head>
<body style="background: #efe3ed">
    <header style="background: #a163bd">
        
        <label for="">Ropa Linda</label>  
        <nav id="menu">
        <ul>
            <li><a href="{{ route('principal') }}">Inicio</a></li>
            <li><a href="#">Acerca de</a></li>
            <li><a href="#">Catalogos</a></li>
            <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
            <li><a href="{{ route('registro') }}">Registrarse</a></li>
        </ul>
        </nav>
        
    </header>
    @yield('content')
    
</body>
</html>