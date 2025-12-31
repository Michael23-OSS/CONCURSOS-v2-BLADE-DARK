@extends('layouts.dashboard')

@section('title', 'Mis Resultados')

@section('content')
<!-- Título -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Mis Resultados</h2>
    <p class="text-light">
        Historial de concursos ganados
    </p>
</div>

@if($prizes->isEmpty())
    <!-- Estado vacío -->
    <div class="alert" style="background-color: #2a2a2a; color: #570b0bff; border: 1px solid #444;">
        No has ganado ningún concurso aún.
    </div>
@else
    <!-- Tabla -->
    <div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="color: #a38e8eff;">
                    <thead style="background-color: #ffffffff; color: #e60000;">
                        <tr>
                            <th>Concurso</th>
                            <th>Premio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prizes as $prize)
                            <tr>
                                <td class="fw-semibold">
                                    {{ $prize->contest->title }}
                                </td>
                                <td>
                                    {{ $prize->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endif

<!-- Volver -->
<a href="/user/dashboard" class="btn btn-red mt-3">
    Volver al panel
</a>
@endsection
