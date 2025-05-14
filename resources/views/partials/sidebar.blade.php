<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: var(--bs-dark);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="width: 100px; height: 100px;">
        </div>
        <div class="sidebar-brand-text mx-3">BIP RADIO AGENDA</div>
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

    <!-- Bouton de déconnexion -->
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger btn-block text-white text-start">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </li>
</ul>
