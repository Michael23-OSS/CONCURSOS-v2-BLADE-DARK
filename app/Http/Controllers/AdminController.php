<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function metrics()
    {
        $contests = Contest::withCount('participants')->get();
        $labels = $contests->pluck('title');
        $data = $contests->pluck('participants_count');
        $ranking = Contest::withCount('participants')
            ->orderBy('participants_count', 'desc')
            ->get();

        return view('admin.metrics', compact('labels', 'data', 'ranking'));
    }
}
