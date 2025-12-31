<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{

    public function index($id)
    {
        $contest = Contest::findOrFail($id);
        $participants = Participation::with('user')
            ->where('contest_id', $id)
            ->get();

    return view('admin.participants.index', compact('contest', 'participants'));
    }

    public function store($id)
    {
        // Verificar que el concurso exista
        $contest = Contest::findOrFail($id);

        // Evitar doble participación
        $exists = Participation::where('user_id', auth()->id())
            ->where('contest_id', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Ya estás participando en este concurso');
        }

        Participation::create([
            'user_id' => auth()->id(),
            'contest_id' => $id,
        ]);

        return back()->with('success', 'Participación registrada correctamente');
    }
}
