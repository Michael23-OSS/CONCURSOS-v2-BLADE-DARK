@extends('layouts.admin')

@section('title', 'Gestión de Concursos')

@section('styles')
<style>
/* ===== ADMIN DARK GLASS ===== */

.glass-card {
    background: rgba(201, 26, 26, 0.04);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 18px;
    border: 1px solid rgba(217, 255, 0, 0.12);
    box-shadow:
        0 15px 40px rgba(241, 37, 37, 0.25),
        inset 0 1px 0 rgba(255,255,255,0.08);
}

.table-dark-glass {
    color: #e0e0e0;
}

.table-dark-glass thead {
    background: linear-gradient(90deg, #ffffffff, #ffffffff);
    color: #000 !important;
}

.table-dark-glass thead th {
    border-bottom: 1px solid rgba(255,255,255,0.15);
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.05em;
}

.table-dark-glass tbody tr {
    transition: all 0.25s ease;
}

.table-dark-glass tbody tr:hover {
    background: rgba(255,255,255,0.07);
    transform: translateY(-2px);
}

.table-dark-glass th,
.table-dark-glass td {
    border-color: rgba(255,255,255,0.08);
    vertical-align: middle;
}

.btn-outline-red {
    color: #ff4d4d;
    border: 1px solid #ff4d4d;
    background: transparent;
    transition: all 0.25s ease;
}

.btn-outline-red:hover {
    background: #ff4d4d;
    color: #000;
}

.text-red {
    color: #ff4d4d !important;
}

.table-responsive {
    border-radius: 18px;
    overflow: hidden;
}

/* FIX BOOTSTRAP */
.table,
.table thead,
.table tbody,
.table tr,
.table th,
.table td {
    background-color: transparent !important;
}

.table-dark-glass tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.06) !important;
}

/* ===== IMAGEN ===== */
.contest-thumb {
    width: 70px;
    height: 45px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,0.25);
}

.no-image {
    width: 70px;
    height: 45px;
    border-radius: 8px;
    background: rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    color: #aaa;
}
</style>
@endsection

@section('content')

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-red">Gestión de Concursos</h2>
        <p class="text-light mb-0">Administración de concursos del sistema</p>
    </div>

    <a href="{{ route('admin.contests.create') }}" class="btn btn-outline-red fw-semibold">
        ➕ Crear concurso
    </a>
</div>

<!-- Tabla -->
<div class="card glass-card border-0">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 table-dark-glass">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Fechas</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($contests as $contest)
                        <tr>

                            <!-- IMAGEN FIX -->
                            <td>
                                <div style="width:70px;height:45px;">
                                    @if($contest->image)
                                        <img
                                            src="{{ Storage::url($contest->image) }}"
                                            alt="Imagen concurso"
                                            class="contest-thumb"
                                            loading="lazy"
                                            onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=&quot;no-image&quot;>Error</div>';"
                                        >
                                    @else
                                        <div class="no-image">Sin imagen</div>
                                    @endif
                                </div>
                            </td>

                            <td class="fw-semibold text-white">
                                {{ $contest->title }}
                            </td>

                            <td class="text-white">
                                <span class="d-block">
                                    <strong>Inicio:</strong>
                                    {{ $contest->start_date
                                        ? \Carbon\Carbon::parse($contest->start_date)->format('d/m/Y')
                                        : '—' }}
                                </span>
                                <span class="d-block">
                                    <strong>Fin:</strong>
                                    {{ $contest->end_date
                                        ? \Carbon\Carbon::parse($contest->end_date)->format('d/m/Y')
                                        : '—' }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex flex-column flex-md-row gap-2 justify-content-center">

                                    <a href="{{ route('admin.contests.edit', $contest->id) }}"
                                       class="btn btn-sm btn-outline-red">
                                        ✏️ Editar
                                    </a>

                                    <a href="{{ route('admin.contests.participants', $contest->id) }}"
                                       class="btn btn-sm btn-outline-red">
                                        👥 Participantes
                                    </a>

                                    <a href="{{ route('admin.contests.prize', $contest->id) }}"
                                       class="btn btn-sm btn-outline-red">
                                        🏆 Premio
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.contests.destroy', $contest->id) }}"
                                          onsubmit="return confirm('¿Seguro de eliminar este concurso?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-red">
                                            🗑 Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No hay concursos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Volver -->
<div class="text-center mt-3">
    <a href="/admin/dashboard" class="btn btn-red-outline w-100" style="background-color:#e4d1d1ff;">
        Volver al panel
    </a>
</div>

@endsection
