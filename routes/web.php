<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Route pour le tableau de bord
Route::get('/dashboard', [TaskController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route pour le forum
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Route pour l'exportation
Route::get('/export', function () {
    return view('export');
})->name('export');

// Routes protégées par le middleware "auth"
Route::middleware('auth')->group(function () {
    // Routes pour le profil utilisateur
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth'); // Ajout de la route show
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les tâches
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
});

// Route pour l'exportation des tâches en PDF
Route::get('/tasks/export/pdf', [TaskController::class, 'exportPDF'])->name('tasks.export.pdf');

// Route pour le filtrage des tâches
Route::get('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');

// Route pour l'exportation des tâches
Route::get('/tasks/export', [TaskController::class, 'export'])->name('tasks.export');

// Inclusion des routes d'authentification
require __DIR__.'/auth.php';
