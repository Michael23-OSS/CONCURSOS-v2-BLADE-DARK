@extends('layouts.admin')

@section('title', 'Participantes - ' . $contest->title)

@section('content')
<!-- Header -->
<div class="mb-4">
    <h2 class="fw-bold" style="color: #e60000;">Participantes - {{ $contest->title }}</h2>
    <p class="text-light">
        Lista de usuarios que se han inscrito en este concurso
    </p>
</div>

<!-- Tabla -->
<div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="color: #fff;">
                <thead style="background-color: #2a2a2a; color: #e60000;">
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $p)
                        <tr>
                            <td class="fw-semibold">{{ $p->user->name }}</td>
                            <td>{{ $p->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Volver -->
<a href="/admin/contests" class="btn btn-red mt-4">
    Volver al panel
</a>
@endsection
