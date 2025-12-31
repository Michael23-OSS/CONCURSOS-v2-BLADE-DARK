@extends('layouts.auth')

@section('title', 'Registro de Usuario')

@section('content')
<div class="card shadow-lg border-0" style="max-width: 450px; width: 100%; background-color: #1f1f1f;">
    <div class="card-body p-4">

        <!-- Título -->
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #e60000;">CONTEST</h3>
            <p class="text-light small">Registro de usuario</p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label text-light">Nombre</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control"
                    placeholder="Nombre completo"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

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
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Confirmar Password -->
            <div class="mb-3">
                <label class="form-label text-light">Confirmar contraseña</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-red fw-semibold">
                    Registrarse
                </button>
            </div>
        </form>

        <!-- Login -->
        <div class="text-center mt-3">
            <small>
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="fw-semibold" style="color: #e60000; text-decoration: none;">
                    Iniciar sesión
                </a>
            </small>
        </div>

    </div>
</div>
@endsection
