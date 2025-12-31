<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;
use App\Notifications\NewContestNotification;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ContestController extends Controller
{
    // LISTAR (ADMIN)
    public function index()
    {
        $contests = Contest::where('created_by', auth()->id())->get();
        return view('admin.contests.index', compact('contests'));
    }

    // FORM CREAR
    public function create()
    {
        return view('admin.contests.create');
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'rules' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('contests', 'public');
        }

        $contest = Contest::create([
            'title' => $request->title,
            'description' => $request->description,
            'rules' => $request->rules,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_by' => auth()->id(),
            'image' => $imagePath,
        ]);

        // Notificar usuarios
        $users = User::where('role', 'user')->get();
        foreach ($users as $user) {
            $user->notify(new NewContestNotification($contest));
        }

        return redirect('/admin/contests')->with('success', 'Concurso creado correctamente');
    }

    // FORM EDITAR
    public function edit($id)
    {
        $contest = Contest::findOrFail($id);
        return view('admin.contests.edit', compact('contest'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $contest = Contest::findOrFail($id);

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'rules' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($contest->image) {
                Storage::disk('public')->delete($contest->image);
            }

            $contest->image = $request->file('image')->store('contests', 'public');
        }

        $contest->update([
            'title' => $request->title,
            'description' => $request->description,
            'rules' => $request->rules,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect('/admin/contests')->with('success', 'Concurso actualizado');
    }

    // ELIMINAR
    public function destroy($id)
    {
        $contest = Contest::findOrFail($id);

        if ($contest->image) {
            Storage::disk('public')->delete($contest->image);
        }

        $contest->delete();

        return redirect('/admin/contests')->with('success', 'Concurso eliminado');
    }

    // LISTAR (USUARIOS)
    public function list()
    {
        $contests = Contest::whereDate('end_date', '>=', now())->get();
        return view('contests.index', compact('contests'));
    }

    public function participants($id)
    {
        $contest = Contest::with('participants.user')->findOrFail($id);
        return view('admin.contests.participants', compact('contest'));
    }
}
