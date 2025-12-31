@extends('layouts.admin')

@section('title', 'Acceso Administrador')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #0a0a0a;">

    <div class="card p-4 shadow-lg" style="width: 400px; background-color: #1f1f1f; border: 1px solid #444;">
        <h4 class="mb-3 text-center fw-bold" style="color: #e60000;">Acceso Administrador</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.access') }}">
            @csrf
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required
                    style="background-color: #e4d1d1ff; color: #fff; border: 1px solid #444;">
            </div>
            <button class="btn btn-dark w-100 fw-semibold" style="background-color: #e60000; border-color: #e60000;">
                Ingresar
            </button>
        </form>

        <div class="text-center mt-3">
        <a href="/admin/dashboard" class="btn btn-red-outline w-100" style="background-color: #e4d1d1ff;">
        Volver al panel
        </a>
        </div>

    </div>

</div>
@endsection
