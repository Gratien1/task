<?php
@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h1>Mes Tâches</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nouvelle Tâche</a>

    @foreach($tasks as $task)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p>Status : <strong>{{ ucfirst($task->status) }}</strong> | Priorité : {{ ucfirst($task->priority) }}</p>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Modifier</a>
            </div>
        </div>
    @endforeach

    {{ $tasks->links() }}
</div>
@endsection