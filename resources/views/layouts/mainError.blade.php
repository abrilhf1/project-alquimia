<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Alquimia</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?= url('img/favicon/alquimia-logo.ico') ?>">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/app.css') ?>">
    <!--PWA-->
    @laravelPWA
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg visually-hidden">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menu de navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('nosotros') }}">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="navbar-brand">
                            <a href="{{ route('home') }}"></a>
                        </li>
                        @auth()
                            @if (auth()->user()->roles_id == 1)
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="text-decoration-none">Volver a mi perfil administrador</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link btn"
                                            type="submit">{{ auth()->user()->nombre }} - Cerrar Sesión<ion-icon name="log-out-outline"></ion-icon></button>
                                    </form>
                                </li>
                            @elseif(auth()->user()->roles_id == 2)
                                <li class="nav-item">
                                    <a href="{{ route('consumidor.index') }}" class="btn">Volver a mi perfil
                                        consumidor</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link btn"
                                            type="submit">{{ auth()->user()->nombre }} - Cerrar Sesión<ion-icon name="log-out-outline"></ion-icon></button>
                                    </form>
                                </li>
                            @elseif(auth()->user()->roles_id == 3)
                                <li class="nav-item">
                                    <a href="{{ route('donador.index') }}" class="btn">Volver a mi perfil donante</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link btn"
                                            type="submit">{{ auth()->user()->nombre }} - Cerrar Sesión<ion-icon name="log-out-outline"></ion-icon></button>
                                    </form>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('empresas.empresas') }}">Empresas Ecofriendly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('auth.login') }}">Iniciar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('auth.register') }}">Registrarse</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>

            @yield('main')
        </main>
        <footer class="footer visually-hidden">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
