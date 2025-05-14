<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-danger topbar mb-4 static-top shadow">

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
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" style="color: var(--bs-dark);"> <!-- Icône noire -->
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
        </li>

        <!-- Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" style="color: var(--bs-dark);"> <!-- Icône noire -->
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
            </a>
        </li>

        <!-- User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                <span class="mr-2 d-none d-lg-inline small" style="color: var(--bs-dark);">Douglas McGee</span> <!-- Texte noir -->
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" alt="User">
            </a>
        </li>
    </ul>
</nav>
