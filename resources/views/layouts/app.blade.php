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
            --black-dark: #0a0a0a;  /* Fondo principal */
            --black-light: #1f1f1f; /* Header/Footer si se usan */
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

        header {
            background-color: var(--black-light);
            color: var(--red-main);
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
        }

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
            text-decoration: none;
        }

        a:hover {
            color: #ff3333;
        }

        .btn-red {
            background-color: var(--red-main);
            color: var(--text-light);
            border: none;
        }

        .btn-red:hover {
            background-color: #ff3333;
            color: var(--text-light);
        }

        .content {
            padding: 80px 20px 60px 20px; /* espacio para header/footer */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>CONTEST</header>

    <!-- Contenido principal -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>Designed by Hacker Plus</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
