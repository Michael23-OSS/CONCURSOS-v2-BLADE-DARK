@extends('layouts.app') <!-- Usa tu layout principal de usuario -->

@section('title', 'Mis Notificaciones')

@section('content')
<div class="container py-5">

    <!-- Título -->
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #e60000;">Mis Notificaciones</h2>
        <p class="text-light">
            Comunicaciones y actualizaciones del sistema
        </p>
    </div>

    @if($notifications->isEmpty())
        <!-- Estado vacío -->
        <div class="alert" style="background-color: #2a2a2a; color: #fff; border: 1px solid #444;">
            No tienes notificaciones.
        </div>
    @else
        <div class="list-group">
            @foreach($notifications as $notification)
                <div class="list-group-item shadow-sm mb-2 rounded" style="background-color: #1f1f1f; color: #fff;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold" style="color: #e60000;">{{ $notification->data['title'] }}</h6>
                        <small class="text-light">
                            {{ \Carbon\Carbon::parse($notification->created_at)->timezone('America/Guayaquil')->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    <p class="mb-0 text-light">{{ $notification->data['message'] }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Volver -->
    <a href="/user/dashboard" class="btn btn-red mt-4">
        Volver al panel
    </a>

</div>
@endsection
