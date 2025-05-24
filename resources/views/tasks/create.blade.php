@extends('layouts.layout')

@section('title', 'Nouvelle tâche')

@section('content')
<div class="card">
    <div class="card-header">Créer une tâche</div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Entrez une description..."></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status">Statut</label>
                <select name="status" class="form-control">
                    <option value="todo">À faire</option>
                    <option value="in progress">En cours</option>
                    <option value="done">Terminé</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="priority">Priorité</label>
                <select name="priority" class="form-control">
                    <option value="low">Faible</option>
                    <option value="medium" selected>Moyenne</option>
                    <option value="high">Haute</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="due_date">Date limite</label>
                <input type="date" name="due_date" class="form-control">
            </div>

            <button class="btn btn-warning">Enregistrer</button> <!-- Bouton jaune -->
            <a href="{{ route('dashboard') }}" class="btn btn-danger">Annuler</a> <!-- Bouton rouge -->
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('cancelAddTaskBtn').addEventListener('click', function () {
        document.getElementById('addTaskFormSection').style.display = 'none';
        document.getElementById('taskListSection').style.display = 'block';
    });
</script>
@endsection
