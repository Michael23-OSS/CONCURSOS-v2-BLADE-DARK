@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
<!-- Título -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Panel de Administración</h2>
    <p class="text-light">
        Gestión general del sistema
    </p>
</div>

<!-- Cards administrativas -->
<div class="row g-4">

    <!-- Gestionar Concursos -->
    <div class="col-12 col-md-3">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">📋 Concursos</h5>
                <p class="card-text text-light">
                    Crear, editar y administrar concursos.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #e4d1d1ff;">
                <a href="/admin/contests" class="btn btn-red w-100">
                    Gestionar concursos
                </a>
            </div>
        </div>
    </div>

    <!-- Gestionar Usuarios -->
    <div class="col-12 col-md-3">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">👥 Usuarios</h5>
                <p class="card-text text-light">
                    Crear, editar y eliminar usuarios del sistema.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #e4d1d1ff;">
                <a href="/admin/users" class="btn btn-red w-100">
                    Gestionar usuarios
                </a>
            </div>
        </div>
    </div>

    <!-- Reportes -->
    <div class="col-12 col-md-3">
        <div class="card h-100 shadow-sm border-0" style="background-color: #1f1f1f;">
            <div class="card-body">
                <h5 class="card-title" style="color: #e60000;">📊 Reportes</h5>
                <p class="card-text text-light">
                    Métricas y reportes del sistema.
                </p>
            </div>
            <div class="card-footer border-0" style="background-color: #e4d1d1ff;">
                <a href="{{ route('admin.metrics') }}" class="btn btn-red w-100">
                    Ver Reportes
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
