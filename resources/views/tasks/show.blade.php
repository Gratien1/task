@extends('layouts.layout')

@section('title', 'Détail de la tâche')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $task->title }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong><br>{{ $task->description }}</p>
            <p><strong>Statut :</strong> {{ ucfirst($task->status) }}</p>
            <p><strong>Priorité :</strong> {{ ucfirst($task->priority) }}</p>
            <p><strong>Date limite :</strong> {{ $task->due_date }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
@endsection
