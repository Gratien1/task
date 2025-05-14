@extends('layouts.layout')

@section('title', 'Modifier la tâche')

@section('content')
<div class="card">
    <div class="card-header">Modifier la tâche</div>
    <div class="card-body">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" class="form-control">
                    <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>À faire</option>
                    <option value="in progress" {{ $task->status == 'in progress' ? 'selected' : '' }}>En cours</option>
                    <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>

            <div class="form-group">
                <label for="priority">Priorité</label>
                <select name="priority" class="form-control">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Faible</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Moyenne</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>Haute</option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Date limite</label>
                <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
            </div>

            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
