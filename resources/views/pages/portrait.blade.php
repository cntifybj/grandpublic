@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/portrait.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20">
            <div class="container">
                <div class="h-auto object-contain p-6 w-full md:w-[85%] lg:w-[75%] xl:w-[65%] mx-auto mt-32 md:mt-100 mb-0 slide-container">
                </div>
            </div>
        </div>

        <h1 class="titre text-[#ee1a3b] text-center mb-10 text-3xl font-bold leading-tight tracking-tight md:text-5xl">
            PORTRAIT
        </h1>

        <section class="pt-14 pb-24 lg:pb-52 lg:pt-40">
            <div class="container">
                <div class="firefox-bottom-space relative -mt-20 mb-14 flex flex-col md:flex-row md:justify-between lg:-mt-[200px] lg:mb-40">
                    <ul id="category-bar" class="relative z-10 items-start md:items-stretch flex flex-col py-4 md:py-0 md:flex-row md:gap-x-4 lg:gap-x-8 xl:gap-x-10 md:min-h-[100px] lg:min-h-[120px] mb-10 md:mb-0">
                        <li class="flex relative">
                            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-100 text-primary lg:text-primary dark:text-white dark:lg:text-white {{ request()->get('filter') === 'all' || !request()->has('filter') ? 'active' : '' }}" href="#" data-category="all">
                                Toutes
                            </a>
                        </li>
                        <li class="flex">
                            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90 {{ request()->get('filter') === 'recent' ? 'active' : '' }}" href="#" data-category="recent">
                                Récentes
                            </a>
                        </li>
                        <li class="flex">
                            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90 {{ request()->get('filter') === 'old' ? 'active' : '' }}" href="#" data-category="old">
                                Anciennes
                            </a>
                        </li>
                        <li class="flex">
                            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90 {{ request()->get('filter') === 'recommended' ? 'active' : '' }}" href="#" data-category="recommended">
                                Recommandées
                            </a>
                        </li>
                        <li class="flex">
                            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90 {{ request()->get('filter') === 'most-liked' ? 'active' : '' }}" href="#" data-category="most-liked">
                                Plus vues
                            </a>
                        </li>
                    </ul>

                    <div class="relative z-10 flex items-center justify-between flex-grow pr-0 pb-5 md:pb-0 md:gap-x-4 lg:gap-x-6 lg:pr-4">
                        <form id="search-form" method="post" action="{{ route('videos.search') }}" class="relative flex-grow max-w-xs md:max-w-md lg:max-w-lg">
                            @csrf
                            <input type="hidden" name="page" value="{{ request()->route()->getName() }}">
                            <div class="relative group">
                                <input type="text" id="search-bar" name="search" class="w-full h-12 pl-12 pr-4 text-sm text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 border-2 border-transparent rounded-lg outline-none transition-all duration-300 ease-in-out placeholder-gray-400 dark:placeholder-gray-500 focus:bg-white dark:focus:bg-gray-900 focus:border-[#ee1a3b] focus:shadow-[0_0_0_2px_rgba(238,26,59,0.1)]" placeholder="Recherchez une vidéo" autocomplete="off" oninput="">
                                <div id="suggestions" class="hidden absolute left-0 mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden">
                                </div>
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 transition-transform duration-300 group-focus-within:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-[#ee1a3b] transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                    <div class="text-xs text-gray-400 dark:text-gray-500">
                                        Appuyez sur Entrée
                                    </div>
                                </div>
                            </div>
                            <button class="hidden" type="submit"></button>
                        </form>

                        <div class="hidden fill-[#ee1a3b] dark:fill-white"></div>
                        <ul class="flex gap-2 pt-2 md:self-center md:pt-0">
                            <li>
                                <a class="group grid-toggle" href="#" data-cols="3">
                                    <svg role="img" class="h-6 w-6 fill-[#ee1a3b]">
                                        <use xlink:href="{{ asset('assets/img/yt1/sprite.svg#grid') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="group grid-toggle" href="#" data-cols="4">
                                    <svg role="img" class="h-6 w-6 dark:fill-white">
                                        <use xlink:href="{{ asset('assets/img/yt1/sprite.svg#grid-sm') }}"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="absolute inset-0 -left-full bg-white dark:bg-gray-800 shadow-3xl"></div>
                </div>

                @if (isset($searchTerm) && $videos->isEmpty())
                    <div class="flex justify-center items-center my-6">
                        <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 shadow-md text-center">
                            <p class="text-lg font-semibold text-gray-700">
                                Aucun résultat trouvé pour <span class="font-bold text-primary">"{{ $searchTerm }}"</span>
                            </p>
                        </div>
                    </div>
                @endif

                <div id="videoGrid" class="grid grid-cols-12 gap-y-14 sm:gap-x-[30px] min-h-[500px] mt-[-100px]">
                    @foreach ($videos as $video)
                        <div class="col-span-full sm:col-span-6 lg:col-span-4 video-item flex flex-col">
                            <figure class="relative mb-6">
                                <a class="group block h-full overflow-hidden bg-gray-900" href="{{ route('video-watch', ['slug' => $video->slug]) }}">
                                    <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75" src="{{ $video->video_thumbnail }}" alt="{{ $video->title }}">
                                    @if (!isset($searchTerm))
                                        <span class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b] w-[60px]">
                                            <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                                                <use xlink:href="{{ asset('assets/img/yt1/sprite.svg#play') }}"></use>
                                            </svg>
                                        </span>
                                    @endif
                                </a>
                            </figure>
                            <div class="flex flex-col">
                                <h3 class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6 flex justify-between items-center">
                                    {{ $video->title }}
                                    @if ($video->premium_video)
                                        <span class="ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                            </svg>
                                        </span>
                                    @endif
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    {{ $video->description }}
                                </p>
                                <ul class="flex justify-between leading-tight tracking-tight text-sm">
                                    <li>{{ $video->youtube_view_count }} vues</li>
                                    <li>{{ \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav aria-label="Pagination" id="pagination-container" class="flex items-center justify-center space-x-2 mt-10">
                    {{ $videos->links() }}
                </nav>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        window.advisoriesImagesUrl = {!! json_encode($advisoriesImagesUrl) !!};
    </script>
    <script src="{{ asset('js/portrait.js') }}"></script>
@endsection