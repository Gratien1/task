<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #FF0000;"> <!-- Couleur rouge -->
    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn" type="button" style="background-color: var(--bs-dark); color: #ffffff;"> <!-- Bouton noir -->
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" style="color: #ffffff; font-weight: 500;"> <!-- Icône blanche -->
                <i class="fas fa-bell fa-fw" style="color: #ffffff; font-size: 1.80rem;"></i> <!-- Taille augmentée -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
        </li>

        <!-- Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" style="color: #ffffff; font-weight: 500;"> <!-- Icône blanche -->
                <i class="fas fa-envelope fa-fw" style="color: #ffffff; font-size: 1.80rem;"></i> <!-- Taille augmentée -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>
        </li>

        <!-- User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="color: #ffffff; font-weight: 500;">
                    {{ Auth::user()->name }} <!-- Affiche le nom de l'utilisateur connecté -->
                </span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" alt="User" style="width: 30px; height: 30px;">
            </a>
            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('tasks.create') }}">
                    <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Tâche ajoutée
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Déconnexion
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
