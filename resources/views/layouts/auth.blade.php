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
            --black-light: #1f1f1f; /* Contenedor de formulario */
            --red-main: #e60000;    /* Botones y acentos */
            --text-light: #fff;     /* Texto general */
        }

        body {
            background-color: var(--black-dark);
            color: var(--text-light);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .auth-container {
            background-color: var(--black-light);
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
        }

        .auth-container h1 {
            color: var(--red-main);
            text-align: center;
            margin-bottom: 20px;
        }

        input.form-control {
            background-color: #2a2a2a;
            color: var(--text-light);
            border: 1px solid #444;
        }

        input.form-control:focus {
            border-color: var(--red-main);
            box-shadow: 0 0 0 0.2rem rgba(230,0,0,0.25);
        }

        .btn-red {
            background-color: var(--red-main);
            color: var(--text-light);
            border: none;
            width: 100%;
        }

        .btn-red:hover {
            background-color: #ff3333;
            color: var(--text-light);
        }

        a {
            color: var(--red-main);
        }

        a:hover {
            color: #ff3333;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="auth-container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
