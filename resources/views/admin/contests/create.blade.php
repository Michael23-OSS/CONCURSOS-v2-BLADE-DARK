@extends('layouts.admin')

@section('title', 'Crear Concurso')

@section('content')
<!-- Título -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Crear Concurso</h2>
    <p class="text-light">
        Registro de nuevo concurso
    </p>
</div>

<div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body">

        <!-- Formulario -->
        <form method="POST" action="{{ route('admin.contests.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Título -->
            <div class="mb-3">
                <label class="form-label text-light">Título</label>
                <input 
                    type="text" 
                    name="title" 
                    class="form-control"
                    placeholder="Título del concurso"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label class="form-label text-light">Descripción</label>
                <textarea 
                    name="description" 
                    class="form-control"
                    rows="3"
                    placeholder="Descripción del concurso"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                ></textarea>
            </div>

            <!-- Reglas -->
            <div class="mb-3">
                <label class="form-label text-light">Reglas</label>
                <textarea 
                    name="rules" 
                    class="form-control"
                    rows="4"
                    placeholder="Reglas del concurso"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                ></textarea>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label class="form-label text-light">Imagen del concurso</label>
                <input 
                    type="file" 
                    name="image" 
                    class="form-control"
                    accept="image/*"
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
                <small class="text-muted">
                    Formatos permitidos: jpg, png, webp (máx. 2MB)
                </small>
            </div>

            <!-- Fechas -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-light">Fecha de inicio</label>
                    <input 
                        type="date" 
                        name="start_date" 
                        class="form-control"
                        required
                        style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                    >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label text-light">Fecha de fin</label>
                    <input 
                        type="date" 
                        name="end_date" 
                        class="form-control"
                        required
                        style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                    >
                </div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.contests.index') }}" class="btn btn-outline-secondary" style="background-color: #e4d1d1ff;">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-red fw-semibold" style="background-color: #e4d1d1ff;">
                    Guardar concurso
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
