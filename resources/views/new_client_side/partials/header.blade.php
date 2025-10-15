<div class="container">
    <nav class="flex min-h-[64px] items-center justify-between py-1 lg:min-h-[90px] lg:py-4">
        <!-- Logo -->
        <div class="logo-container flex flex-col h-full js-site-wrapper">
            <a href="{{ route('home') }}">
                <div class="logo-wrapper">
                    <img src="{{ asset('mygp-images/logo-gp.png') }}" alt="Logo Grand Public"
                        class="logo h-auto w-[60px] sm:w-[80px] md:w-[100px] lg:w-[120px]" />
                </div>
            </a>
        </div>
        <!-- Logo / End -->

        <!-- Navigation (Desktop) -->
        <ul class="hidden gap-x-7 xl:gap-x-10 text-sm font-bold lg:flex">
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-left after:scale-x-100"
                    href="{{ route('portrait') }}">
                    Portrait
                </a>
            </li>
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                    href="{{ route('opinion') }}">
                    Opinion
                </a>
            </li>
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                    href="{{ route('experience') }}">
                    Experience
                </a>
            </li>
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                    href="{{ route('about') }}">
                    À Propos
                </a>
            </li>
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                    href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
            <li class="">
                <a class="uppercase relative inline-flex items-center gap-x-2 leading-10 after:absolute after:bottom-[7px] after:left-0 after:h-[2px] after:bg-white after:transition-transform after:w-full after:origin-right hover:after:origin-left after:scale-x-0 hover:after:scale-x-100"
                    href="{{ route('sub-page') }}">
                    Premium
                </a>
            </li>
        </ul>
        <!-- Navigation (Desktop) / End -->

        <!-- Header Controls -->
        <div class="flex">

            <button class="-mr-2 inline-flex py-4 px-2 sm:px-3 xl:px-4">
                <a href="{{ route('live') }}" class="uppercase">
                    Live
                </a>
            </button>

            <button class="-mr-2 inline-flex py-4 px-2 sm:px-3 xl:px-4">
                <a href="{{ route('login_page') }}" class="uppercase">
                    Connexion
                </a>
            </button>

            <div class="flex items-center py-4 px-1 sm:px-2">
                <label for="theme-toggle" class="relative inline-flex cursor-pointer items-center">
                    <input type="checkbox" value="" id="theme-toggle" class="peer sr-only">
                    <span
                        class="relative z-10 block h-6 w-11 rounded-full border-2 border-white after:absolute after:top-0.5 after:left-0.5 after:h-4 after:w-4 after:rounded-full after:bg-white after:transition-transform peer-checked:after:translate-x-[20px]"></span>
                    <svg role="img" class="pointer-events-none absolute left-[5px] top-1 h-4 w-4 stroke-white">
                        <use xlink:href="assets/img/yt1/sprite.svg#sun"></use>
                    </svg>
                    <svg role="img" class="pointer-events-none absolute right-[5px] top-1 h-4 w-4 stroke-white">
                        <use xlink:href="assets/img/yt1/sprite.svg#moon"></use>
                    </svg>
                </label>
            </div>

            <div
                class="relative [&>.sub-menu]:lg:hover:visible [&>.sub-menu]:hover:animate-popper-pop-in [&>.sub-menu]:lg:hover:opacity-100">
                <a class="block py-4 px-2 xl:px-3" href="_yt1-account.html">
                    <svg role="img" class="h-6 w-6 fill-white">
                        <use xlink:href="assets/img/yt1/sprite.svg#user"></use>
                    </svg>
                </a>

                <ul
                    class="sub-menu invisible absolute right-full z-20 -mr-9 flex w-52 origin-top-right flex-col bg-white dark:bg-gray-800 py-5 text-sm font-bold opacity-0 shadow-2xl transition-all">

                    <li class="px-7">
                        <a class="uppercase flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                            href="{{ route('account') }}">
                            Mon Compte
                        </a>
                    </li>
                    <li class="px-7">
                        <a class="uppercase flex flex-row-reverse items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"
                            href="{{ route('sub-page') }}">
                            Abonnemment
                        </a>
                    </li>
                    <li class="px-7">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="l12PZi27mr4qeUtJsTQ1G9KQSdjsO9Wyj8QlahVa"
                                autocomplete="off"> <button type="submit"
                                class="uppercase bg-red-600 flex flex-row-reverse rounded-lg hover:bg-opacity-90 items-center justify-between py-2 text-primary dark:text-white transition-colors hover:text- dark:hover:text-">
                                Se Déconnecter
                            </button>
                        </form>
                    </li>
                </ul>

            </div>

            <button class="js-menu-toggle -mr-2 inline-flex py-4 px-2 sm:px-3 lg:hidden xl:px-4">
                <svg role="img" class="js-menu-toggle-icon-open h-6 w-6 fill-white">
                    <use xlink:href="assets/img/yt1/sprite.svg#menu"></use>
                </svg>
                <svg role="img" class="js-menu-toggle-icon-close hidden h-6 w-6 fill-white">
                    <use xlink:href="assets/img/yt1/sprite.svg#menu-close"></use>
                </svg>
            </button>

        </div>
        <!-- Header Controls / End -->

    </nav>
</div>
