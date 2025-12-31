<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CONTEST')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ CSS DE LAS VISTAS (ESTO FALTABA) -->
    @yield('styles')

    <style>
        /* Colores base */
        :root {
            --black-dark: #0a0a0a;
            --black-light: #1f1f1f;
            --red-main: #e60000;
            --text-light: #ffffff;
        }

        body {
            background-color: var(--black-dark);
            color: var(--text-light);
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--black-light);
            padding-top: 60px;
            z-index: 200;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: var(--text-light);
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: var(--red-main);
            color: var(--text-light);
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 60px;
            background-color: var(--black-light);
            color: var(--red-main);
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 1.4rem;
            z-index: 150;
            box-shadow: 0 2px 8px rgba(0,0,0,0.8);
        }

        /* Contenido */
        .content {
            margin-left: 250px;
            padding: 90px 25px 80px 25px;
            min-height: 100vh;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 250px;
            right: 0;
            background-color: var(--black-light);
            color: var(--red-main);
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.8);
        }

        
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">Usuarios</a>
        <a href="{{ route('admin.contests.index') }}">Concursos</a>

        <form method="POST" action="/logout" class="m-0 mt-3 px-3">
            @csrf
            <button class="btn btn-danger w-100">Cerrar sesión</button>
        </form>
    </div>

    <!-- Header -->
    <header>
        @yield('title', 'CONTEST')
    </header>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        Designed by Hacker Plus
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
