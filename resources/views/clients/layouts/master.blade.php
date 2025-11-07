<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opportunités de carrière - AUXFIN</title>
    <link rel="icon" href="{{ asset('images/auxfin.png') }}" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    @include('partials.style')
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh !important;
            min-height: 100vh !important;
            background-color: #ffffff !important;
        }

        .content {
            margin-left: 150px !important;
            margin-right: 150px !important;
            min-height: 100vh !important;
        }

        .top-bar {
            background: linear-gradient(40deg, #f3934f, #d54e14);
            color: #fff;
            font-weight: bold;
            padding: 5px 0;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
        }

        .page-title {
            text-align: center;
            margin: 30px 0;
            font-weight: bold;
            font-size: 1.0rem;
        }

        .page-title::after {
            content: "";
            display: block;
            width: 100px;
            height: 2px;
            background: #f09103;
            margin: 10px auto 0;
        }

        ul li {
            list-style: none;
            font-size: 13px;
            font-weight: bold;
            margin-right: 20px;
        }

        .text-justify {
            text-align: justify !important;
        }

        /* Quand l'écran est petit (ex: < 768px), marges réduites */
        @media (max-width: 768px) {
            .content {
                margin-left: 20px !important;
                margin-right: 20px !important;
            }
        }
    </style>
</head>

<body>
    @include('clients.require.header')

    <!-- Contenu principal -->
    <div class="content mx-5 mx-sm-5 mx-md-5 mx-lg-5 mx-xl-5 mx-xxl-5">
        @yield('content')
        @if (session('success') || session('error'))
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <div class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0 show"
                    role="alert" aria-live="assertive" aria-atomic="true" id="statusToast">
                    <div class="d-block">
                        <button type="button" class="btn-close btn-close-white me-2 m-auto float-end border-1"
                            data-bs-dismiss="toast" aria-label="Close"></button>
                        <div class="toast-body" style="height: 40vh;">
                            @if (session('success'))
                                <div class="text-center">
                                    <h3 class="mb-2 text-white">Succès !</h3>
                                    <img src="{{ asset('images/image-succes.png') }}" alt="images-success"
                                        style="width: 25%;">
                                    <h5 class="mt-3 text-white">{{ session('success') }}</h5>
                                </div>
                            @else
                                <div class="text-center">
                                    <h3 class="mb-2 text-white">Erreur !</h3>
                                    <img src="{{ asset('images/image-warning.jpg') }}" alt="images-error"
                                        style="width: 35%;">
                                    <h5 class="mt-3 text-white">{{ session('error') }}</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- FOOTER -->
    <footer class="text-center">
        <p>Copyright © {{ date('Y') }} <span class="highlight">AUXFIN</span>. Tous droits réservés.</p>
        <p>Tel : +226 61 34 65 54 | Mail : recrutement@auxfin.bf</p>
        <a href="{{ route('auth_admin') }}" class="btn admin-btn">
            <i data-feather="lock"></i>&nbsp; Connexion Admin
        </a>
    </footer>

    <!-- Bootstrap JS -->
    @include('partials.script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('statusToast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>
</body>

</html>
