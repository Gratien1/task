@extends('layouts.layout')


@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <h1 class="h3 mb-4 text-gray-800">
            Tableau de bord ! <br>
            Bonjour {{ Auth::user()->first_name }} {{ Auth::user()->name }},
        </h1>

        <!-- Affichage du message de bienvenue en fonction du rôle de l'utilisateur -->
        @if (auth()->user()->hasRole('Administrateur'))
            <p>Super admin !</p>
        @elseif (auth()->user()->hasRole('Membre'))
            <p>Bienvenue, Membre !</p>
        @else
            <p>Bienvenue, Visiteur !</p>
        @endif

        <!-- Bouton Ajouter une tâche -->
        <a href="{{ route('tasks.create') }}" class="btn text-dark mt-4" style="background-color: #FFD700;">
            <i class="fas fa-plus"></i> Ajouter une tâche
        </a>

        <!-- Lien vers l'administration pour les administrateurs
        @if (auth()->user()->hasRole('Administrateur'))
            <a href="{{ route('admin.index') }}" class="btn btn-dark mt-4">Accéder à l'administration</a>
        @endif-->
    </div>
@endsection

@section('footer')
    @include('partials.footer') <!-- Inclusion du footer -->
@endsection

<style>
    /* Assurez-vous que le contenu remplit la hauteur de la page */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .content-wrapper {
        flex: 1; /* Permet au contenu de s'étendre pour remplir l'espace disponible */
    }

    footer.sticky-footer {
        background-color: #FF0000;
        color: var(--bs-dark);
        text-align: center;
        padding: 10px 0;
    }
</style>
