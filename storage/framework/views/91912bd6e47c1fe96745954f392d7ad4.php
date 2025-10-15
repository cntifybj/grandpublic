<?php $__env->startSection('content'); ?>
    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20"> <!-- Taille augmentée légèrement -->
            <div class="container ">

                <div
                    class="h-auto object-contain p-6 w-full md:w-[85%] lg:w-[75%] xl:w-[65%] mx-auto mt-32 md:mt-100 mb-0 slide-container">

                </div>


                <script>
                    const images = <?php echo json_encode($advisoriesImagesUrl); ?>;

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
            <h1 class="titre text-[#ee1a3b] text-center mb-10 text-3xl font-bold leading-tight tracking-tight md:text-5xl">
                PORTRAIT
            </h1>
            <style>
                @-moz-document url-prefix() {
                    h1.text-[#ee1a3b] {
                        padding-top: 50px;
                        /* Espace supplémentaire pour Firefox */
                    }
                }
            </style>
            <br><br>
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

                    <div
                        class="firefox-bottom-space relative -mt-20 mb-14 flex flex-col md:flex-row md:justify-between lg:-mt-[200px] lg:mb-40">

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
                                    Plus vues
                                </a>
                            </li>
                            <br>
                        </ul>

                        <!-- Barre de recherche ajoutée ici -->
                        <div
                            class="relative z-10 flex items-center justify-between flex-grow pr-0 pb-5 md:pb-0 md:gap-x-4 lg:gap-x-6 lg:pr-4">
                            <form id="search-form" method="post" action="<?php echo e(route('videos.search')); ?>"
                                class="relative flex-grow max-w-xs md:max-w-md lg:max-w-lg">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="page" value="<?php echo e(request()->route()->getName()); ?>">
                                <div class="relative group">
                                    <input type="text" id="search-bar" name="search"
                                        class="w-full h-12 pl-12 pr-4 text-sm text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 border-2 border-transparent rounded-lg outline-none transition-all duration-300 ease-in-out placeholder-gray-400 dark:placeholder-gray-500 focus:bg-white dark:focus:bg-gray-900 focus:border-[#ee1a3b] focus:shadow-[0_0_0_2px_rgba(238,26,59,0.1)]"
                                        placeholder="Recherchez une vidéo" autocomplete="off" oninput="">

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
                            <style>
                                /* Cibler Firefox uniquement */
                                @-moz-document url-prefix() {
                                    #videoGrid {
                                        margin-top: 40px !important;
                                        /* Pousse vers le bas (ajuste la valeur selon tes besoins) */
                                    }
                                }
                            </style>
                            <br><br><br>
                            <ul class="flex gap-2 pt-2 md:self-center md:pt-0">
                                <li>
                                    <a class="group grid-toggle" href="#" data-cols="3">
                                        <svg role="img" class="h-6 w-6 fill-[#ee1a3b] dark:fill-[#ee1a3b]">
                                            <use xlink:href="assets/img/yt1/sprite.svg#grid"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="group grid-toggle" href="#" data-cols="4">
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

                    <?php if(isset($searchTerm) && $videos->isEmpty()): ?>
                        <div class="flex justify-center items-center my-6">
                            <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 shadow-md text-center">
                                <p class="text-lg font-semibold text-gray-700">
                                    Aucun résultat trouvé pour <span
                                        class="font-bold text-primary">"<?php echo e($searchTerm); ?>"</span>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Section de la grille des vidéos -->
                    <div id="videoGrid" class="grid grid-cols-12 gap-y-14 sm:gap-x-[30px] min-h-[500px] mt-[-100px]">
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-span-full sm:col-span-6 lg:col-span-4 video-item flex flex-col">
                                <figure class="relative mb-6">
                                    <a class="group block h-full overflow-hidden bg-gray-900"
                                        href="<?php echo e(route('video-watch', ['slug' => $video->slug])); ?>">
                                        <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                            src="<?php echo e($video->video_thumbnail); ?>" alt="<?php echo e($video->title); ?>">

                                        <?php if(!isset($searchTerm)): ?>
                                            <span
                                                class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b] w-[60px]">
                                                <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                                                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                </svg>
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                </figure>
                                <div class="flex flex-col">
                                    <h3
                                        class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6 flex justify-between items-center">
                                        <?php echo e($video->title); ?>

                                        <?php if($video->premium_video): ?>
                                            <span class="ml-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" class="w-6 h-6 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                                </svg>
                                            </span>
                                        <?php endif; ?>
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                        <?php echo e($video->description); ?> <!-- Ajoutez la description ici -->
                                    </p>
                                    <ul class="flex justify-between leading-tight tracking-tight text-sm">
                                        <li><?php echo e($video->youtube_view_count); ?> vues</li> <!-- Vues au début -->
                                        <li><?php echo e(\Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y')); ?>

                                        </li>
                                        <!-- Date de publication à la fin -->
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                        <style>
                            /* Pour les écrans de 1023px ou moins (taille de la tablette et du mobile) */
                            @media (max-width: 1023px) {
                                #videoGrid {
                                    margin-top: 50px;
                                    /* Pousse la grille de vidéos vers le bas */
                                }
                            }
                        </style>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const gridToggles = document.querySelectorAll('.grid-toggle');
                                const videoItems = document.querySelectorAll('.video-item');

                                gridToggles.forEach(toggle => {
                                    toggle.addEventListener('click', function(e) {
                                        e.preventDefault();

                                        // Retirer la classe active de tous les boutons
                                        gridToggles.forEach(btn => {
                                            btn.querySelector('svg').classList.remove('fill-[#ee1a3b]');
                                            btn.querySelector('svg').classList.add('fill-primary');
                                        });

                                        // Ajouter la classe active au bouton cliqué
                                        this.querySelector('svg').classList.remove('fill-primary');
                                        this.querySelector('svg').classList.add('fill-[#ee1a3b]');

                                        const cols = this.getAttribute('data-cols');

                                        // Mettre à jour les classes des éléments vidéo
                                        videoItems.forEach(item => {
                                            item.classList.remove('lg:col-span-4', 'lg:col-span-3');
                                            if (cols === '3') {
                                                item.classList.add('lg:col-span-4');
                                            } else {
                                                item.classList.add('lg:col-span-3');
                                            }
                                        });
                                    });
                                });
                            });
                        </script>
                    </div>
                    <nav aria-label="Pagination" id="pagination-container" class="flex items-center justify-center space-x-2 mt-10">
                        <?php echo e($videos->links()); ?>

                    </nav>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const paginationContainer = document.querySelector('nav[aria-label="Pagination"]');
                            
                            // Supprimer le texte descriptif
                            const descriptiveText = paginationContainer.querySelector('p');
                            if (descriptiveText) {
                                descriptiveText.remove();
                            }
                    
                            // Fonction pour mettre à jour les styles
                            function styleActivePage() {
                                const links = paginationContainer.querySelectorAll('span[aria-current="page"], a');
                                
                                links.forEach(link => {
                                    // Style de base pour tous les liens
                                    if (link.tagName === 'A') {
                                        link.classList.add('px-4', 'py-2', 'text-sm', 'border', 'rounded-lg', 
                                            'hover:bg-[#ee1a3b]', 'hover:text-white', 'dark:text-white');
                                    }
                    
                                    // Style pour la page active
                                    if (link.getAttribute('aria-current') === 'page') {
                                        link.classList.add('bg-[#ee1a3b]', 'text-white', 'border-[#ee1a3b]', 'dark:text-white');
                                    }
                                });
                            }
                    
                            // Observer uniquement les changements pertinents
                            const observer = new MutationObserver(styleActivePage);
                            observer.observe(paginationContainer, {
                                childList: true,
                                subtree: true,
                                attributeFilter: ['aria-current']
                            });
                    
                            // Style initial
                            styleActivePage();
                        });
                    </script>
                    
                    <style>
                        /* Styles pour améliorer la visibilité de la page active */
                        nav[aria-label="Pagination"] span[aria-current="page"] {
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            background-color: #ee1a3b;
                            padding: 0.150rem;
                            color: white;
                            border-radius: 0.375rem;
                            /**font-weight: 500;**/
                        }

                    </style>
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

            </section>
        </main>
        <br>
        <br>
        <br>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/pages/portrait.blade.php ENDPATH**/ ?>