<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('styles')
</head>

<body style="background-image: url({{ asset('img/fondo.png') }}); background-size: cover; background-attachment: fixed;">
    {{-- encabezado --}}
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('pagina-principal') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="350">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 40%;">
                        @role('usuario')
                            @if (View::hasSection('href'))
                                @yield('href')
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="home">INICIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="favoritos">FAVORITOS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="misrecetas">MIS RECETAS</a>
                                </li>
                            @endif
                        @endrole
                    </ul>
                    <a class="navbar-brand" {{-- href="{{ route('pagina-principal') }}" --}}>
                        <img src="{{ asset('img/user.png') }}" alt="Bootstrap" width="70px">
                        <a class="nav-link dropdown-toggle" onmouseover="this.style.borderBottom = 'none';"
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </a>

                </div>
            </div>
        </nav>
        {{-- contenido --}}
        <div class="content">
            @yield('content')
            @yield('detail')
        </div>
    </header>
    {{-- footer --}}
    <footer class="footer">
        @yield('comments')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Contacto</h3>
                    <ul>
                        <li><a href="tel:+123456789">Teléfono: +123 456 789</a></li>
                        <li><a href="mailto:foodhub@example.com">Correo Electrónico: foodhub@example.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Enlaces Útiles</h3>
                    <ul>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>