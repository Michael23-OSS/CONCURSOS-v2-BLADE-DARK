<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CONTEST')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --black-dark: #0a0a0a;  /* Fondo general */
            --black-light: #1f1f1f; /* Navbar/Header/Footer */
            --red-main: #e60000;    /* Acentos y botones */
            --text-light: #fff;     /* Texto general */
        }

        body {
            background-color: var(--black-dark);
            color: var(--text-light);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar usuario */
        .navbar {
            background-color: var(--black-light);
        }

        .navbar-brand {
            color: var(--red-main) !important;
            font-weight: bold;
        }

        .navbar .text-white {
            color: var(--text-light) !important;
        }

        .btn-logout {
            background-color: var(--red-main);
            color: var(--text-light);
            border: none;
        }

        .btn-logout:hover {
            background-color: #ff3333;
            color: var(--text-light);
        }

        /* Contenido principal */
        .container {
            padding-top: 80px;
            padding-bottom: 60px;
        }

        /* Footer opcional */
        footer {
            background-color: var(--black-light);
            color: var(--red-main);
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        a {
            color: var(--red-main);
        }

        a:hover {
            color: #ff3333;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand fw-semibold">
                @yield('brand', 'CONTEST')
            </span>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white small">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="/logout" class="m-0">
                    @csrf
                    <button class="btn btn-logout btn-sm">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>Designed by Hacker Plus</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
