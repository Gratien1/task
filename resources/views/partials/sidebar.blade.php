<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: var(--bs-dark);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="width: 100px; height: 100px;">
        </div>
        <div class="sidebar-brand-text mx-3">Agenda</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Ajouter une tâche -->
    <li class="nav-item">
        <a class="nav-link fw-bold" href="{{ route('tasks.create') }}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Ajouter une tâche</span>
        </a>
    </li>

    <!-- Nav Item - Liste des tâches -->
    <li class="nav-item">
        <a class="nav-link fw-bold" href="{{ route('tasks.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Liste des tâches</span>
        </a>
    </li>

    <!-- Nav Item - Filtrer par date -->
    <li class="nav-item">
        <a class="nav-link fw-bold" href="#">
            <i class="fas fa-fw fa-folder"></i>
            <span>Filtrer par date</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Bouton Aller à l'accueil -->
    <li class="nav-item mt-auto">
        <a href="{{ url('/') }}" class="btn btn-link text-white fw-bold text-decoration-none text-start">
            <i class="fas fa-home"></i> Aller à l'accueil
        </a>
    </li>

    <!-- Bouton Accéder à l'administration (visible uniquement pour les administrateurs) -->
    @can('access admin') <!-- Vérifie si l'utilisateur a la permission d'accéder à l'administration -->
    <li class="nav-item mt-auto">
        <a href="{{ route('admin.index') }}" class="btn btn-link text-white fw-bold text-decoration-none text-start">
            <i class="fas fa-user-shield"></i> Administration
        </a>
    </li>
    @endcan

    <!-- Bouton de déconnexion -->
    <li class="nav-item d-flex justify-content-center">
        <form method="POST" action="{{ route('logout') }}" class="w-100 text-center">
            @csrf
            <button type="submit" class="btn text-white d-flex align-items-center justify-content-center px-3"
                    style="background-color: transparent; width: 60%; height: 40px; font-size: 0.9rem; border-radius: 5px;">
                <i class="fas fa-sign-out-alt mr-2"></i> <!-- Icône avec un espace à droite -->
                Déconnexion
            </button>
        </form>
    </li>
</ul>
