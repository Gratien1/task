<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();

        $stats = [
            'total' => $tasks->count(),
            'todo' => $tasks->where('status', 'todo')->count(),
            'in_progress' => $tasks->where('status', 'in progress')->count(),
            'done' => $tasks->where('status', 'done')->count(),
            'late' => $tasks->where('end_date', '<', Carbon::today())->where('status', '!=', 'done')->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
