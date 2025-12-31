<?php

namespace App\Http\Controllers;

use App\Notifications\WinnerNotification;
use App\Models\Participation;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Prize;
use App\Models\User;

class PrizeController extends Controller
{
    // Formulario para asignar premio
    public function create($id)
    {
        $contest = Contest::findOrFail($id);
        $participants = Participation::with('user')
            ->where('contest_id', $id)
            ->get();

        return view('admin.prizes.create', compact('contest', 'participants'));
    }

    // Guardar resultado
    public function store(Request $request, $id)
    {
    $request->validate([
        'winner_user_id' => 'required|exists:users,id',
        'description' => 'required',
    ]);

    // Obtener el concurso
    $contest = Contest::findOrFail($id);

    // Crear el premio y GUARDARLO en variable
    $prize = Prize::create([
        'contest_id' => $id,
        'winner_user_id' => $request->winner_user_id,
        'description' => $request->description,
    ]);

    // Notificar al ganador
    $winner = User::findOrFail($request->winner_user_id);
    $winner->notify(new WinnerNotification($contest, $prize));

    return redirect('/admin/contests')->with('success', 'Premio asignado correctamente');
    }

}
