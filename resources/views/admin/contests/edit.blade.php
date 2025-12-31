@extends('layouts.admin')

@section('title', 'Editar Concurso')

@section('content')
<!-- Título -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Editar Concurso</h2>
    <p class="text-light">
        Actualiza la información del concurso
    </p>
</div>

<div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body">

        <!-- Formulario -->
        <form method="POST" action="{{ route('admin.contests.update', $contest->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="mb-3">
                <label class="form-label text-light">Título</label>
                <input 
                    type="text" 
                    name="title" 
                    class="form-control"
                    value="{{ old('title', $contest->title) }}"
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
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >{{ old('description', $contest->description) }}</textarea>
            </div>

            <!-- Reglas -->
            <div class="mb-3">
                <label class="form-label text-light">Reglas</label>
                <textarea 
                    name="rules" 
                    class="form-control"
                    rows="4"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >{{ old('rules', $contest->rules) }}</textarea>
            </div>

            <!-- Imagen actual -->
            @if($contest->image)
                <div class="mb-3">
                    <label class="form-label text-light">Imagen actual</label><br>
                    <img 
                        src="{{ asset('storage/'.$contest->image) }}" 
                        class="img-fluid rounded"
                        style="max-height: 200px; border: 1px solid #444;"
                    >
                </div>
            @endif

            <!-- Cambiar imagen -->
            <div class="mb-3">
                <label class="form-label text-light">Cambiar imagen</label>
                <input 
                    type="file" 
                    name="image" 
                    class="form-control"
                    accept="image/*"
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
                <small class="text-muted">
                    Deja vacío si no deseas cambiar la imagen
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
                        value="{{ old('start_date', $contest->start_date->format('Y-m-d')) }}"
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
                        value="{{ old('end_date', $contest->end_date->format('Y-m-d')) }}"
                        required
                        style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                    >
                </div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.contests.index') }}" 
                   class="btn btn-outline-secondary" 
                   style="color: #e60000; border-color: #e60000;">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-red fw-semibold" style="background-color: #e4d1d1ff;">
                    Actualizar concurso
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
