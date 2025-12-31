@extends('layouts.dashboard')

@section('title', 'Panel de Usuario')

@section('content')
<!-- Bienvenida -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">
        Bienvenido, {{ auth()->user()->name }}
    </h2>
    <p class="text-light">
        Accede rápidamente a las funciones principales del sistema
    </p>
</div>

<!-- Cards -->
<div class="row g-4">

    <!-- Concursos -->
    <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">🎯 Concursos</h5>
                <p class="card-text text-light">
                    Revisa los concursos disponibles y participa.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #2a2a2a;">
                <a href="/contests" class="btn btn-red w-100" style="background-color: #e4d1d1ff;">
                    Ver concursos
                </a>
            </div>
        </div>
    </div>

    <!-- Resultados -->
    <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">🏆 Resultados</h5>
                <p class="card-text text-light">
                    Consulta tus resultados y premios obtenidos.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #2a2a2a;">
                <a href="/my-results" class="btn btn-red w-100" style="background-color: #e4d1d1ff;">
                    Mis resultados
                </a>
            </div>
        </div>
    </div>

    <!-- Notificaciones -->
    <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">🔔 Notificaciones</h5>
                <p class="card-text text-light">
                    Mantente informado sobre novedades.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #2a2a2a;">
                <a href="/notifications" class="btn btn-red w-100" style="background-color: #e4d1d1ff;">
                    Ver notificaciones
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
