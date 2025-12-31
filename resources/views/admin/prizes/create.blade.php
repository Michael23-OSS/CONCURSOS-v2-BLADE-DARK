@extends('layouts.admin')

@section('title', 'Asignar Premio - ' . $contest->title)

@section('content')
<!-- Header -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Asignar Premio - {{ $contest->title }}</h2>
    <p class="text-light">
        Selecciona el ganador y define la descripción del premio
    </p>
</div>

<div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body">

        <!-- Formulario -->
        <form method="POST" action="{{ route('admin.contests.assignPrize', $contest->id) }}">
            @csrf

            <!-- Ganador -->
            <div class="mb-3">
                <label class="form-label text-light">Ganador</label>
                <select 
                    name="winner_user_id" 
                    class="form-select"
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
                    @foreach($participants as $p)
                        <option value="{{ $p->user->id }}">
                            {{ $p->user->name }} ({{ $p->user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Descripción del premio -->
            <div class="mb-3">
                <label class="form-label text-light">Descripción del premio</label>
                <input 
                    type="text" 
                    name="description" 
                    class="form-control"
                    placeholder="Ej: Smartphone, Gift Card, etc."
                    required
                    style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;"
                >
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.contests.index') }}" class="btn btn-outline-red">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-red fw-semibold" style="background-color: #e4d1d1ff;">
                    Asignar Premio
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
