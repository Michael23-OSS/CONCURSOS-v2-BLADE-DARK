@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
<div class="card shadow-lg border-0" style="max-width: 420px; width: 100%; background-color: #1f1f1f;">
    <div class="card-body p-4">

        <!-- Título -->
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #e60000;">CONTEST</h3>
            <p class="text-light small">Ingresa con tus credenciales</p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-light">Correo electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="correo@empresa.com"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label text-light">Contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control"
                    placeholder="••••••••"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-red fw-semibold">
                    Iniciar sesión
                </button>
            </div>
        </form>

        <!-- Registro -->
        <div class="text-center mt-3">
            <small>
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="fw-semibold" style="color: #e60000; text-decoration: none;">
                    Regístrate
                </a>
            </small>
        </div>

    </div>
</div>
@endsection
