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
    <link rel="stylesheet" href="{{ asset('js/principal.js')}}">
    <link rel="stylesheet" href="{{ asset('img/slide2.png') }}">
    <link rel="stylesheet" href="{{ asset('img/slide3.png') }}">
    

</head>
<body style="background: #E4E4E4">
    <header>
        @if (Auth::guest())
        <a href="{{ route('create') }}" id="registro">Registrarse</a>
        @else (Session::get(type)=='1111')
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
            <!--para el tipo de usuario de hace esto:  Session::get('type')-->
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            
            @elseif (Session::get('type') =='999')
            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Administrador <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('home')}}">Usuarios</a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>        
                </ul>
            </li>
            @elseif (Session::get('type') =='444')
                <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Diseñador<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('prendas/Prenda/create')}}">Registrar Prenda</a></li>
                            <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>        
                        </ul>
                
            @elseif (Session::get('type') =='111')
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{Session::get('nombre')}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('home')}}">Mis Prendas</a></li>
                            <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>        
                        </ul>
                    </li>
                    
            @endif
        </ul>
        </nav>
        
    </ul>
    <br>
    @yield('content')
    <br>
    <footer class="footer">
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