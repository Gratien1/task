@extends('layouts.layout')

@section('title', 'Liste des tâches')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
    <h1 class="h4 mb-2 mb-md-0">Toutes les tâches</h1>

    <div class="d-flex flex-column flex-md-row gap-2">
        <a href="{{ route('tasks.create') }}" class="btn text-dark" style="background-color: #FFD700;">
            <i class="fas fa-plus"></i> Ajouter une tâche
        </a>
    </div>
</div>

<!-- Filtres et Export -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('tasks.export') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="period" class="form-label">Filtrer par période</label>
                <select name="period" id="period" class="form-select">
                    <option value="">-- Choisir --</option>
                    <option value="today">Aujourd'hui</option>
                    <option value="this_week">Cette semaine</option>
                    <option value="this_month">Ce mois-ci</option>
                    <option value="this_year">Cette année</option>
                    <option value="custom">Personnalisée</option>
                </select>
            </div>

            <div class="col-md-3 d-none" id="dateFromGroup">
                <label for="from" class="form-label">Du</label>
                <input type="date" name="from" id="from" class="form-control">
            </div>

            <div class="col-md-3 d-none" id="dateToGroup">
                <label for="to" class="form-label">Au</label>
                <input type="date" name="to" id="to" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label d-block">&nbsp;</label>
                <button type="submit" name="format" value="pdf" class="btn btn-danger">Exporter PDF</button>
                <button type="submit" name="format" value="excel" class="btn btn-success">Exporter Excel</button>
            </div>
        </form>
    </div>
</div>

<!-- Tableau des tâches -->
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col" class="d-none d-md-table-cell">Description</th>
                <th scope="col" class="d-none d-md-table-cell">Statut</th>
                <th scope="col" class="d-none d-md-table-cell">Priorité</th>
                <th scope="col" class="d-none d-md-table-cell">Date limite</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td class="d-none d-md-table-cell">{{ \Illuminate\Support\Str::limit($task->description, 50) }}</td>
                    <td class="d-none d-md-table-cell">{{ ucfirst($task->status) }}</td>
                    <td class="d-none d-md-table-cell">{{ ucfirst($task->priority) }}</td>
                    <td class="d-none d-md-table-cell">
                        {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : '—' }}
                    </td>
                    <td>
                        <div class="d-flex flex-column flex-md-row gap-1">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune tâche trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $tasks->links('pagination::bootstrap-4') }}
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('period').addEventListener('change', function () {
        const dateFromGroup = document.getElementById('dateFromGroup');
        const dateToGroup = document.getElementById('dateToGroup');
        if (this.value === 'custom') {
            dateFromGroup.classList.remove('d-none');
            dateToGroup.classList.remove('d-none');
        } else {
            dateFromGroup.classList.add('d-none');
            dateToGroup.classList.add('d-none');
        }
    });
</script>
@endsection
