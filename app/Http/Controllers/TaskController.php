<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class TaskController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(5); // 5 tâches par page
        return view('tasks.index', compact('tasks'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('tasks.create');
    }

    // Enregistre une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string', // Validation pour le champ description
            'status' => 'required|string',
            'priority' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    // Affiche le formulaire d'édition
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Met à jour une tâche existante
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:todo,in progress,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprime une tâche
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }

    // Affiche le tableau de bord
    public function dashboard()
    {
        $total = Task::count();
        $byStatus = Task::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
        $overdue = Task::where('due_date', '<', now())
            ->where('status', '!=', 'done')
            ->count();

        return view('dashboard', compact('total', 'byStatus', 'overdue'));
    }

    // Affiche une tâche spécifique
    public function show($id)
    {
        $task = Task::findOrFail($id); // Récupère la tâche ou renvoie une erreur 404 si elle n'existe pas
        return view('tasks.show', compact('task')); // Retourne la vue avec la tâche
    }

    // Filtre les tâches par période
    public function filter(Request $request)
    {
        $period = $request->input('period', 'all'); // Récupère la période ou 'all' par défaut
        $query = Task::query();

        switch ($period) {
            case 'day':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
            default:
                // Pas de filtre, retourne toutes les tâches
                break;
        }

        $tasks = $query->orderBy('created_at', 'desc')->paginate(5); // Pagination des résultats
        return view('tasks.index', compact('tasks', 'period'));
    }

    // Exporte les tâches en PDF
    public function exportPDF(Request $request)
    {
        $period = $request->input('period', 'all');
        $query = Task::query();

        switch ($period) {
            case 'day':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        $tasks = $query->get();

        $pdf = Pdf::loadView('tasks.pdf', compact('tasks', 'period'));
        return $pdf->download('tasks.pdf');
    }

    // Exporte les tâches en différents formats
    public function export(Request $request)
    {
        $query = Task::query();

        // Appliquer le filtre par période
        if ($request->period) {
            switch ($request->period) {
                case 'today':
                    $query->whereDate('created_at', Carbon::today());
                    break;
                case 'this_week':
                    $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year);
                    break;
                case 'this_year':
                    $query->whereYear('created_at', Carbon::now()->year);
                    break;
                case 'custom':
                    if ($request->from && $request->to) {
                        $query->whereBetween('created_at', [$request->from, $request->to]);
                    }
                    break;
            }
        }

        $tasks = $query->get();

        // Exporter en Excel
        if ($request->format === 'excel') {
            return Excel::download(new TasksExport($tasks), 'taches.xlsx');
        }

        // Exporter en PDF
        if ($request->format === 'pdf') {
            $pdf = Pdf::loadView('tasks.export_pdf', ['tasks' => $tasks]);
            return $pdf->download('taches.pdf');
        }

        return back()->with('error', 'Format invalide.');
    }
}
