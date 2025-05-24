<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Coming Soon Page" />
        <meta name="author" content="Your Name" />
        <title>Bip radio Agenda</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <style>
            body {
                background-image: url('{{ asset('img/background.jpg') }}'); /* Replace with your image path */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-align: center;
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
                z-index: 0;
            }

            .content {
                position: relative;
                z-index: 1;
            }

            .social-icons a {
                color: white;
                margin: 0 10px;
                font-size: 1.5rem;
                transition: color 0.3s;
            }

            .social-icons a:hover {
                color: rgb(255, 8, 0);
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Bip radio</a>
                <div class="d-flex">
                    <a href="{{ url('/dashboard') }}" class="btn btn-danger">Tableau de bord</a> <!-- Bouton rouge -->
                </div>
            </div>
        </nav>

        <div class="overlay"></div>
        <div class="content container">
            <h1 class="display-4 fw-bold">Avez vous une tâche ou un évenement?</h1>
            <p class="lead mb-4">Connectez vous ou inscrivez vous <br> C'est très simple </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-success btn-lg">Se connecter</a> <!-- Bouton vert -->
                <a href="{{ route('register') }}" class="btn btn-warning btn-lg">S'inscrire</a> <!-- Bouton jaune -->
            </div>
            <div class="social-icons mt-4">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
