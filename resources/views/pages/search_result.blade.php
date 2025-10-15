@extends('layouts.app')

@section('content')


    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20"> <!-- Taille augmentée légèrement -->
            <div class="container">
                
                <div
                    class="h-auto object-contain p-6 w-full md:w-[85%] lg:w-[75%] xl:w-[65%] mx-auto mt-32 md:mt-100 mb-0 slide-container">

                </div>

                <script>
                    const images = {!! json_encode($advisoriesImagesUrl) !!};

                    const container = document.querySelector('.slide-container');
                    let currentIndex = 0;

                    // Créer les slides initialement
                    images.forEach((img, index) => {
                        const slide = document.createElement('div');
                        slide.className = 'slide';
                        slide.style.backgroundImage = `url('${img}')`;
                        slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
                        container.appendChild(slide);
                    });

                    const slides = document.querySelectorAll('.slide');

                    // Fonction pour faire défiler les slides
                    function nextSlide() {
                        currentIndex = (currentIndex + 1) % images.length;
                        slides.forEach((slide, index) => {
                            slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
                        });
                    }

                    // Démarrer le défilement automatique
                    setInterval(nextSlide, 5000);
                </script>
            </div>
        </div>
        </div>
        <br><br>
        <main id="main-content" class="grow lg:pt-0">
            <h1 class="titre text-[#ee1a3b] text-center mb-10 text-3xl font-bold leading-tight tracking-tight md:text-5xl">{{$currentPage}}</h1>
            <section class="pt-14 pb-24 lg:pb-52 lg:pt-40">
                <div class="container">
                    <style>
                        .slide-container {
                            position: relative;
                            overflow: hidden;
                            height: 160px;
                            width: 100%;
                            display: flex;
                            justify-content: center;
                            /* Centrage des images */
                            align-items: center;
                            /* Centrage vertical */
                        }

                        .slide {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            transition: transform 0.5s ease-in-out;
                            background-position: center;
                            background-size: contain;
                            /*Permet de voir toute l'image sans la couper */
                            background-repeat: no-repeat;
                            /*Empêche les répétitions de l'image */
                            margin-top: -20px;

                        }


                        /* Media Queries pour des tailles adaptées */
                        @media (max-width: 768px) {
                            .slide-container {
                                height: 100px;
                                /* Plus de hauteur pour mobiles */
                            }
                        }

                        @media (min-width: 768px) and (max-width: 1024px) {
                            .slide-container {
                                height: 100px;
                                /* Hauteur intermédiaire pour tablettes */
                            }
                        }

                        @media (min-width: 1025px) {
                            .slide-container {
                                height: 150px;
                                /* Conserve une hauteur réduite sur grands écrans */
                            }
                        }

                        .active {
                            opacity: 1 !important;
                            /* Augmente l'opacité de l'élément sélectionné */
                            color: #ee1a3b !important;
                            /* Met en surbrillance la couleur pour l'élément actif */
                            border-bottom: 3px solid #ee1a3b;
                            /* Ajoute une ligne en bas pour souligner */
                        }

                        @-moz-document url-prefix() {
                            .firefox-bottom-space {
                                top: 70px;
                                /* Ajuste la valeur selon tes besoins */
                            }
                        }

                        /* Cibler Firefox uniquement */
                        @-moz-document url-prefix() {
                            #videoGrid {
                                margin-top: 40px !important;
                                /* Pousse vers le bas (ajuste la valeur selon tes besoins) */
                            }
                        }

                        @supports (-moz-appearance: none) {
                            h1.titre {
                                margin-top: 50px;
                                /* Ajuste l'espacement en haut */
                                margin-bottom: 0;
                            }
                        }
                    </style>
                    <br>
                    <!-- Barre de catégories -->
                    <div class="relative -mt-20 mb-14 flex flex-col md:flex-row md:justify-between lg:-mt-[200px] lg:mb-40">

                        <ul id="category-bar"
                            class="relative z-10 items-start md:items-stretch flex flex-col py-4 md:py-0 md:flex-row md:gap-x-4 lg:gap-x-8 xl:gap-x-10 md:min-h-[100px] lg:min-h-[120px] mb-10 md:mb-0">
                            <!-- Ajouté mb-10 -->
                            <li class="flex relative">
                                <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-100 text-primary lg:text-primary dark:text-white dark:lg:text-white active"
                                    href="#" data-category="all">
                                    Toutes
                                </a>
                            </li>
                            <li class="flex">
                                <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90"
                                    href="#" data-category="recent">
                                    Récentes
                                </a>
                            </li>
                            <li class="flex">
                                <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90"
                                    href="#" data-category="old">
                                    Anciennes
                                </a>
                            </li>
                            <li class="flex">
                                <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90"
                                    href="#" data-category="recommended">
                                    Recommandées
                                </a>
                            </li>
                            <li class="flex">
                                <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90"
                                    href="#" data-category="most-liked">
                                    Plus aimées
                                </a>
                            </li>
                            <br>
                        </ul>

                        <!-- Barre de recherche ajoutée ici -->
                        <div
                            class="relative z-10 flex items-center justify-between flex-grow pr-0 pb-5 md:pb-0 md:gap-x-4 lg:gap-x-6 lg:pr-4">
                            <form id="search-form" method="post" action="{{ route('videos.search') }}"
                                class="relative flex-grow max-w-xs md:max-w-md lg:max-w-lg">
                                @csrf
                                <input type="hidden" name="page" value="{{ $currentPage }}">
                                <div class="relative group">
                                    <input type="text" id="search-bar" name="search"
                                        class="w-full h-12 pl-12 pr-4 text-sm text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 border-2 border-transparent rounded-lg outline-none transition-all duration-300 ease-in-out placeholder-gray-400 dark:placeholder-gray-500 focus:bg-white dark:focus:bg-gray-900 focus:border-[#ee1a3b] focus:shadow-[0_0_0_2px_rgba(238,26,59,0.1)]"
                                        placeholder="Rechercher une vidéo" autocomplete="off" oninput="">

                                    <div id="suggestions"
                                        class="hidden absolute left-0 mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden">
                                    </div>

                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 transition-transform duration-300 group-focus-within:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-gray-400 group-focus-within:text-[#ee1a3b] transition-colors duration-300"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>

                                    <div
                                        class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                        <div class="text-xs text-gray-400 dark:text-gray-500">
                                            Appuyez sur Entrée
                                        </div>
                                    </div>
                                </div>
                                <button class="hidden" type="submit"></button>
                            </form>


                            <style>
                                @keyframes pulse {
                                    0% {
                                        box-shadow: 0 0 0 0 rgba(238, 26, 59, 0.1);
                                    }

                                    70% {
                                        box-shadow: 0 0 0 10px rgba(238, 26, 59, 0);
                                    }

                                    100% {
                                        box-shadow: 0 0 0 0 rgba(238, 26, 59, 0);
                                    }
                                }

                                #search-bar:focus {
                                    animation: pulse 2s infinite;
                                }
                            </style>

                            <br><br><br>
                            <ul class="flex gap-2 pt-2 md:self-center md:pt-0">
                                <li>
                                    <a class="group" href="">
                                        <svg role="img" class="h-6 w-6 fill-[#ee1a3b] dark:fill-[#ee1a3b]">
                                            <use xlink:href="assets/img/yt1/sprite.svg#grid"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="group" href="">
                                        <svg role="img"
                                            class="h-6 w-6 fill-primary group-hover:fill-[#ee1a3b] transition-colors dark:fill-white dark:group-hover:fill-[#ee1a3b]">
                                            <use xlink:href="assets/img/yt1/sprite.svg#grid-sm"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="absolute inset-0 -left-full bg-white dark:bg-gray-800 shadow-3xl"></div>
                    </div>

                    <div class="container mx-auto my-6">
                        <h2 class="hidden text-2xl font-semibold mb-4">Résultats pour "{{ $searchTerm }}"</h2>
                    
                        @forelse ($videos as $video)
                            <div class="hidden video-item border-b border-gray-300 py-4">
                                
                                <h3 class="hidden text-lg font-bold">{{ $video->title }}</h3>
                                
                            </div>
                        @empty
                            <div class="flex justify-center items-center my-6">
                                <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 shadow-md text-center">
                                    <p class="text-lg font-semibold text-gray-700">
                                        Aucun résultat trouvé pour <span class="font-bold text-primary">"{{ $searchTerm }}"</span>
                                    </p>
                                </div>
                            </div>
                        @endforelse
                    </div>                    

                    <!-- Section de la grille des vidéos -->
                    <div id="videoGrid" class="grid grid-cols-12 gap-y-14 sm:gap-x-[30px] min-h-[500px]">
                        @foreach ($videos as $video)
                            <div class="col-span-full sm:col-span-6 lg:col-span-4 flex flex-col">
                                <figure class="relative mb-6">
                                    <a class="group block h-full overflow-hidden bg-gray-900"
                                        href="{{ route('video-watch', ['slug' => $video->slug]) }}">
                                        <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                            src="{{ $video->video_thumbnail }}" alt="{{ $video->title }}">

                                            <span
                                                            class="hidden absolute top-1/2 left-1/2 flex aspect-square w-[60px] -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b]">
                                                            <svg role="img" class="ml-[3px] h-5 w-4 fill-white">
                                                                <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                            </svg>
                                                        </span>
                                    </a>
                                </figure>
                                <style>
                                    
                                </style>
                                <div class="flex flex-col">
                                    <h3
                                        class="mb-1 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6">
                                        {{ $video->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                        {{ $video->description }} <!-- Ajoutez la description ici -->
                                    </p>
                                    <ul class="flex justify-between leading-tight tracking-tight text-sm">
                                        <li>{{ $video->youtube_view_count }} vues</li> <!-- Vues au début -->
                                        <li>{{ \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') }}</li>
                                        <!-- Date de publication à la fin -->
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Loader ou contenu additionnel -->
                    <div class="flex items-center justify-center mt-10 md:mt-20 lg:mt-28">
                        <div
                            class="vv-preloader-spikes-roll relative h-10 w-16 animate-spike-roll bg-spike-roll bg-no-repeat">
                        </div>
                    </div>

                    <script>
                        // Fonction pour afficher les vidéos par ligne avec un délai
                        function displayVideosInLines(category = 'all') {
                            const videoGrid = document.getElementById('videoGrid');
                            const videoItems = Array.from(videoGrid.children); // Récupère tous les éléments vidéo
                            videoGrid.innerHTML = ''; // Vide le conteneur

                            // Filtrer les vidéos selon la catégorie ou afficher toutes
                            const filteredVideos = category === 'all' ? videoItems : videoItems.filter(video => video.dataset.category ===
                                category);

                            // Nombre de vidéos par ligne
                            const videosPerLine = 3;

                            // Charger les vidéos ligne par ligne avec un délai
                            const numberOfLines = Math.ceil(filteredVideos.length / videosPerLine);

                            for (let line = 0; line < numberOfLines; line++) {
                                const start = line * videosPerLine;
                                const end = start + videosPerLine;
                                const lineVideos = filteredVideos.slice(start, end);

                                setTimeout(() => {
                                    lineVideos.forEach(video => {
                                        videoGrid.appendChild(video); // Ajoute chaque vidéo au conteneur
                                    });
                                }, line * 2000); // 2000 ms = 2 secondes de délai entre les lignes
                            }
                        }

                        // Initialisation lors du chargement de la page
                        document.addEventListener('DOMContentLoaded', () => {
                            displayVideosInLines(); // Affiche les vidéos par défaut

                            // Gestion des événements de clic sur les catégories
                            const categoryLinks = document.querySelectorAll('[data-category]');
                            categoryLinks.forEach(link => {
                                link.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    const category = e.target.getAttribute('data-category');

                                    // Mettre à jour l'affichage des vidéos selon la catégorie
                                    displayVideosInLines(category);

                                    // Gérer le surlignage de la catégorie sélectionnée
                                    categoryLinks.forEach(link => link.classList.remove('opacity-100'));
                                    e.target.classList.add('opacity-100');
                                });
                            });
                        });

                        // Sélectionne uniquement les éléments <a> dans le conteneur #category-bar
                        const categoryBar = document.querySelector('#category-bar');
                        const categoryLinks = categoryBar.querySelectorAll('li a');

                        // Parcours chaque lien et écoute l'événement de clic
                        categoryLinks.forEach(link => {
                            link.addEventListener('click', function(event) {
                                event.preventDefault(); // Empêche le comportement par défaut du lien

                                // Supprime la classe 'active' de tous les liens dans la barre de catégories
                                categoryLinks.forEach(link => link.classList.remove('active'));

                                // Ajoute la classe 'active' au lien cliqué
                                this.classList.add('active');
                            });
                        });
                    </script>

<style>
    /* Bouton menu */
    .js-menu-toggle {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        position: relative;
        cursor: pointer;
        margin-top: 4px;
    }
    
    /* Style des icônes */
    .material-icons {
        transition: all 0.2s ease;
        opacity: 0;
        visibility: hidden;
        position: absolute;
        pointer-events: none;
        font-size: 30px; /* Icônes plus grandes */
}
    
    .material-icons.visible {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }
    
    /* Cache le menu burger sur les écrans larges */
    @media (min-width: 1024px) {
        .js-menu-toggle {
            display: none;
        }
    }
    </style>
    
    <script>
    // Chargement des icônes Material Icons
    const loadGoogleIcons = () => {
        const link = document.createElement('link');
        link.href = "https://fonts.googleapis.com/icon?family=Material+Icons";
        link.rel = "stylesheet";
        document.head.appendChild(link);
    };
    
    // Vérifiez que les icônes sont chargées avant d'exécuter le code
    loadGoogleIcons();
    
    // Sélection des éléments du DOM
    const mobileMenuToggle = document.querySelector('.js-menu-toggle');
    const siteWrapper = document.querySelector('.js-site-wrapper');
    const mobileMenu = document.querySelector('.js-mobile-menu');
    
    // Création des icônes dynamiquement
    const iconOpen = document.createElement('span');
    iconOpen.classList.add('material-icons', 'visible');
    iconOpen.textContent = 'menu';
    
    const iconClose = document.createElement('span');
    iconClose.classList.add('material-icons');
    iconClose.textContent = 'close';
    
    // Ajout des icônes dans le bouton de menu
    mobileMenuToggle.appendChild(iconOpen);
    mobileMenuToggle.appendChild(iconClose);
    
    // Fonction de bascule pour le menu
    mobileMenuToggle.addEventListener('click', () => {
        iconOpen.classList.toggle('visible');
        iconClose.classList.toggle('visible');
        
        if (iconClose.classList.contains('visible')) {
            // Afficher le menu
            siteWrapper.classList.add('overflow-y-hidden');
            mobileMenu.classList.remove('translate-x-full');
            mobileMenu.classList.add('translate-x-0');
        } else {
            // Masquer le menu
            siteWrapper.classList.remove('overflow-y-hidden');
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('translate-x-full');
        }
    });
    </script>







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
        

                      
          </script>
        </section>
    </main>
        <br>
        <br>
        
        @endsection
