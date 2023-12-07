<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <style>
        a {
            text-decoration: none;
        }

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }

        #boton-flotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            /* Elimina la subrayado del enlace */
        }

        #boton-flotante:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">&nbsp;&nbsp;Prestamos ITA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{'home'}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('solicitar-prestamo') }}">Solicitar un prestamo</a>
                </li>
                <li class="nav-item navbar-divider"><span style="font-size: 3.5vh;">|</span></li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ver-prestamos')}}">Mis Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pagos') }}">Mis Pagos</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Mis Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Mis Pagos</a>
                </li>
                @endguest


            </ul>

        </div>
        @guest
        <div>
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-0">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button type="button" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-0">Register</button>
            </a>
        </div>

        @endguest
        @auth
        <!-- Informacion de perfil y btn de logout -->
        <div>
            <span class="navbar-text">
                {{auth()->user()->name}}
            </span>
            &nbsp;
            <a href="{{ route('logout' )}}">
                <button type="button" class="btn btn-outline-danger">Log Out</button>
            </a>
        </div>
        @endauth
        &nbsp;
        &nbsp;
    </nav>
    @yield('content')

    <!-- footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2023 Tu Empresa. Todos los derechos reservados.</p>
        </div>
    </footer>
    

    @yield('script')

</body>


</html>