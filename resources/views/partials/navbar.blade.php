<div id="site-wrapper" class="flex flex-col h-full js-site-wrapper">
    <div class="header-wrapper bg-[#ee1a3b] text-white relative z-30">
        <header id="site-header" class="text-white absolute inset-x-0 z-20">
            <div class="container">
                <nav class="flex min-h-[64px] items-center justify-between pt-1 lg:min-h-[90px] lg:pt-4">
                    <!-- Logo -->
                    <div class="logo-container flex flex-col h-full js-site-wrapper">
                        <a href="{{ route('home') }}">
                            <div class="logo-wrapper">
                                <img src="{{ asset('mygp-images/logo-gp.png') }}" alt="Logo Grand Public"
                                     class="logo h-auto w-[60px] sm:w-[80px] md:w-[100px] lg:w-[105px]" />
                            </div>
                        </a>
                    </div>

                    <style>


                        .logo-wrapper {
                            display: inline-flex;
                            justify-content: center;
                            align-items: center;
                            border: 1px white; /* Ajuste l'épaisseur selon tes besoins */
                            border-radius: 50%;      /* Crée un cercle autour de l'image */
                            padding: 1px;            /* Espace entre le logo et le contour */
                            background-color: white; /* Facultatif : ajoute un fond blanc */
                        }

                        .logo {
                            border-radius: 50%; /* Pour que le logo épouse la forme du cercle */
                        }

                                        </style>
                    <!-- Logo / End -->
                    <!-- Navigation (Desktop) -->
                    <ul class="hidden lg:flex gap-x-7 xl:gap-x-10 text-sm font-bold lg:flex flex-wrap justify-center">
                        <li>
                            <a class=" relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-left after:scale-x-100"
                                href="{{ route('home') }}">
                            </a>

                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'portrait' ? 'active no-hover-effect' : '' }} relative [&>.sub-menu]:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:hover:opacity-100">
                            <a class="flex flex-col h-full js-site-wrapper relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                href="{{ route('portrait') }}">
                                PORTRAIT
                            </a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'events' ? 'active no-hover-effect' : '' }} relative [&>.sub-menu]:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:hover:opacity-100">
                            <a class="flex flex-col h-full js-site-wrapper relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                href="{{ route('events') }}">
                                EVENTS
                            </a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'opinion' ? 'active no-hover-effect' : '' }} relative [&>.sub-menu]:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:hover:opacity-100">
                            <a class=" relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                href="{{ route('opinion') }}">
                                OPINION
                            </a>
                        </li>
                        <li
                            class="{{ Route::currentRouteName() == 'insolite' ? 'active no-hover-effect' : '' }} relative [&>.sub-menu]:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:hover:opacity-100">
                            <a class="relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                href="{{ route('insolite') }}">
                                INSOLITE
                            </a>
                        </li>



                        <li
                            class="relative [&>.sub-menu]:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:hover:opacity-100">
                            @if (Auth::check())
                                <!-- Vérifie si l'utilisateur est connecté -->
                                <a class="hidden relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                    href="#">
                                    DÉCONNEXION
                                    <svg role="img" class="h-2 w-2 rotate-90 fill-white">
                                        <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                                    </svg>
                                </a>
                                <ul
                                    class="hidden sub-menu invisible absolute z-20 flex w-52 flex-col bg-white dark:bg-gray-800 py-5 text-sm font-bold opacity-0 shadow-2xl transition-all">
                                    <li class="px-7">
                                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center justify-between py-2 transition-colors text-primary hover:text- dark:text- dark:hover:text-">
                                                DÉCONNEXION
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <a class="hidden relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                                    href="#">
                                    CONNEXION
                                    <svg role="img" class="h-2 w-2 rotate-90 fill-white">
                                        <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                                    </svg>
                                </a>
                            @endif
                        </li>
                    </ul>


                    <div class="flex items-center py-4 px-1 sm:px-2 space-x-4">
                        <a href="{{ route('live') }}"
                            class="live-button relative text-white font-bold py-2 px-4 rounded-none group overflow-hidden">
                            <span class="flex items-center text-base">
                                <i class="fas fa-video mr-2 text-xl"></i>
                                <span class="relative text-sm">
                                    LIVE
                                </span>
                            </span>
                        </a>
                        <a href="{{ route('sub-add') }}"
                            class="hidden lg:block rounded-lg relative text-white bg-[#ee1a3b] font-bold py-2 px-4 border-2 border-white group overflow-hidden">
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-black">
                                PREMIUM
                            </span>
                            <span
                                class="absolute inset-0 bg-white transition-transform duration-300 transform -translate-x-full group-hover:translate-x-0"></span>
                        </a>


                        <style>
                            /* Style par défaut pour les écrans plus grands */
                            .live-button {
                                font-size: 18px;
                                /* Taille du texte pour les écrans plus grands */
                                padding: 10px 20px;
                                /* Taille du bouton pour les écrans plus grands */
                                border: none;
                                /* Supprime les bordures blanches */
                            }

                            /* Pour les écrans mobiles */
                            @media (max-width: 768px) {
                                .live-button {
                                    font-size: 13px;
                                    /* Réduit la taille du texte */
                                    padding: 7px 15px;
                                    /* Réduit la taille du bouton */
                                }

                                /* Masque le fond blanc sur mobile */
                                .live-button span.absolute {
                                    display: none;
                                    /* Supprime le carré blanc sur mobile */
                                }
                            }
                        </style>
                        <style>
                            /* Media query pour les écrans de plus de 1023px */
                            @media (min-width: 1024px) {

                                .live-button,
                                .login-button {
                                    padding: 0.5rem 1rem;
                                    /* Réduire le padding */
                                    font-size: 0.875rem;
                                    /* Réduire la taille de police */
                                }
                            }
                        </style>



                        @guest
                            <a href="{{ route('login_page') }}"
                                class="login-button relative text-white font-bold py-2 px-4 border-2 border-white rounded-none group overflow-hidden">
                                <span class="relative z-10 transition-colors duration-300 group-hover:text-black">
                                    CONNEXION
                                </span>
                                <span
                                    class="absolute inset-0 bg-white transition-transform duration-300 transform -translate-x-full group-hover:translate-x-0"></span>
                            </a>
                            <style>
                                .login-button {
                                    display: inline-block;
                                    /* Assurez-vous que le bouton s'affiche par défaut */
                                    border-radius: 10px;
                                }

                                @media (max-width: 640px) {

                                    /* Cible les écrans mobiles */
                                    .login-button {
                                        display: none;
                                        /* Masque le bouton sur mobile */
                                    }
                                }

                                @media (max-width: 1023px) {
                                    .login-button {
                                        display: none;
                                        /* Masquer le bouton jusqu'à 1023px */
                                    }
                                }
                            </style>

                        @endguest
                        <!-- Header Controls -->
                        <div class="flex">

                            <div class="flex items-center py-4 px-1 sm:px-2">
                                <label for="theme-toggle" class="relative inline-flex cursor-pointer items-center">
                                    <input type="checkbox" value="" id="theme-toggle" class="peer sr-only">
                                    <span
                                        class="relative z-10 block h-6 w-11 rounded-full border-2 border-white after:absolute after:top-0.5 after:left-0.5 after:h-4 after:w-4 after:rounded-full after:bg-white after:transition-transform peer-checked:after:translate-x-[20px]"></span>
                                    <svg role="img"
                                        class="pointer-events-none absolute left-[5px] top-1 h-4 w-4 stroke-white">
                                        <use xlink:href="assets/img/yt1/sprite.svg#sun"></use>


                                        @if (Route::is('video-watch'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#sun"></use>
                                        @endif
                                        @if (Route::is('password.request') || Route::is('password.reset'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#sun"></use>
                                        @endif

                                        @if (Route::is('videos.search') || Route::is('videos.search'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#sun"></use>
                                        @endif
                                    </svg>

                                    <svg role="img"
                                        class="pointer-events-none absolute right-[5px] top-1 h-4 w-4 stroke-white">
                                        <use xlink:href="assets/img/yt1/sprite.svg#moon"></use>
                                        @if (Route::is('video-watch'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#moon"></use>
                                        @endif
                                        @if (Route::is('password.request') || Route::is('password.reset'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#moon"></use>
                                        @endif

                                        @if (Route::is('videos.search') || Route::is('videos.search'))
                                            <use xlink:href="/assets/img/yt1/sprite.svg#moon"></use>
                                        @endif

                                    </svg>





                                </label>
                            </div>

                            <div
                                class="relative [&>.sub-menu]:lg:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:lg:hover:opacity-100">

                                @if (Auth::check())
                                    <a class="block py-4 px-2 xl:px-3" href="{{ route('account') }}">
                                        @if (request()->is('watch-video'))
                                            <!-- Vérifie si l'URL est 'watch-video' -->
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQLHZh0aF5Og2DF4G19yPVx_QGjXfaBByFZA&amp;s"
                                                class="h-6 w-6 fill-white" alt="Profile Icon">
                                        @else
                                            <svg role="img" class="h-6 w-6 fill-white">
                                                <use xlink:href="{{ asset('assets/img/yt1/sprite.svg#user') }}"></use>
                                            </svg>
                                        @endif
                                    </a>
                                @endif

                                <ul
                                    class="sub-menu invisible absolute right-full z-20 -mr-9 flex w-52 origin-top-right flex-col bg-white dark:bg-gray-800 py-5 text-sm font-bold opacity-0 shadow-2xl transition-all">
                                    @if (Auth::check())
                                        <li class="px-7">
                                            <a class="flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                                                href="{{ route('account') }}">
                                                VOTRE COMPTE
                                            </a>
                                        </li>


                                        <li class="px-7">
                                            <a class="flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                                                href="{{ route('sub-page') }}">
                                                HISTORIQUE
                                            </a>
                                        </li>
                                    @endif
                                    <li class="hidden px-7">
                                        <a class="flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                                            href="_yt1-account-orders.html">
                                            Parametres
                                        </a>
                                    </li>
                                    <li class="px-7">
                                        @if (Auth::check())
                                            <form action="{{ route('logout') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="flex items-center justify-center rounded-lg bg-transparent hover:bg-opacity-90 py-2 px-4 text-primary dark:text-white transition-colors hover:text-dark dark:hover:text-white">

                                                    DÉCONNEXION
                                                </button>
                                            </form>
                                        @else
                                            <a class="hidden flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                                                href="{{ route('login_page') }}">
                                                CONNEXION
                                            </a>
                                        @endif
                                    </li>

                                </ul>

                            </div>


                            <div
                                class="hidden relative [&>.sub-menu]:lg:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:lg:hover:opacity-100">

                                <div
                                    class="sub-menu invisible absolute right-full z-20 -mr-8 w-[400px] origin-top-right bg-white dark:bg-gray-800 py-7 text-primary dark:text-white opacity-0 shadow-2xl transition-all">


                                </div>

                            </div>

                            <button class="js-menu-toggle -mr-2 inline-flex py-4 px-2 sm:px-3 lg:hidden xl:px-4">
                                <svg role="img" class="js-menu-toggle-icon-open h-6 w-6 fill-white">
                                    <use xlink:href="assets/img/yt1/sprite.svg#menu"></use>
                                </svg>
                                <svg role="img" class="js-menu-toggle-icon-close hidden h-6 w-6 fill-white">
                                    <use xlink:href="assets/img/yt1/sprite.svg#menu-close"></use>
                                </svg>
                            </button>
                            <br>
                            <br>
                        </div>
                        <!-- Header Controls / End -->

                </nav>
            </div>
        </header>
        <!-- Mobile Menu -->
        <div
            class="js-mobile-menu mt-[16px] p-t-[64px] fixed left-0 top-[64px] z-50 block h-[calc(100dvh-64px)] w-full translate-x-full overflow-auto bg-white dark:bg-gray-800 py-5 text-primary dark:text-white transition-transform duration-300 lg:hidden">
            <div class="container">
                <!-- Navigation (Mobile) -->
                <ul class="text-md flex flex-col font-bold">
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="hidden flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('home') }}">
                        </a>
                    </li>
                    <li
                        class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('portrait') }}">
                            PORTRAIT
                        </a>

                        <button
                            class="hidden js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                            <svg role="img"
                                class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                            </svg>
                        </button>

                        <ul
                            class="hidden flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-[#ee1a3b]"
                                    href="_yt1-videos-grid-3.html">
                                    Videos - 3 Cols
                                </a>

                            </li>
                            <li class="hidden flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-[#ee1a3b]"
                                    href="">
                                    Videos - 4 Cols
                                </a>

                            </li>
                        </ul>

                    </li>

                    </li>

                    <li
                        class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('events') }}">
                            EVENTS
                        </a>

                    </li>
                    <li
                        class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('opinion') }}">
                            OPINION
                        </a>

                    </li>

                    <li
                        class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('insolite') }}">
                            INSOLITE
                        </a>

                    </li>



                    <li
                        class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                            href="{{ route('sub-add') }}">
                            PREMIUM
                        </a>

                    </li>
                    @auth
                        <!-- Ajout des liens Abonnement, Mon compte, et Déconnexion -->
                        <li
                            class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                            <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                                href="{{ route('sub-page') }}">
                                HISTORIQUE
                            </a>
                        </li>
                        <li
                            class="text-sm hidden flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                            <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                                href="{{ route('account') }}">
                                VOTRE COMPTE
                            </a>
                        </li>
                        <li class="flex flex-wrap items-center gap-x-4 dark:border-b-gray-200/10">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-sm rounded-lg hover:bg-opacity-80 w-full text-left py-4 leading-normal transition-colors hover:text-white">
                                    DÉCONNEXION
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li
                            class="text-sm flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                            <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-[#ee1a3b]"
                                href="{{ route('login_page') }}">
                                CONNEXION
                            </a>


                            <button
                                class="hidden js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                                <svg role="img"
                                    class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                    <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                                </svg>
                            </button>
                            <ul
                                class="hidden flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                                <li class="flex flex-wrap items-center gap-x-4">
                                    <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-[#ee1a3b]"
                                        href="{{ route('login_page') }}">
                                        Login
                                    </a>
                                </li>
                                <li class="flex flex-wrap items-center gap-x-4">
                                    <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-[#ee1a3b]"
                                        href="{{ route('register_page') }}">
                                        Register
                                    </a>
                                </li>
                                <li class="hidden flex flex-wrap items-center gap-x-4">
                                    <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-[#ee1a3b]"
                                        href="_yt1-account.html">
                                        Account
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest


                    </li>
                </ul>
                <!-- Navigation (Mobile) / End -->
            </div>
        </div>
        <!-- Mobile Menu / End -->
