@extends('layouts.app')
@section('content')

    <body class="code-block overflow-x-hidden">

        <style>
            html,
            body {
                width: 100%;
                position: relative;
                overflow-x: hidden;
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }
        </style>

        <div id="site-wrapper" class="js-site-wrapper flex h-full flex-col">
            <header>
                <nav></nav>
        </div>
        </header>

        <div class="bg-primary relative z-10 mt-[90px] h-[15vh] md:mt-[100px] md:h-[62vh] lg:mt-[140px]">
            <div class="swiper js-vv-hero-swiper h-full w-full">

                <div class="swiper-wrapper vv-hero-swiper-wrapper">

                    @foreach ($slides as $slide)
                        <div class="swiper-slide group">
                            <div class="absolute inset-0 -z-10 h-full w-full bg-cover bg-center bg-no-repeat opacity-0 transition-opacity duration-[2000ms] ease-out group-[.swiper-slide-active]:opacity-100"
                                style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div
                class="vv-hero-swiper-pagination js-vv-hero-swiper-pagination vv-pagination-circle-bullets absolute !bottom-auto !left-auto right-4 top-1/2 z-20 flex !w-4 -translate-y-[calc(50%+40px)] flex-col gap-[10px] lg:right-10 lg:-translate-y-[calc(50%+70px)]">
            </div>
        </div>
        </div>
        <br><br>
        <main id="main-content" class="grow lg:pt-0">

            <section class="">
                <div class="container sm:-mt-8 md:m-32">
                    <div class="relative z-30 flex flex-col py-10 md:-mt-28 md:flex-row md:justify-between">

                        <div class="relative">

                            <div class="swiper js-vv-videos-featured-swiper md:w-[1236px] lg:w-[1278px] xl:w-[2068px]">
                                <h3 class="text-2xl font-bold uppercase text-[#d81a3b] lg:text-4xl">
                                    NOUVEAUTÉS</h3><br>
                                <div class="swiper-wrapper">

                                    @foreach ($latest_videos as $video)
                                        <div class="swiper-slide">
                                            <div>
                                                <figure class="mb-6">
                                                    <a class="group relative block h-full overflow-hidden bg-gray-900"
                                                        href="{{ route('video-watch', ['slug' => $video->slug]) }}"
                                                        target="_self">
                                                        <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                                            src="{{ $video->video_thumbnail }}" alt="{{ $video->title }}">
                                                        <span
                                                            class="absolute left-1/2 top-1/2 flex aspect-square w-[60px] -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b]">
                                                            <svg role="img" class="ml-[3px] h-5 w-4 fill-white">
                                                                <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </figure>
                                                <div>
                                                    <h3
                                                        class="text-primary mb-3 font-bold leading-tight lg:text-lg lg:leading-6 dark:text-white">
                                                        {{ $video->title }}
                                                        @if ($video->premium_video)
                                                            <span class="ml-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="h-6 w-6 text-red-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                                                </svg>
                                                            </span>
                                                        @endif
                                                    </h3>
                                                    <ul class="flex text-sm leading-tight tracking-tighter">
                                                        <li class="mr-2">{{ $video->youtube_view_count }} vues</li>
                                                        <li class="ml-auto">
                                                            {{ \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="absolute -top-[10px] left-0 z-10 min-[1330px]:-left-20 min-[1330px]:translate-x-0">
                            <div class="flex flex-wrap items-center justify-between">
                                <div class="flex">
                                    <div
                                        class="js-vv-videos-featured-swiper-btn-prev text-primary relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-left before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-[#ee1a3b] hover:before:origin-right hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-[#ee1a3b]">
                                        <svg class="h-[10px] w-[10px]" fill="currentColor">
                                            <use xlink:href="assets/img/yt1/sprite.svg#chevron-left"></use>
                                        </svg>
                                    </div>
                                    <div
                                        class="js-vv-videos-featured-swiper-btn-next text-primary relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-right before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-[#ee1a3b] hover:before:origin-left hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-[#ee1a3b]">
                                        <svg class="h-[10px] w-[10px]" fill="currentColor">
                                            <use xlink:href="assets/img/yt1/sprite.svg#chevron-right"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="shadow-3xl absolute inset-y-0 -left-10 -right-full bg-white min-[1330px]:-left-20 dark:bg-gray-800">
            </section>

            <section class="py-8 md:py-14 lg:py-16 xl:py-[75px]">
                <div class="container mx-auto px-4">
                    @php
                        $orderedCategories = [
                            'PORTRAIT' => isset($videosByCategory['portrait']) ? $videosByCategory['portrait'] : [],
                            'EVENTS' => isset($videosByCategory['events']) ? $videosByCategory['events'] : [],
                            'OPINION' => isset($videosByCategory['opinion']) ? $videosByCategory['opinion'] : [],
                            'INSOLITE' => isset($videosByCategory['insolite']) ? $videosByCategory['insolite'] : [],
                        ];
                    @endphp

                    @foreach ($orderedCategories as $categoryName => $videos)
                        @if (count($videos) > 0)
                            <div class="category-section relative mb-20">
                                <div class="mb-4 flex items-center justify-between">
                                    <a href="{{ route(strtolower($categoryName)) }}">
                                        <h3 class="text-2xl font-bold uppercase text-[#d81a3b] lg:text-4xl">
                                            {{ $categoryName }}</h3>
                                    </a>
                                    <div class="flex space-x-4">
                                        <div
                                            class="swiper-button-prev-{{ strtolower($categoryName) }} flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-black text-white transition-colors duration-200 hover:bg-[#d81a3b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </div>
                                        <div
                                            class="swiper-button-next-{{ strtolower($categoryName) }} flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-black text-white transition-colors duration-200 hover:bg-[#d81a3b]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-{{ strtolower($categoryName) }} overflow-hidden">

                                    <div class="swiper-wrapper">
                                        @foreach ($videos as $video)
                                            <div class="swiper-slide">
                                                <div class="h-full">
                                                    <figure class="mb-6 aspect-video">
                                                        <a class="group relative block h-full overflow-hidden bg-gray-900"
                                                            href="{{ route('video-watch', ['slug' => $video->slug]) }}"
                                                            target="_self">
                                                            <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                                                src="{{ $video->video_thumbnail }}"
                                                                alt="{{ $video->title }}">
                                                            <span
                                                                class="absolute left-1/2 top-1/2 flex aspect-square w-[60px] -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b]">
                                                                <svg role="img" class="ml-[3px] h-5 w-4 fill-white">
                                                                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </figure>
                                                    <div>
                                                        <h3
                                                            class="text-primary mb-3 flex items-center justify-between font-bold leading-tight lg:text-lg lg:leading-6 dark:text-white">
                                                            {{ $video->title }}
                                                            @if ($video->premium_video)
                                                                <span class="ml-auto">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        class="h-6 w-6 text-red-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                                                    </svg>
                                                                </span>
                                                            @endif
                                                        </h3>
                                                        <ul class="flex text-sm leading-tight tracking-tighter">
                                                            <li class="mr-2">{{ $video->youtube_view_count }} vues</li>
                                                            <li class="ml-auto">
                                                                {{ \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </section>

            <section class="dark">
                <div
                    class="relative isolate z-10 mt-[-150px] py-14 md:mt-[-200px] md:py-32 lg:mt-[-250px] lg:py-44 xl:mt-[-300px] xl:py-48">
                    <div>
                        <div class="relative flex aspect-[1000/560] w-full flex-col items-center justify-between">
                            <div class="flex flex-col flex-wrap items-center justify-center gap-y-6 xl:gap-y-12">

                            </div>

                            <!-- Image de fond couvrant toute la section -->
                            <div class="absolute inset-0 -z-10 h-full w-full">
                                <div
                                    class="absolute inset-0 -z-10 bg-[url('../../../mygp-images/coverGP.jpg')] bg-cover bg-center bg-no-repeat opacity-90 transition-transform duration-[8000ms] ease-out group-[.swiper-slide-active]:scale-110">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-4 mt-[-80px] md:mb-8 md:mt-[-130px] lg:mb-12 lg:mt-[-175px] xl:mb-16 xl:mt-[-193px]">

                <section class="relative overflow-hidden">
                    <div
                        class="relative isolate overflow-hidden pb-8 pt-16 after:absolute after:inset-x-0 after:bottom-16 after:top-0 after:-z-20 after:bg-gray-100 sm:pb-10 sm:pt-20 after:sm:bottom-24 md:pb-12 md:pt-32 after:md:bottom-28 lg:pb-16 lg:pt-36 after:lg:bottom-44 xl:pb-20 xl:pt-48 after:xl:bottom-60 dark:after:bg-gray-800">
                        <div class="container">
                            <div
                                class="mb-12 flex flex-col flex-wrap items-baseline justify-between gap-y-6 overflow-hidden sm:mb-16 sm:flex-row md:mb-20 lg:mb-24 xl:mb-28 xl:gap-y-12">
                                <div class="flex flex-col-reverse gap-y-2 sm:gap-y-3 md:gap-y-4 lg:gap-y-5 xl:gap-y-6">
                                    <h3
                                        class="leadin-none text-primary xl:text-6.5xl firefox-mobile:text-2xl mt-3 text-3xl font-bold tracking-tight sm:text-4xl md:text-3xl lg:text-6xl xl:leading-none dark:text-white">
                                        VOTRE CHAÎNE YOUTUBE
                                    </h3>
                                    <style>
                                        @-moz-document url-prefix() {
                                            @media (max-width: 768px) {
                                                .firefox-mobile\:text-2xl {
                                                    font-size: 1.5rem;
                                                }
                                            }
                                        }
                                    </style>

                                </div>
                            </div>

                            <div class="mb-8 grid gap-5 sm:mb-16 md:mb-20 md:grid-cols-2 md:gap-[30px] xl:-mt-3 xl:mb-28">
                                <div
                                    class="text-primary xl:text-3.5xl text-xl tracking-tighter md:text-2xl lg:text-3xl lg:leading-snug xl:leading-snug dark:text-white">
                                    Découvrez les dernières nouveautés en matière de vidéos et bien plus encore !
                                </div>
                                <div class="tracking-tighter md:text-lg lg:pl-[70px] xl:leading-8">
                                    Découvrez tout ce que vous devez savoir sur les vidéos disponibles en
                                    ligne ! Des vidéos captivantes, éducatives et divertissantes couvrant une grande variété
                                    de sujets pour informer et divertir le grand public. Profitez de contenus exclusifs
                                    pour enrichir vos moments de détente, et prenez des décisions éclairées sur les vidéos à
                                    regarder ou à partager avec vos proches !
                                </div>
                            </div>

                            <div class="block aspect-video">
                                <a href="" class="group relative block h-full overflow-hidden bg-gray-900">

                                    <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                        src="assets/img/yt1/samples/home-video-cover.jpg" alt="">

                                    <span
                                        class="absolute left-1/2 top-1/2 flex aspect-square w-14 -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b] md:w-20">
                                        <svg role="img" class="mr-[-3px] h-7 w-7 fill-white">
                                            <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                        </svg>
                                    </span>

                                    <div
                                        class="absolute left-8 top-10 hidden -rotate-[4deg] -skew-x-6 sm:block md:left-10 md:top-12 lg:left-16 lg:top-20">
                                        <div
                                            class="bg-primary lg:text-3.5xl w-fit px-2 text-2xl font-bold uppercase leading-tight tracking-tighter text-white lg:px-3 lg:py-1">
                                            Bienvenue sur</div>
                                        <div
                                            class="lg:text-6.5xl w-fit bg-[#ee1a3b] px-3 py-[1px] text-4xl font-bold uppercase leading-none tracking-tighter text-white lg:px-4">
                                            Grand Public !</div>
                                    </div>
                                </a>
                            </div>

                        </div>

                        <svg class="js-vv-svg-diamond-bg pointer-events-none absolute -top-[315px] left-1/2 -z-10 fill-violet-300 dark:opacity-30"
                            width="1060" height="1151" viewBox="0 0 1060 1151" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M695.514 361.776L630.777 426.513C624.819 432.471 615.157 432.471 609.199 426.513L544.462 361.776C538.503 355.817 538.503 346.156 544.462 340.197L609.199 275.461C615.157 269.501 624.819 269.501 630.777 275.461L695.514 340.197C701.473 346.156 701.473 355.817 695.514 361.776ZM695.514 181.776L630.777 246.513C624.819 252.471 615.157 252.471 609.199 246.513L544.462 181.776C538.503 175.818 538.503 166.156 544.462 160.197L609.199 95.461C615.157 89.502 624.819 89.502 630.777 95.461L695.514 160.197C701.473 166.156 701.473 175.818 695.514 181.776ZM605.514 91.776L540.777 156.512C534.819 162.471 525.157 162.471 519.199 156.512L454.462 91.776C448.503 85.817 448.503 76.156 454.462 70.197L519.199 5.46101C525.157 -0.49799 534.819 -0.49799 540.777 5.46101L605.514 70.197C611.473 76.156 611.473 85.817 605.514 91.776ZM515.514 160.197C521.473 166.156 521.473 175.818 515.514 181.776L450.777 246.513C444.819 252.471 435.157 252.471 429.199 246.513L364.462 181.776C358.503 175.818 358.503 166.156 364.462 160.197L429.199 95.461C435.157 89.502 444.819 89.502 450.777 95.461L515.514 160.197ZM425.514 91.776L360.777 156.512C354.819 162.471 345.157 162.471 339.199 156.512L274.462 91.776C268.503 85.817 268.503 76.156 274.462 70.197L339.199 5.46101C345.157 -0.49799 354.819 -0.49799 360.777 5.46101L425.514 70.197C431.473 76.156 431.473 85.817 425.514 91.776ZM274.462 250.197L339.199 185.461C345.157 179.502 354.819 179.502 360.777 185.461L425.514 250.197C431.473 256.156 431.473 265.817 425.514 271.776L360.777 336.513C354.819 342.471 345.157 342.471 339.199 336.513L274.462 271.776C268.503 265.817 268.503 256.156 274.462 250.197ZM274.462 430.197L339.199 365.461C345.157 359.502 354.819 359.502 360.777 365.461L425.514 430.197C431.473 436.156 431.473 445.817 425.514 451.776L360.777 516.512C354.819 522.472 345.157 522.472 339.199 516.512L274.462 451.776C268.503 445.817 268.503 436.156 274.462 430.197ZM364.462 520.197L429.199 455.461C435.157 449.502 444.819 449.502 450.777 455.461L515.514 520.197C521.473 526.156 521.473 535.817 515.514 541.776L450.777 606.513C444.819 612.471 435.157 612.471 429.199 606.513L364.462 541.776C358.503 535.817 358.503 526.156 364.462 520.197ZM515.514 361.776L450.777 426.513C444.819 432.471 435.157 432.471 429.199 426.513L364.462 361.776C358.503 355.817 358.503 346.156 364.462 340.197L429.199 275.461C435.157 269.501 444.819 269.501 450.777 275.461L515.514 340.197C521.473 346.156 521.473 355.817 515.514 361.776ZM454.462 451.776C448.503 445.817 448.503 436.156 454.462 430.197L519.199 365.461C525.157 359.502 534.819 359.502 540.777 365.461L605.514 430.197C611.473 436.156 611.473 445.817 605.514 451.776L540.777 516.512C534.819 522.472 525.157 522.472 519.199 516.512L454.462 451.776ZM544.462 520.197L609.199 455.461C615.157 449.502 624.819 449.502 630.777 455.461L695.514 520.197C701.473 526.156 701.473 535.817 695.514 541.776L630.777 606.513C624.819 612.471 615.157 612.471 609.199 606.513L544.462 541.776C538.503 535.817 538.503 526.156 544.462 520.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M184.462 520.197L249.199 455.461C255.157 449.502 264.819 449.502 270.777 455.461L335.514 520.197C341.473 526.156 341.473 535.817 335.514 541.776L270.777 606.513C264.819 612.471 255.157 612.471 249.199 606.513L184.462 541.776C178.503 535.817 178.503 526.156 184.462 520.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M1055.51 361.776L990.777 426.513C984.819 432.471 975.157 432.471 969.199 426.513L904.462 361.776C898.503 355.817 898.503 346.156 904.462 340.197L969.199 275.461C975.157 269.501 984.819 269.501 990.777 275.461L1055.51 340.197C1061.47 346.156 1061.47 355.817 1055.51 361.776ZM1055.51 181.776L990.777 246.513C984.819 252.471 975.157 252.471 969.199 246.513L904.462 181.776C898.503 175.818 898.503 166.156 904.462 160.197L969.199 95.461C975.157 89.502 984.819 89.502 990.777 95.461L1055.51 160.197C1061.47 166.156 1061.47 175.818 1055.51 181.776ZM965.514 91.776L900.777 156.512C894.819 162.471 885.157 162.471 879.199 156.512L814.462 91.776C808.503 85.817 808.503 76.156 814.462 70.197L879.199 5.46101C885.157 -0.49799 894.819 -0.49799 900.777 5.46101L965.514 70.197C971.473 76.156 971.473 85.817 965.514 91.776ZM875.514 160.197C881.473 166.156 881.473 175.818 875.514 181.776L810.777 246.513C804.819 252.471 795.157 252.471 789.199 246.513L724.462 181.776C718.503 175.818 718.503 166.156 724.462 160.197L789.199 95.461C795.157 89.502 804.819 89.502 810.777 95.461L875.514 160.197ZM785.514 91.776L720.777 156.512C714.819 162.471 705.157 162.471 699.199 156.512L634.462 91.776C628.503 85.817 628.503 76.156 634.462 70.197L699.199 5.46101C705.157 -0.49799 714.819 -0.49799 720.777 5.46101L785.514 70.197C791.473 76.156 791.473 85.817 785.514 91.776ZM634.462 250.197L699.199 185.461C705.157 179.502 714.819 179.502 720.777 185.461L785.514 250.197C791.473 256.156 791.473 265.817 785.514 271.776L720.777 336.513C714.819 342.471 705.157 342.471 699.199 336.513L634.462 271.776C628.503 265.817 628.503 256.156 634.462 250.197ZM724.462 340.197L789.199 275.461C795.157 269.501 804.819 269.501 810.777 275.461L875.514 340.197C881.473 346.156 881.473 355.817 875.514 361.776L810.777 426.513C804.819 432.471 795.157 432.471 789.199 426.513L724.462 361.776C718.503 355.817 718.503 346.156 724.462 340.197ZM724.462 520.197L789.199 455.461C795.157 449.502 804.819 449.502 810.777 455.461L875.514 520.197C881.473 526.156 881.473 535.817 875.514 541.776L810.777 606.513C804.819 612.471 795.157 612.471 789.199 606.513L724.462 541.776C718.503 535.817 718.503 526.156 724.462 520.197ZM814.462 271.776C808.503 265.817 808.503 256.156 814.462 250.197L879.199 185.461C885.157 179.502 894.819 179.502 900.777 185.461L965.514 250.197C971.473 256.156 971.473 265.817 965.514 271.776L900.777 336.513C894.819 342.471 885.157 342.471 879.199 336.513L814.462 271.776ZM814.462 451.776C808.503 445.817 808.503 436.156 814.462 430.197L879.199 365.461C885.157 359.502 894.819 359.502 900.777 365.461L965.514 430.197C971.473 436.156 971.473 445.817 965.514 451.776L900.777 516.512C894.819 522.472 885.157 522.472 879.199 516.512L814.462 451.776ZM904.462 520.197L969.199 455.461C975.157 449.502 984.819 449.502 990.777 455.461L1055.51 520.197C1061.47 526.156 1061.47 535.817 1055.51 541.776L990.777 606.513C984.819 612.471 975.157 612.471 969.199 606.513L904.462 541.776C898.503 535.817 898.503 526.156 904.462 520.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M695.514 901.776L630.777 966.512C624.819 972.472 615.157 972.472 609.199 966.512L544.462 901.776C538.503 895.817 538.503 886.156 544.462 880.197L609.199 815.46C615.157 809.502 624.819 809.502 630.777 815.46L695.514 880.197C701.473 886.156 701.473 895.817 695.514 901.776ZM695.514 721.776L630.777 786.512C624.819 792.471 615.157 792.471 609.199 786.512L544.462 721.776C538.503 715.817 538.503 706.156 544.462 700.197L609.199 635.46C615.157 629.502 624.819 629.502 630.777 635.46L695.514 700.197C701.473 706.156 701.473 715.817 695.514 721.776ZM605.514 631.776L540.777 696.513C534.819 702.471 525.157 702.471 519.199 696.513L454.462 631.776C448.503 625.818 448.503 616.156 454.462 610.197L519.199 545.461C525.157 539.501 534.819 539.501 540.777 545.461L605.514 610.197C611.473 616.156 611.473 625.818 605.514 631.776ZM515.514 700.197C521.473 706.156 521.473 715.817 515.514 721.776L450.777 786.512C444.819 792.471 435.157 792.471 429.199 786.512L364.462 721.776C358.503 715.817 358.503 706.156 364.462 700.197L429.199 635.46C435.157 629.502 444.819 629.502 450.777 635.46L515.514 700.197ZM425.514 631.776L360.777 696.513C354.819 702.471 345.157 702.471 339.199 696.513L274.462 631.776C268.503 625.818 268.503 616.156 274.462 610.197L339.199 545.461C345.157 539.501 354.819 539.501 360.777 545.461L425.514 610.197C431.473 616.156 431.473 625.818 425.514 631.776ZM274.462 790.197L339.199 725.461C345.157 719.502 354.819 719.502 360.777 725.461L425.514 790.197C431.473 796.156 431.473 805.817 425.514 811.776L360.777 876.513C354.819 882.471 345.157 882.471 339.199 876.513L274.462 811.776C268.503 805.817 268.503 796.156 274.462 790.197ZM274.462 970.197L339.199 905.461C345.157 899.502 354.819 899.502 360.777 905.461L425.514 970.197C431.473 976.156 431.473 985.817 425.514 991.776L360.777 1056.51C354.819 1062.47 345.157 1062.47 339.199 1056.51L274.462 991.776C268.503 985.817 268.503 976.156 274.462 970.197ZM364.462 1060.2L429.199 995.461C435.157 989.502 444.819 989.502 450.777 995.461L515.514 1060.2C521.473 1066.16 521.473 1075.82 515.514 1081.78L450.777 1146.51C444.819 1152.47 435.157 1152.47 429.199 1146.51L364.462 1081.78C358.503 1075.82 358.503 1066.16 364.462 1060.2ZM515.514 901.776L450.777 966.512C444.819 972.472 435.157 972.472 429.199 966.512L364.462 901.776C358.503 895.817 358.503 886.156 364.462 880.197L429.199 815.46C435.157 809.502 444.819 809.502 450.777 815.46L515.514 880.197C521.473 886.156 521.473 895.817 515.514 901.776ZM454.462 991.776C448.503 985.817 448.503 976.156 454.462 970.197L519.199 905.461C525.157 899.502 534.819 899.502 540.777 905.461L605.514 970.197C611.473 976.156 611.473 985.817 605.514 991.776L540.777 1056.51C534.819 1062.47 525.157 1062.47 519.199 1056.51L454.462 991.776ZM544.462 1060.2L609.199 995.461C615.157 989.502 624.819 989.502 630.777 995.461L695.514 1060.2C701.473 1066.16 701.473 1075.82 695.514 1081.78L630.777 1146.51C624.819 1152.47 615.157 1152.47 609.199 1146.51L544.462 1081.78C538.503 1075.82 538.503 1066.16 544.462 1060.2Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M1055.51 901.776L990.777 966.512C984.819 972.472 975.157 972.472 969.199 966.512L904.462 901.776C898.503 895.817 898.503 886.156 904.462 880.197L969.199 815.46C975.157 809.502 984.819 809.502 990.777 815.46L1055.51 880.197C1061.47 886.156 1061.47 895.817 1055.51 901.776ZM1055.51 721.776L990.777 786.512C984.819 792.471 975.157 792.471 969.199 786.512L904.462 721.776C898.503 715.817 898.503 706.156 904.462 700.197L969.199 635.46C975.157 629.502 984.819 629.502 990.777 635.46L1055.51 700.197C1061.47 706.156 1061.47 715.817 1055.51 721.776ZM965.514 631.776L900.777 696.513C894.819 702.471 885.157 702.471 879.199 696.513L814.462 631.776C808.503 625.818 808.503 616.156 814.462 610.197L879.199 545.461C885.157 539.501 894.819 539.501 900.777 545.461L965.514 610.197C971.473 616.156 971.473 625.818 965.514 631.776ZM875.514 880.197C881.473 886.156 881.473 895.817 875.514 901.776L810.777 966.512C804.819 972.472 795.157 972.472 789.199 966.512L724.462 901.776C718.503 895.817 718.503 886.156 724.462 880.197L789.199 815.46C795.157 809.502 804.819 809.502 810.777 815.46L875.514 880.197ZM785.514 811.776L720.777 876.513C714.819 882.471 705.157 882.471 699.199 876.513L634.462 811.776C628.503 805.817 628.503 796.156 634.462 790.197L699.199 725.461C705.157 719.502 714.819 719.502 720.777 725.461L785.514 790.197C791.473 796.156 791.473 805.817 785.514 811.776ZM785.514 631.776L720.777 696.513C714.819 702.471 705.157 702.471 699.199 696.513L634.462 631.776C628.503 625.818 628.503 616.156 634.462 610.197L699.199 545.461C705.157 539.501 714.819 539.501 720.777 545.461L785.514 610.197C791.473 616.156 791.473 625.818 785.514 631.776ZM634.462 970.197L699.199 905.461C705.157 899.502 714.819 899.502 720.777 905.461L785.514 970.197C791.473 976.156 791.473 985.817 785.514 991.776L720.777 1056.51C714.819 1062.47 705.157 1062.47 699.199 1056.51L634.462 991.776C628.503 985.817 628.503 976.156 634.462 970.197ZM724.462 1060.2L789.199 995.461C795.157 989.502 804.819 989.502 810.777 995.461L875.514 1060.2C881.473 1066.16 881.473 1075.82 875.514 1081.78L810.777 1146.51C804.819 1152.47 795.157 1152.47 789.199 1146.51L724.462 1081.78C718.503 1075.82 718.503 1066.16 724.462 1060.2ZM814.462 811.776C808.503 805.817 808.503 796.156 814.462 790.197L879.199 725.461C885.157 719.502 894.819 719.502 900.777 725.461L965.514 790.197C971.473 796.156 971.473 805.817 965.514 811.776L900.777 876.513C894.819 882.471 885.157 882.471 879.199 876.513L814.462 811.776ZM814.462 991.776C808.503 985.817 808.503 976.156 814.462 970.197L879.199 905.461C885.157 899.502 894.819 899.502 900.777 905.461L965.514 970.197C971.473 976.156 971.473 985.817 965.514 991.776L900.777 1056.51C894.819 1062.47 885.157 1062.47 879.199 1056.51L814.462 991.776ZM904.462 1060.2L969.199 995.461C975.157 989.502 984.819 989.502 990.777 995.461L1055.51 1060.2C1061.47 1066.16 1061.47 1075.82 1055.51 1081.78L990.777 1146.51C984.819 1152.47 975.157 1152.47 969.199 1146.51L904.462 1081.78C898.503 1075.82 898.503 1066.16 904.462 1060.2Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.46199 340.197L69.199 275.461C75.157 269.501 84.819 269.501 90.777 275.461L155.514 340.197C161.473 346.156 161.473 355.817 155.514 361.776L90.777 426.513C84.819 432.471 75.157 432.471 69.199 426.513L4.46199 361.776C-1.49701 355.817 -1.49701 346.156 4.46199 340.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M94.462 250.197L159.199 185.461C165.157 179.502 174.819 179.502 180.777 185.461L245.514 250.197C251.473 256.156 251.473 265.817 245.514 271.776L180.777 336.513C174.819 342.471 165.157 342.471 159.199 336.513L94.462 271.776C88.503 265.817 88.503 256.156 94.462 250.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M454.462 69.197L519.199 4.46002C525.157 -1.49798 534.819 -1.49798 540.777 4.46002L605.514 69.197C611.473 75.155 611.473 84.817 605.514 90.776L540.777 155.512C534.819 161.471 525.157 161.471 519.199 155.512L454.462 90.776C448.503 84.817 448.503 75.155 454.462 69.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M94.462 250.197L159.199 185.461C165.157 179.502 174.819 179.502 180.777 185.461L245.514 250.197C251.473 256.156 251.473 265.817 245.514 271.776L180.777 336.513C174.819 342.471 165.157 342.471 159.199 336.513L94.462 271.776C88.503 265.817 88.503 256.156 94.462 250.197Z">
                            </path>
                            <path class="opacity-20" fill-rule="evenodd" clip-rule="evenodd"
                                d="M364.462 520.197L429.199 455.461C435.157 449.502 444.819 449.502 450.777 455.461L515.514 520.197C521.473 526.156 521.473 535.817 515.514 541.776L450.777 606.513C444.819 612.471 435.157 612.471 429.199 606.513L364.462 541.776C358.503 535.817 358.503 526.156 364.462 520.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M634.462 250.197L699.199 185.461C705.157 179.502 714.819 179.502 720.777 185.461L785.514 250.197C791.473 256.156 791.473 265.817 785.514 271.776L720.777 336.513C714.819 342.471 705.157 342.471 699.199 336.513L634.462 271.776C628.503 265.817 628.503 256.156 634.462 250.197Z">
                            </path>
                            <path class="opacity-20" fill-rule="evenodd" clip-rule="evenodd"
                                d="M634.462 790.197L699.199 725.461C705.157 719.502 714.819 719.502 720.777 725.461L785.514 790.197C791.473 796.156 791.473 805.817 785.514 811.776L720.777 876.513C714.819 882.471 705.157 882.471 699.199 876.513L634.462 811.776C628.503 805.817 628.503 796.156 634.462 790.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M544.462 1060.2L609.199 995.461C615.157 989.502 624.819 989.502 630.777 995.461L695.514 1060.2C701.473 1066.16 701.473 1075.82 695.514 1081.78L630.777 1146.51C624.819 1152.47 615.157 1152.47 609.199 1146.51L544.462 1081.78C538.503 1075.82 538.503 1066.16 544.462 1060.2Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.46199 70.197L70.199 5.46101C76.157 -0.49799 85.819 -0.49799 91.777 5.46101L156.514 70.197C162.473 76.156 162.473 85.817 156.514 91.776L91.777 156.512C85.819 162.471 76.157 162.471 70.199 156.512L5.46199 91.776C-0.497013 85.817 -0.497013 76.156 5.46199 70.197Z">
                            </path>
                            <path class="opacity-10" fill-rule="evenodd" clip-rule="evenodd"
                                d="M184.462 340.197L249.199 275.461C255.157 269.501 264.819 269.501 270.777 275.461L335.514 340.197C341.473 346.156 341.473 355.817 335.514 361.776L270.777 426.513C264.819 432.471 255.157 432.471 249.199 426.513L184.462 361.776C178.503 355.817 178.503 346.156 184.462 340.197Z">
                            </path>
                        </svg>
                    </div>

                    <div
                        class="absolute left-1/2 top-0 z-10 flex aspect-square w-[122px] -translate-y-[25px] translate-x-[380px] rotate-45 items-center justify-center rounded-2xl bg-[#ee1a3b]">
                        <svg role="img" class="ml-[6px] h-9 w-8 -rotate-45 fill-white">
                            <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                        </svg>
                    </div>

                </section>

        </main>
        <div class="relative isolate -mb-20">
            <div class="container mx-auto">
                <div class="relative grid grid-cols-1 gap-4 bg-[#ee1a3b] text-white md:grid-cols-12 md:gap-x-7">
                    <!-- Section de texte -->
                    <div class="col-span-1 flex flex-col justify-center gap-y-3 px-4 py-6 md:col-span-6 md:px-2 lg:col-span-6 lg:px-0 xl:col-span-5"
                        style="min-height: 400px;">
                        <h2 class="mb-4 text-center text-2xl font-bold md:text-left md:text-3xl">
                            Téléchargez votre application
                        </h2>
                        <p class="mb-6 text-center text-base md:text-left md:text-lg">
                            Rejoignez des milliers d'utilisateurs qui partagent leurs portraits authentiques, leurs opinions
                            sincères et leurs expériences uniques.
                        </p>
                        <!-- Boutons de téléchargement -->
                        <div class="flex w-full flex-col gap-3 md:flex-row">
                            <a href="#"
                                class="flex w-full items-center justify-center rounded-lg bg-black px-3 py-2 text-white transition duration-300 hover:bg-gray-800">
                                <i class="fab fa-apple mr-2 text-lg"></i>
                                <div class="flex flex-col">
                                    <span class="text-[15px] font-semibold leading-tight">Téléchargez sur App Store</span>

                                </div>
                            </a>
                            <a href="#"
                                class="flex w-full items-center justify-center rounded-lg bg-black px-3 py-2 text-white transition duration-300 hover:bg-gray-800">
                                <i class="fab fa-google-play mr-2 text-lg"></i>
                                <div class="flex flex-col">
                                    <span class="text-[15px] font-semibold leading-tight">Téléchargez sur Play Store</span>

                                </div>
                            </a>
                        </div>
                    </div><!-- Section image -->
                    <div class="col-span-full w-full md:col-start-8 md:mr-[-1px] lg:col-start-8 xl:col-start-8">
                        <style>
                            .image-container {
                                position: relative;
                                width: 100%;
                                height: 0;
                                padding-bottom: 56.25%;
                                /* Ratio 16:9 */
                                min-height: 250px;
                                max-height: 400px;
                            }

                            @media (min-width: 768px) {
                                .image-container {
                                    min-height: 400px;
                                }
                            }

                            .image-wrapper {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                            }

                            .responsive-image {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                transition: all 0.3s ease;
                            }
                        </style>

                        <a href="" class="group relative block overflow-hidden bg-gray-900 md:-ml-7">
                            <div class="image-container">
                                <div class="image-wrapper">
                                    <img class="responsive-image group-hover:scale-110 group-hover:opacity-75"
                                        src="mygp-images/download.png" alt="image de téléchargement">
                                    <div class="image-dimensions"></div>
                                </div>
                            </div>
                        </a>


                    </div>
                </div>
            </div>

            <!-- left [#ee1a3b] layer -->
            <div class="absolute bottom-0 right-1/2 -z-10 h-full w-1/2 bg-[#ee1a3b]"></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categories = ['portrait', 'opinion', 'insolite', 'events'];

                categories.forEach(category => {
                    const swiperElement = document.querySelector('.swiper-' + category);
                    if (swiperElement) {
                        new Swiper('.swiper-' + category, {
                            slidesPerView: 1,
                            spaceBetween: 25,
                            loop: true,
                            watchOverflow: true,
                            centerInsufficientSlides: true,
                            navigation: {
                                nextEl: '.swiper-button-next-' + category,
                                prevEl: '.swiper-button-prev-' + category,
                            },
                            breakpoints: {
                                576: {
                                    slidesPerView: 2,
                                    spaceBetween: 25,
                                },
                                768: {
                                    slidesPerView: 3,
                                    spaceBetween: 25,
                                },

                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 25,
                                },
                                1280: {
                                    slidesPerView: 5,
                                    spaceBetween: 25,
                                },
                            },
                        });
                    }
                });
            });
        </script>
    </body>
@endsection
