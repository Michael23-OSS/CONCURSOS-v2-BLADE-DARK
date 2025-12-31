<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Vista principal de usuarios
    public function index(Request $request)
    {
        // Revisamos si la contraseña ya fue ingresada en sesión
        if (!$request->session()->get('admin_user_access')) {
            return view('admin.users.password');
        }

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Validar contraseña de acceso
    public function checkAccess(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if ($request->password === 'RIS2364T') {
            $request->session()->put('admin_user_access', true);
            return redirect()->route('admin.users');
        }

        return back()->withErrors(['password' => 'Contraseña incorrecta']);
    }

   // Crear nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin', // <-- Añadido
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // <-- Añadido
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado correctamente');
    }

    // Actualizar usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:user,admin', // <-- Añadido
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role; // <-- Añadido
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente');
    }
}
