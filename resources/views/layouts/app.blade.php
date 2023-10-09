<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- ... resto del head ... -->
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.show') }}">👤 Perfil</a>
                        </li>
                         <!-- Enlace a las Notificaciones -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('notifications.index') }}">
            Notificaciones <span class="badge badge-light">{{ Auth::user()->unreadNotifications->count() }}</span>
        </a>
    </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif
                </ul>
            </div>
            
            @if (Auth::check())
            <div id="sidebar">
                <!-- Detalles del perfil -->
                <div id="profile-details" style="display:none;">

                    <!-- Datos del perfil -->
                <!-- Datos del perfil -->
                <p>Nombre: {{ Auth::user()->full_name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Tipo de Usuario: {{ Auth::user()->user_type }}</p>
                <p>Teléfono: {{ Auth::user()->phone }}</p>
                <
                <p>Género: {{ Auth::user()->gender == 'male' ? 'Masculino' : 'Femenino' }}</p>



                    <!-- ... otros detalles ... -->
                </div>
            </div>
            @endif
        </div>
        </nav>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<main class="py-4">
    @yield('content')
</main>
</div> <!-- cierra el div con id="app" -->

<script>
    function toggleProfile() {
        let details = document.getElementById("profile-details");
        if (details.style.display === "none") {
            details.style.display = "block";
        } else {
            details.style.display = "none";
        }
    }
</script>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- ... resto de los scripts ... -->
</body>
</html>
