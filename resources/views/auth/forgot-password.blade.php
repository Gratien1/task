<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forgot Password - SB Admin</title>

        <!-- Fonts and Styles -->
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            body {
                position: relative;
                background-image: url('{{ asset('img/background.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            /* Overlay to reduce opacity */
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
                z-index: 0;
            }

            .container {
                position: relative;
                z-index: 1; /* Ensure content is above the overlay */
            }

            /* Remove rounded corners */
            .form-control {
                border-radius: 5 !important;
            }

            .btn {
                border-radius: 5 !important;
            }

            /* Change button background to red */
            .btn-primary {
                background-color: red !important;
                border-color: red !important;
            }

            .btn-primary:hover {
                background-color: darkred !important;
                border-color: darkred !important;
            }
        </style>
    </head>
    <body>

        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <!-- Outer Row -->
            <div class="row justify-content-center w-100">

                <div class="col-xl-6 col-lg-8 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Vous avez oublié votre mot de passe ?</h1>
                                            <p class="mb-4 text-gray-600">
                                                Pas de problème ! Saisissez simplement votre adresse électronique ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe.
                                            </p>
                                        </div>
                                        <form method="POST" action="{{ route('password.email') }}" class="user">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Saisissez votre adresse e-mail..." required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">
                                               Envoyer le lien de réinitialisation du mot de passe
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('login') }}">Retour à la connexion</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">Créer un compte !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
