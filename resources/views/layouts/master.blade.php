<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - AUXFIN</title>
    <!-- Bootstrap 5 CSS -->
    @include('partials.style')
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh !important;
            min-height: 100vh !important;
            background-color: #ffffff !important;
            /* blanc */
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
    <!-- TOP NAVIGATION BAR -->
    @include('partials.topNav')

    <!-- Contenu principal -->
    <div class="content mx-5 mx-sm-5 mx-md-5 mx-lg-5 mx-xl-5 mx-xxl-5">
        @yield('content')

        {{-- Pour les messgaes de validation et de rejet... --}}
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
            <i data-feather="lock"></i> &nbsp; Connexion Admin
        </a>
    </footer>

    <!-- Bootstrap JS -->
    @include('partials.script')


    <script>
        (function($) {
            // éléments
            var $loader = $('#global-loader');
            var activeCount = 0;
            var fallbackTimeouts = new Map();

            function showLoader(text) {
                if (text) {
                    $loader.find('div[role="status"] > div').text(text);
                }
                activeCount++;
                if (activeCount > 0) $loader.show();
            }

            function hideLoader() {
                activeCount = Math.max(0, activeCount - 1);
                if (activeCount === 0) {
                    $loader.hide();
                    // clear fallback timeouts
                    fallbackTimeouts.forEach(function(t) {
                        clearTimeout(t);
                    });
                    fallbackTimeouts.clear();
                }
            }

            // Global AJAX handlers (gère $.ajax, $.get, $.post, etc.)
            $(document).ajaxStart(function(e) {
                // ignore les requêtes qui portent un header/data skip-loader
                // si tu veux ignorer, ajoute data-skip-loader="true" sur l'élément déclencheur et gère côté ajax call
                showLoader();
                // fallback safety (au cas où ajax ne déclenche pas ajaxStop)
                var t = setTimeout(function() {
                    hideLoader();
                }, 30000); // 30s safety
                fallbackTimeouts.set('ajax-' + Date.now(), t);
            });
            $(document).ajaxStop(function() {
                hideLoader();
            });

            // Sur soumission de forms non-AJAX (full page load) : afficher le loader pour feedback
            $(document).on('submit', 'form', function(e) {
                var $form = $(this);
                // Skip si ajouté data-no-loader
                if ($form.data('no-loader')) return;
                // si form contient input file et enctype multipart, on laisse quand même (ok)
                // afficher loader et désactiver boutons pour éviter double submit
                showLoader($form.data('loader-text') || 'Envoi en cours…');
                // désactiver les boutons du form
                $form.find('button, input[type="submit"]').prop('disabled', true).addClass(
                    'disabled-on-submit');
                // fallback safety si la page ne change pas (ex: JS interrompt) : 20s
                var t = setTimeout(function() {
                    hideLoader();
                    $form.find('.disabled-on-submit').prop('disabled', false).removeClass(
                        'disabled-on-submit');
                }, 20000);
                fallbackTimeouts.set('form-' + Date.now(), t);
                // laisser formulaire se soumettre normalement (ne pas preventDefault)
            });

            // Si tu veux exécuter AJAX avec $.ajax et désactiver bouton déclencheur automatiquement :
            $(document).on('click', '[data-loader]', function(e) {
                var $el = $(this);
                // si l'élément est un lien avec href et pas d'ajax, on veut loader (full navigation)
                var isLink = $el.is('a') && $el.attr('href') && $el.attr('href') !== '#';
                var loaderText = $el.data('loader-text') || 'Chargement…';

                if (isLink && !$el.data('ajax')) {
                    // navigation classique
                    showLoader(loaderText);
                    // fallback safety
                    var t = setTimeout(function() {
                        hideLoader();
                    }, 15000);
                    fallbackTimeouts.set('link-' + Date.now(), t);
                    return; // laisser navigateur naviguer
                }

                // pour boutons lançant un appel ajax, on désactive ici
                $el.prop('disabled', true).addClass('disabled-on-submit');
                showLoader(loaderText);
                // si tu fais l'appel ajax manuellement, assure-toi d'appeler hideLoader() à la fin de la promesse.
                // Exemple d'utilisation (dans ton code d'appel AJAX) :
                // $.ajax({...}).always(function(){ hideLoader(); $el.prop('disabled', false).removeClass('disabled-on-submit'); });
            });

            // Nettoyage au chargement complet de la page (nouvelle page) — cache le loader
            $(window).on('load', function() {
                $loader.hide();
                activeCount = 0;
            });

            // expose utile si besoin ailleurs
            window.GlobalLoader = {
                show: function(text) {
                    showLoader(text);
                },
                hide: function() {
                    hideLoader();
                }
            };
        })(jQuery);
    </script>
</body>

</html>
