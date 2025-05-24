
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
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Date limite</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->due_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
