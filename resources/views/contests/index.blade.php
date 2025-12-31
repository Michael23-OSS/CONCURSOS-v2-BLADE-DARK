@extends('layouts.app') <!-- Usa tu layout principal de usuario -->

@section('title', 'Concursos Disponibles')

@section('content')
<div class="container py-5">

    <!-- Título -->
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #e60000;">Concursos Disponibles</h2>
        <p class="text-light">
            Participa en los concursos activos
        </p>
    </div>

    <!-- Alertas -->
    @if(session('success'))
        <div class="alert" style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert" style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Cards de concursos -->
    <div class="row g-4">
        @foreach($contests as $contest)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm h-100" style="background-color: #1f1f1f;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" style="color: #e60000;">{{ $contest->title }}</h5>
                        <p class="card-text text-light mb-2">{{ $contest->description }}</p>
                        <p class="card-text text-light small mb-2">
                            <strong>Reglas:</strong> {{ $contest->rules }}
                        </p>
                        <p class="card-text text-light small mb-4">
                            <strong>Fechas:</strong> 
                            {{ \Carbon\Carbon::parse($contest->start_date)->format('d/m/Y') }} – 
                            {{ \Carbon\Carbon::parse($contest->end_date)->format('d/m/Y') }}
                        </p>
                        <form method="POST" action="/contests/{{ $contest->id }}/participate" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-red w-100">
                                Participar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Volver -->
    <a href="/user/dashboard" class="btn btn-red mt-4">
        Volver al panel
    </a>

</div>
@endsection
