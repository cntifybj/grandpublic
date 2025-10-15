@extends('layouts.app')
@section('head')
    <link href="{{ asset('assets/css/yt1/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/my-gp.css">

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20">
            <div class="container">
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl uppercase">Réinitialisation du mot
                    de passe</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <script></script>
        <div class="form-container col-start-2 col-end-12 py-10 md:col-end-6 md:py-20 max-w-3xl mx-auto">
            <div class="form-container bg-white border border-gray-200 p-5 rounded-md shadow-lg dark:bg-gray-800">
                <h2 class="font-bold text-2xl text-primary dark:text-white md:text-3.5xl mb-4 tracking-tight">
                    Réinitialisation</h2>
                <div class="mb-8 md:mb-14 md:leading-normal md:text-lg tracking-tighter pr-2">
                    <p>Vous avez oublié votre mot de passe? Pas de problème, remplissez le formulaire ci-dessous pour le
                        réinitialiser.</p>
                </div>
                <style>
                    input,
                    textarea,
                    form,
                     {

                        overflow-x: hidden;
                    }

                    input[type="email"]:focus {
                        border-width: 0.5px;
                        border-color: #ee1a3b;
                        box-shadow: 0 0 0 1px #ee1a3b;
                        outline: none;
                    }
                     @media (max-width: 768px) {
                input,
                button[type="submit"] {
                    font-size: 16px; /* Prevent zoom on mobile */
                    padding: 12px 16px;
                }
                .form-container {
                padding: 10px;
            }
            }
                </style>
                @if (session('status'))
                <div class="text-success bg-green-100 border border-green-500 text-sm p-4 rounded-lg mb-6 text-center">
                    Nous vous avons envoyé un lien pour réinitialiser votre mot de passe. Veuillez vérifier votre boîte email.
                </div>
            @endif
                <form class=" flex flex-col gap-y-7" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="overflow-hidden">
                        <input
                            class="text-base rounded-lg group-[.is-success]:bg-input-success group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 border-base bg-[length:14px_14px,_46px_46px] bg-[position:right_26px_center,_right_10px_center] bg-no-repeat font-bold leading-8 tracking-tight text-primary transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60  focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80  w-full px-7 py-4"
                            type="email" name="email" id="user-email" placeholder="Adresse e-mail" required>
                        @error('email')
                            <p class="group-[.is-error]:block mt-2 text-sm font-bold text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3 overflow-hidden">
                        <input
                            class="text-base rounded-lg block w-full bg-[#ee1a3b] py-5 text-lg font-bold leading-normal tracking-tight text-white transition-colors hover:cursor-pointer hover:bg-[#ee1a3b]/90"
                            type="submit" value="Réinitialisez le mot de passe">
                    </div>
                </form>

                <div class="pt-8">
                    <div
                        class="dark:text-white text-center font-bold text-primary mb-6 text-sm md:text-base dark:text-white">
                        Déjà un compte ? <a href="{{ route('login_page') }}"
                            class="text-[#ee1a3b] hover:text-primary transition-colors">Connectez-vous ici</a></div>
                </div>
            </div>
        </div>
        <style>
            .js-menu-toggle {

                display: flex;
                /* Flex pour aligner les icônes */
                Centre horizontalement */ width: 50px;
                /* Fixe la largeur du bouton */
                height: 50px;
                /* Fixe la hauteur du bouton */
                margin-top: -3px;
            }

            /* Gère l'opacité et la visibilité des icônes */
            .material-icons {
                transition: opacity 0.1s ease, visibility 0.1s ease;
                /* Transition fluide */
                opacity: 0;
                /* Par défaut, invisible */
                visibility: hidden;
                /* Par défaut, caché */
                position: absolute;
                /* Positionne les icônes de manière absolue pour qu'elles ne poussent pas le bouton */
                font-size: 30px;
            }

            /* Icône visible */
            .material-icons.visible {
                opacity: 1;
                /* Affiche l'icône */
                visibility: visible;
                /* Rends l'icône visible */
            }

            /* Styles pour les icônes */
            .iconOpen,
            .iconClose {
                left: 0;
                /* Positionne l'icône de menu et de fermeture à gauche */
                margin-bottom: 5px;
                /* Ajuste la marge inférieure pour maintenir l'alignement */
            }

            /* Garde l'alignement même lorsque les icônes changent d'état */
            .js-menu-toggle {
                ntre verticalement */
            }

            /* Masque le menu burger sur les écrans larges */
            @media (min-width: 1024px) {
                .js-menu-toggle {
                    display: none;
                    /* Cache le menu burger sur les écrans larges */
                }
            }
        </style>
        <script>
            // Color Switcher
            var themeToggleBtn = document.getElementById('theme-toggle');

            // Change the toggle state based on previous change
            if (localStorage.getItem('yt1-color-theme') === 'dark') {
                themeToggleBtn.checked = true;
                document.documentElement.classList.add('dark');
            } else {
                themeToggleBtn.checked = false;
                document.documentElement.classList.remove('dark');
            }

            themeToggleBtn.addEventListener('change', function() {

                // if set via local storage previously
                if (localStorage.getItem('yt1-color-scheme')) {
                    if (localStorage.getItem('yt1-color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('yt1-color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('yt1-color-theme', 'light');
                    }
                    // if NOT set via local storage previously
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('yt1-color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('yt1-color-theme', 'dark');
                    }
                }
            });

            // Assurez-vous que Material Icons est inclus dans votre projet via un CDN
            const loadGoogleIcons = () => {
                const link = document.createElement('link');
                link.href = "https://fonts.googleapis.com/icon?family=Material+Icons";
                link.rel = "stylesheet";
                document.head.appendChild(link);
            };

            loadGoogleIcons();

            // Sélection des éléments
            const mobileMenuToggle = document.querySelector('.js-menu-toggle');
            const siteWrapper = document.querySelector('.js-site-wrapper');
            const mobileMenu = document.querySelector('.js-mobile-menu');

            // Création des icônes dynamiquement
            const iconOpen = document.createElement('span');
            iconOpen.classList.add('material-icons', 'visible'); // Par défaut, visible
            iconOpen.textContent = 'menu'; // Icône de menu burger

            const iconClose = document.createElement('span');
            iconClose.classList.add('material-icons'); // Par défaut, cachée
            iconClose.textContent = 'close'; // Icône de fermeture

            // Ajout des icônes dans le bouton
            mobileMenuToggle.appendChild(iconOpen);
            mobileMenuToggle.appendChild(iconClose);

            // Toggle pour afficher le menu et changer les icônes
            mobileMenuToggle.onclick = () => {
                mobileMenuToggle.classList.toggle('active');

                if (mobileMenuToggle.classList.contains('active')) {
                    siteWrapper.classList.add('overflow-y-hidden');
                    iconOpen.classList.remove('visible'); // Cache l'icône menu
                    iconClose.classList.add('visible'); // Affiche l'icône close
                    mobileMenu.classList.remove('translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                } else {
                    siteWrapper.classList.remove('overflow-y-hidden');
                    iconOpen.classList.add('visible'); // Affiche l'icône menu
                    iconClose.classList.remove('visible'); // Cache l'icône close
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');
                }
            };
        </script>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
