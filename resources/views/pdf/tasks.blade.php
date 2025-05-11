<?php
<!DOCTYPE html>
<html>
<head>
    <title>Liste des tâches</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #aaa; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Liste des tâches</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Début</th>
                <th>Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->start_date }}</td>
                <td>{{ $task->end_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
