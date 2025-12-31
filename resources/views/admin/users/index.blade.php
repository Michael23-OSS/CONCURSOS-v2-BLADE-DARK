@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container py-5">

    <h2 class="mb-4">Usuarios</h2>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Crear usuario -->
    <div class="mb-4">
        <h5>Crear nuevo usuario</h5>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="col-md-2">
                    <select name="role" class="form-select" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-dark w-100">Crear</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabla de usuarios -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                                @csrf
                                @method('PUT')
                                <td>{{ $user->id }}</td>
                                <td><input type="text" name="name" value="{{ $user->name }}" class="form-control"></td>
                                <td><input type="email" name="email" value="{{ $user->email }}" class="form-control"></td>
                                <td>
                                    <select name="role" class="form-select form-select-sm">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </td>
                                <td class="d-flex gap-1">
                                    <input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
                                    <button class="btn btn-success btn-sm">Guardar</button>
                            </form>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Volver -->
    <div class="text-center mt-3">
    <a href="/admin/dashboard" class="btn btn-red-outline w-100" style="background-color: #e4d1d1ff;">
    Volver al panel
    </a>
    </div>

</div>
@endsection
