<?php $__env->startSection('head'); ?>
    <?php if(isset($video)): ?>
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo e(request()->url()); ?>">
        <meta property="og:title" content="<?php echo e("$video->title - Grand Public"); ?>">
        <meta property="og:description" content="<?php echo e($video->description ?? 'Une vidéo Grand Public'); ?>">
        <meta property="og:image" content="<?php echo e($video->video_thumbnail); ?>">
    <?php endif; ?>

<?php $__env->startSection('content'); ?>

    <!--<div class="bg-height-mobile relative bg-cover bg-center bg-no-repeat md:min-h-[600px]">-->
    <div class="bg-height-mobile relative bg-cover bg-center bg-no-repeat md:min-h-[600px]">
        <div class="container relative z-10 mx-auto flex h-full flex-col items-start justify-center px-4">
            <div
                class="md:mt-100 slide-container mx-auto mb-0 mt-32 h-auto w-full object-contain p-6 md:w-[85%] lg:w-[75%] xl:w-[65%]">
                <?php
                    $headSlideImagesUrl = [];
                    foreach ($headImages as $advisory) {
                        $imageUrl = Storage::url($advisory->file);
                        $headSlideImagesUrl[] = $imageUrl;
                    }
                ?>
            </div>
            <script>
                const images = <?php echo json_encode($headSlideImagesUrl); ?>;

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
            <div
                class="sm:top-25 md:top-18 xl:top-15 full-width-bg content-padding relative top-32 mb-10 flex h-fit min-h-[220px] flex-col justify-center rounded-none bg-white p-6 md:mb-0 md:ml-10 md:w-[80%] lg:top-20 lg:ml-16 lg:w-[70%] xl:ml-20 xl:w-[60%] dark:bg-gray-900">


                <div class="mb-4 flex justify-start">
                    <a class="text-2xl font-bold uppercase text-[#d81a3b] lg:text-4xl" href="<?php echo e(route($video->category)); ?>">
                        <?php echo e($video->category); ?>

                    </a>

                </div>

                <h2
                    class="text-primary relative z-10 mr-4 pb-1 text-xl font-bold leading-tight tracking-tighter sm:mr-6 sm:text-2xl md:mr-8 md:text-2xl lg:mx-0 lg:text-4xl dark:text-white">
                    <?php echo e($video->title); ?>

                </h2>

            </div>
        </div>
    </div>


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
                /****display: flex;
                    /* Met les slides en ligne */
                /****flex-wrap: nowrap;
                    /* Empêche les slides de passer à la ligne */
                /****overflow-x: hidden;
                    /* Masque tout débordement horizontal */
                /****scroll-snap-type: x mandatory;
                    /* Active le snap pour les slides */
            }


            .slide {
                /**** width: 100vw;
                    /* Assurez-vous que chaque slide prend la largeur de la vue */
                /***min-width: 100vw;
                    /* Chaque slide occupe toute la largeur de la fenêtre */
                /*** flex-shrink: 0;
                    /* Empêche les slides de se réduire */
                /*** height: 100%;
                    /* Adapte la hauteur au contenu */
                /***scroll-snap-align: start;
                    /* Centre les slides lors du scroll */
                /*** padding: 6%;
                    /* Ajoute du padding pour le contenu interne */
                /*** box-sizing: border-box;
                    /* Inclut les marges dans la largeur */
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .slide-container {
                height: 100px;
                /*width: 70%;
                    /* Hauteur intermédiaire pour tablettes */
                /****margin-left: -20px;*/
            }
        }

        @media (min-width: 1025px) {
            .slide-container {
                height: 150px;
                width: 80%;
                /* Conserve une hauteur réduite sur grands écrans */
            }
        }

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

        input,
        textarea,
        form {

            overflow-x: hidden;
        }

        textarea,
        form {
            overflow-x: hidden;
        }
    </style>
    </div>
    <br class="hidden sm:inline-block">
    <br class="hidden sm:inline-block">
    <br class="hidden sm:inline-block">

    <div>
        <div class="container">
            <article
                class="grid-col-4 article-spacing-mobile relative isolate ml-1 grid gap-x-4 md:ml-5 md:grid-cols-12 md:gap-x-6 lg:ml-10 lg:gap-x-[30px] xl:ml-9">
                <div
                    class="absolute inset-x-0 -z-10 col-span-full -mx-16 h-[210px] bg-white md:col-start-2 md:col-end-12 md:mx-0 dark:bg-gray-900">
                </div>
                <style>
                    /* Ajout d'espacement en haut de l'élément article pour les écrans mobiles */
                    @media (max-width: 991px) {
                        .article-spacing-mobile {
                            padding-top: 20px;
                            /* Ajustez cette valeur selon l'espacement souhaité */
                        }
                    }
                </style>
                <section
                    class="col-span-full mb-5 flex hidden flex-col items-start gap-y-6 pt-16 md:col-start-3 md:col-end-11 md:mb-14 lg:pt-20">
                    <a class="bg-[#ee1a3b] px-3 py-1 text-xs font-bold uppercase leading-snug text-white transition-colors hover:bg-[#ee1a3b]/90 md:text-sm"
                        href="<?php echo e(route($video->category)); ?>"><?php echo e($video->category); ?></a>
                    <h1
                        class="text-primary relative z-10 pb-2 text-xl font-bold leading-tight tracking-tighter md:text-2xl lg:pl-8 lg:pr-20 lg:text-3xl xl:text-4xl 2xl:text-5xl dark:text-white">
                        <?php echo e($video->title); ?>

                    </h1>

                </section>

                <div class="col-span-full grid grid-cols-8 gap-x-4 md:col-start-2 md:col-end-12 md:gap-x-6 lg:gap-x-[30px]">
                    <!-- Section des icônes de réseaux sociaux -->



                    <div class="col-span-full sm:-ml-4 md:col-start-1 md:col-end-11 md:-ml-1 lg:-ml-11">
                        <style>
                            .aspect-video {

                                width: 100%;
                                /* Par défaut, prend tout l'espace disponible */
                            }

                            /* Écran moyen (md) */
                            @media (min-width: 768px) {
                                .aspect-video {
                                    width: 100%;
                                    /* Augmente la largeur vers la droite */
                                    margin-right: -4%;
                                }
                            }

                            /* Écrans grands (min-width: 1024px) */
                            @media (min-width: 1024px) {
                                .aspect-video {
                                    width: 100%;
                                    /* Étend davantage la largeur vers la droite */
                                    margin-right: -4%;
                                    /* Ajuste la marge pour plus de décalage à droite */
                                }
                            }

                            .firefox-br {

                                margin-bottom: 20px;
                            }
                        </style>

                        <br>
                        <div class="vv-prose">
                            <!-- Conteneur pour la vidéo -->
                            <div class="group relative aspect-video overflow-hidden rounded-lg bg-black shadow-xl">
                                <!-- Vignette de la vidéo avec bouton de lecture -->
                                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 group-hover:scale-110"
                                    style="background-image: url('<?php echo e($video->video_thumbnail); ?>');">
                                </div>

                                <div
                                    class="absolute inset-0 bg-black bg-opacity-40 transition-opacity duration-300 hover:bg-opacity-20">
                                </div>
                                <button id="playButton"
                                    class="absolute left-1/2 top-1/2 hidden -translate-x-1/2 -translate-y-1/2 transform rounded-full bg-red-600 p-4 shadow-lg transition-transform duration-300 hover:scale-110 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>

                                <iframe id="videoPlayer" class="absolute inset-0 h-full w-full" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen playsinline>
                                </iframe>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const videoPlayer = document.getElementById('videoPlayer');

                                    // Fonction pour détecter si c'est un appareil mobile
                                    function isMobile() {
                                        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                                    }

                                    // Construire l'URL de la vidéo
                                    const baseUrl = "https://www.youtube.com/embed/<?php echo e($video->youtube_id ?? 'default_youtube_id'); ?>";
                                    const params = new URLSearchParams({
                                        autoplay: '1',
                                        controls: '1',
                                        playsinline: '1',
                                        mute: isMobile() ? '1' : '0' // Muet par défaut sur mobile pour éviter les restrictions
                                    });

                                    // Définir l'URL avec les paramètres dans l'iframe
                                    videoPlayer.src = `${baseUrl}?${params.toString()}`;

                                    // Supprimer tout overlay ou comportement supplémentaire si inutile
                                });
                            </script>
                            <style>
                                @media (max-width: 991px) {
                                    .video-mobile {
                                        padding-bottom: 150px;

                                    }
                                }
                            </style>
                            <!-- Modal pour le message d'abonnement -->

                            <br>
                            <div class="yt-video-meta">
                                <span>
                                    <?php
                                        $youtubeViews = $video->youtube_view_count;
                                    ?>
                                    <?php echo e(isset($video) && $youtubeViews ? $youtubeViews : 0); ?>

                                    Vue<?php echo e(isset($video) && $youtubeViews > 1 ? 's' : ''); ?>

                                </span>
                                <span>
                                    <?php echo e(isset($video) && $video->publication_date ? \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') : 'Date non disponible'); ?>

                                </span>
                            </div>
                            <p class="yt-video-description">
                                <?php echo e(isset($video) && $video->description ? $video->description : 'Description non disponible'); ?>

                            </p>
                            <style>
                                @media (max-width: 992px) {
                                    .icon-offset-mobile {
                                        margin-left: -17px;
                                        /* Ajustez cette valeur pour déplacer vers la gauche */
                                    }
                                }

                                .no-underline:hover i,
                                .no-underline:hover svg {
                                    border-color: #ee1a3b;
                                    color: #ee1a3b;
                                }
                            </style>
                            <div class="icon-offset-mobile relative col-span-1 mb-10 mt-3 pl-[-100px]">

                                <ul class="sticky top-6 mt-0 flex justify-start gap-2">
                                    <!-- YouTube -->

                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnYouTube()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-youtube text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Facebook -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnFacebook()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-facebook-f text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Instagram -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnInstagram()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-instagram text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- X (Twitter) -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnX()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <span class="flex h-6 w-6 items-center justify-center">
                                                <svg class="h-5 w-5 hover:text-[#ee1a3b] dark:text-white"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                                </svg>
                                            </span>
                                        </a>
                                    </li>

                                    <!-- WhatsApp -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnWhatsApp()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-whatsapp text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Snapchat -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnSnapchat()"
                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-snapchat text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- TikTok -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnTikTok()"
                                            class="relative flex h-8 w-8 items-center justify-center rounded-full border border-gray-800 bg-white text-xs no-underline transition-colors hover:border-[#ee1a3b] md:h-11 md:w-11 dark:border-white dark:bg-gray-900 dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-tiktok text-xl text-gray-800 hover:text-[#ee1a3b] md:text-2xl dark:text-white dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="yt-button-container flex justify-start space-x-4 pl-[-100px]">
                                <button class="yt-button px-4 py-2 text-sm sm:px-6 sm:py-3 sm:text-base"
                                    onclick="toggleLike(<?php echo e(isset($video) ? $video->id : 'null'); ?>)"
                                    id="like-button-<?php echo e($video ? $video->id : 'default'); ?>">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span id="like-count-<?php echo e($video ? $video->id : 'default'); ?>">
                                        <?php echo e($video ? $video->likes->count() : 0); ?>

                                    </span>
                                </button>

                                <button class="yt-button px-4 py-2 text-sm sm:px-6 sm:py-3 sm:text-base"
                                    onclick="copyLink(<?php echo e($video ? $video->id : 'null'); ?>)">
                                    <i class="fas fa-link"></i>
                                    <span class="yt-button-text">Copiez le lien</span>
                                </button>
                            </div>

                            <div id="notification" class="notification"></div>
                            <style>
                                @media (max-width: 991px) {
                                    .yt-button-container {
                                        margin-top: -40px;
                                        margin-bottom: 50px;


                                    }
                                }

                                .liked {
                                    color: #ee1a3b;
                                    /* Couleur rouge pour le like */
                                }

                                .yt-button-container {
                                    position: relative;
                                    display: flex;
                                    gap: 10px;
                                    align-items: center;
                                    padding: 3px;
                                }

                                .yt-button {
                                    display: flex;
                                    align-items: center;
                                    gap: 8px;
                                    padding: 8px 16px;
                                    border: none;
                                    border-radius: 10px;
                                    background-color: #f2f2f2;
                                    color: #030303;
                                    font-family: 'Roboto', sans-serif;
                                    font-size: 14px;
                                    cursor: pointer;
                                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                                }

                                .yt-button:hover {
                                    background-color: #e5e5e5;
                                    transform: translateY(-1px);
                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                }

                                .yt-button:active {
                                    background-color: #d9d9d9;
                                    transform: translateY(0);
                                }

                                .yt-button i {
                                    font-size: 16px;
                                }

                                .yt-button-text {
                                    font-weight: 500;
                                }

                                @keyframes copySuccess {
                                    0% {
                                        transform: scale(1);
                                        opacity: 1;
                                    }

                                    50% {
                                        transform: scale(1.1);
                                        opacity: 0.8;
                                    }

                                    100% {
                                        transform: scale(1);
                                        opacity: 1;
                                    }
                                }

                                .copy-success {
                                    animation: copySuccess 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                                }

                                .yt-button.liked {
                                    color: white;
                                    background-color: #ee1a3b;
                                    box-shadow: 0 2px 12px rgba(238, 26, 59, 0.3);
                                }

                                .notification {
                                    position: fixed;
                                    bottom: 24px;
                                    left: 50%;
                                    transform: translateX(-50%) translateY(20px);
                                    background: linear-gradient(135deg, #1a1a1a 0%, #323232 100%);
                                    color: white;
                                    padding: 16px 32px;
                                    border-radius: 16px;
                                    opacity: 0;
                                    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                                    backdrop-filter: blur(10px);
                                    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                                    font-family: 'Roboto', sans-serif;
                                    font-size: 14px;
                                    font-weight: 500;
                                    letter-spacing: 0.3px;
                                    display: flex;
                                    align-items: center;
                                    gap: 12px;
                                    pointer-events: none;
                                    border: 1px solid rgba(255, 255, 255, 0.1);
                                }

                                .notification::before {
                                    content: '';
                                    width: 4px;
                                    height: 4px;
                                    background-color: #4CAF50;
                                    border-radius: 50%;
                                    animation: pulse 1.5s infinite;
                                }

                                @keyframes pulse {
                                    0% {
                                        transform: scale(1);
                                        opacity: 1;
                                    }

                                    50% {
                                        transform: scale(1.5);
                                        opacity: 0.5;
                                    }

                                    100% {
                                        transform: scale(1);
                                        opacity: 1;
                                    }
                                }

                                .notification.show {
                                    opacity: 1;
                                    transform: translateX(-50%) translateY(0);
                                }

                                .notification.hide {
                                    opacity: 0;
                                    transform: translateX(-50%) translateY(20px);
                                }
                            </style>

                        </div>

                    </div>
                    <!-- Bannière verticale adaptatif
                                                                                    <div
                                                                                        class="banner-vertical absolute right-[-35%] top-0 hidden w-[150px] sm:right-[-40%] sm:block sm:w-[200px] md:right-[-50%] md:w-[250px] lg:right-[-445px] lg:w-[300px]">
                                                                                        <img src="https://valkivid.dan-fisher.dev/assets/img/yt1/samples/about-youtube-img.jpg"
                                                                                            alt="Bannière verticale" class="h-auto max-h-full w-auto max-w-full object-contain">
                                                                                    </div>
                                                                                    -->

                    <div
                        class="relative col-span-full mx-auto mt-[-40px] w-full md:col-start-[-5px] md:col-end-9 md:-ml-1 md:mt-[-70px] md:w-3/4 lg:-ml-11">
                        <!-- Bannière verticale -->
                        <div
                            class="banner-vertical absolute right-[-35%] top-0 hidden h-[300px] w-[150px] sm:right-[-40%] sm:block sm:h-[400px] sm:w-[200px] md:right-[-50%] md:h-[500px] md:w-[250px] lg:right-[-445px] lg:h-[550px] lg:w-[300px]">
                            <img alt="Bannière verticale" class="h-full w-full object-cover"
                                style="transform: none; transform-origin: center;">
                        </div>


                        <!-- Bannière horizontale (affichée sur mobiles uniquement) -->
                        <div class="mb-5 block w-full sm:hidden">
                            <img alt="Bannière horizontale" class="h-auto w-full object-contain">
                        </div>
                        <h3 <?php
$nb_comments = $video->comments()->where('deleted', false)->get()->count(); ?>
                            class="text-primary mb-10 text-lg font-bold leading-none tracking-tighter sm:text-2xl md:mb-20 md:text-3xl lg:mb-28 dark:text-white">
                            <span class="text-[#ee1a3b]"><?php echo e($nb_comments); ?></span>
                            Commentaire<?php echo e($nb_comments > 1 ? 's' : ''); ?>

                        </h3>

                        <div class="col-span-full mt-8 md:col-start-3 md:col-end-11 lg:mt-16">
                            <h3
                                class="text-primary mb-10 text-lg font-bold leading-none tracking-tighter sm:text-2xl md:mb-20 md:text-3xl lg:mb-28 dark:text-white">
                                Laissez un commentaire
                            </h3>

                            <!-- Affichage du message d'erreur -->
                            <?php if($errors->has('message')): ?>
                                <div class="mb-4 rounded bg-red-500 p-4 text-white">
                                    <?php echo e($errors->first('message')); ?>

                                </div>
                            <?php endif; ?>

                            <!-- Formulaire de commentaire -->
                            <form id="commentForm" method="POST" action="<?php echo e(route('comments.store')); ?>"
                                class="form-container mx-auto grid w-full grid-cols-1 gap-7 overflow-hidden sm:w-3/4 md:w-2/4 lg:w-2/5">
                                <?php echo csrf_field(); ?>
                                <input class="text-base" type="hidden" name="video_id"
                                    value="<?php echo e($video ? $video->id : ''); ?>">
                                <div class="md:col-span-3">
                                    <textarea
                                        class="border-base text-primary block h-24 w-full resize-none rounded-lg px-4 py-2 text-base leading-tight transition-all duration-150 placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-[#ee1a3b]"
                                        name="content" id="post-comment" placeholder="Votre commentaire"></textarea>
                                </div>

                                <div class="md:col-span-3">
                                    <input
                                        class="mt-4 block w-full transform rounded-md bg-[#ee1a3b] py-5 text-base text-lg font-bold leading-normal tracking-tight text-white transition-all duration-200 ease-in-out hover:-translate-y-1 hover:cursor-pointer hover:bg-[#d0172f] hover:bg-opacity-90 md:mt-8"
                                        type="submit" value="Commentez">
                                </div>
                            </form>
                        </div>

                        <style>
                            @supports (-webkit-appearance: none) {
                                .banner-vertical {
                                    /* Ajustements spécifiques pour Chrome et Edge */
                                    height: 100%;
                                    max-height: 600px;
                                    /* Limite pour éviter les débordements */
                                }
                            }

                            @-moz-document url-prefix() {
                                .banner-vertical {
                                    /* Ajustements spécifiques pour Firefox */
                                    width: auto;
                                    max-width: 95%;
                                    /* Assure que la largeur s'adapte à l'écran */
                                    height: 100%;
                                }
                            }

                            .banner-vertical img {
                                width: 100%;
                                height: 100%;
                                object-fit: contain;
                                overflow: hidden;
                                /* Ajuste l'image pour s'adapter sans la déformer */
                            }

                            /* Styles de base pour la bannière verticale */
                            .banner-vertical {
                                position: absolute;
                                z-index: 10;


                                aspect-ratio: 3 / 5;
                                /* Maintient un ratio de 3:5 */
                                object-fit: cover;
                                /* Adapte l'image à l'espace disponible */
                                max-height: 95vh;
                                /* Empêche la hauteur d'excéder la vue */
                                max-width: 100%;
                                /* Empêche la largeur de dépasser */
                                overflow: hidden;
                                /* Cache les débordements éventuels */

                            }

                            /* MacBook Air (1280 x 800) */
                            @media screen and (min-width: 1280px) {
                                .banner-vertical {
                                    right: -50%;
                                    width: 280px;
                                    height: 550px;
                                }
                            }

                            /* MacBook Air (1440 x 900) */
                            @media screen and (min-width: 1440px) {
                                .banner-vertical {
                                    right: -50%;
                                    width: 300px;
                                    height: 650px;
                                }
                            }

                            /* Grandes tablettes en mode paysage (1024px et plus) */
                            @media screen and (min-width: 1024px) and (max-width: 1279px) {
                                .banner-vertical {
                                    right: -50%;
                                    width: 250px;
                                    height: 550px;
                                }
                            }

                            /* iPad Pro 12.9" (1366 x 1024) */
                            @media screen and (min-width: 1366px) and (max-height: 1024px) {
                                .banner-vertical {
                                    right: -55%;
                                    width: 290px;
                                    height: 620px;
                                }
                            }

                            /* Ajustement pour les écrans plus larges avec ratio 16:9 */
                            @media screen and (min-width: 1600px) {
                                .banner-vertical {
                                    right: -48%;
                                    width: 320px;
                                    height: 98%;
                                }
                            }

                            /* Styles du formulaire existants */
                            .form-container {
                                width: 100%;
                                margin-left: auto;
                                margin-right: auto;
                                z-index: 20;
                            }

                            @media (min-width: 768px) {
                                .form-container {
                                    width: 80%;
                                    margin-right: 18%;
                                }
                            }

                            @media (min-width: 1024px) {
                                .form-container {
                                    width: 110%;
                                    margin-right: -10%;
                                }
                            }

                            .banner-vertical img,
                            .block.sm\:hidden img {

                                transform: translateX(0);
                                transition: transform 0.5s ease-in-out;
                            }
                        </style>

                        <?php
                            $bottomSlideImagesUrl = [];
                            foreach ($bottomImages as $advisory) {
                                $imageUrl = Storage::url($advisory->file);
                                $bottomSlideImagesUrl[] = $imageUrl;
                            }
                        ?>

                        <script>
                            const banners = <?php echo json_encode($bottomSlideImagesUrl); ?>;

                            let currentBannerIndex = 0;
                            const verticalBanner = document.querySelector('.banner-vertical img');
                            const horizontalBanner = document.querySelector('.block.sm\\:hidden img');

                            // Créer des conteneurs pour les transitions
                            const verticalContainer = document.querySelector('.banner-vertical');
                            const horizontalContainer = document.querySelector('.block.sm\\:hidden');

                            // Initialiser les images
                            verticalBanner.src = banners[currentBannerIndex];
                            horizontalBanner.src = banners[currentBannerIndex];

                            function slideBanner() {
                                // Ajouter une nouvelle image pour la transition
                                const nextVerticalBanner = document.createElement('img');
                                const nextHorizontalBanner = document.createElement('img');

                                nextVerticalBanner.src = banners[(currentBannerIndex + 1) % banners.length];
                                nextHorizontalBanner.src = banners[(currentBannerIndex + 1) % banners.length];

                                // Ajouter les styles nécessaires
                                nextVerticalBanner.style.position = 'absolute';
                                nextVerticalBanner.style.top = 0;
                                nextVerticalBanner.style.left = '100%'; // Commence hors du cadre
                                nextVerticalBanner.style.width = '100%';


                                nextHorizontalBanner.style.position = 'absolute';
                                nextHorizontalBanner.style.top = 0;
                                nextHorizontalBanner.style.left = '100%';
                                nextHorizontalBanner.style.width = '100%';


                                verticalContainer.appendChild(nextVerticalBanner);
                                horizontalContainer.appendChild(nextHorizontalBanner);

                                // Animer la transition
                                setTimeout(() => {
                                    verticalBanner.style.transform = 'translateX(-100%)';
                                    nextVerticalBanner.style.transform = 'translateX(-100%)';

                                    horizontalBanner.style.transform = 'translateX(-100%)';
                                    nextHorizontalBanner.style.transform = 'translateX(-100%)';

                                    verticalBanner.style.transition = 'transform 0.5s ease-in-out';
                                    nextVerticalBanner.style.transition = 'transform 0.5s ease-in-out';

                                    horizontalBanner.style.transition = 'transform 0.5s ease-in-out';
                                    nextHorizontalBanner.style.transition = 'transform 0.5s ease-in-out';
                                }, 50);

                                // Nettoyer après la transition
                                setTimeout(() => {
                                    currentBannerIndex = (currentBannerIndex + 1) % banners.length;

                                    verticalBanner.src = banners[currentBannerIndex];
                                    horizontalBanner.src = banners[currentBannerIndex];

                                    verticalContainer.removeChild(nextVerticalBanner);
                                    horizontalContainer.removeChild(nextHorizontalBanner);

                                    verticalBanner.style.transform = 'translateX(0)';
                                    verticalBanner.style.transition = 'none';

                                    horizontalBanner.style.transform = 'translateX(0)';
                                    horizontalBanner.style.transition = 'none';
                                }, 700); // Durée de la transition
                            }

                            setInterval(slideBanner, 6000); // Changer toutes les 6 secondes
                        </script>

                        <!-- Modal pour se connecter -->
                        <div id="loginModal" class="fixed inset-0 z-10 hidden overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex min-h-screen items-center justify-center">
                                <div class="fixed inset-0 bg-black opacity-30"></div>
                                <div
                                    class="transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:w-full sm:max-w-lg">
                                    <div class="p-6">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Connexion requise
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Vous devez être connecté pour interagir. Veuillez vous connecter pour continuer.
                                        </p>
                                        <div class="mt-4">
                                            <a href="<?php echo e(route('login_page', ['redirect' => request()->url()])); ?>"
                                                class="rounded-md bg-[#ee1a3b] px-4 py-2 text-white hover:bg-opacity-90">
                                                Connectez-vous
                                            </a>
                                            <button onclick="closeModal()"
                                                class="ml-4 rounded-md bg-black px-4 py-2 text-white hover:bg-gray-700">Fermez</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.getElementById('commentForm').onsubmit = function(event) {
                                event.preventDefault(); // Empêche l'envoi du formulaire par défaut
                                <?php if(!Auth::check()): ?> // Vérifie si l'utilisateur n'est pas connecté
                                    document.getElementById('loginModal').classList.remove('hidden'); // Affiche le modal
                                <?php else: ?>
                                    this.submit(); // Soumet le formulaire si l'utilisateur est connecté
                                <?php endif; ?>
                            };

                            function closeModal() {
                                document.getElementById('loginModal').classList.add('hidden');
                            }
                        </script>
                        <br><br>


                        <ol class="mt-30 text-lg leading-8 tracking-tight">
                            <?php $__currentLoopData = $video->comments()->where('deleted', false)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$comment->parent_comment_id): ?>
                                    <li class="mb-8 lg:mb-12" id="comment-<?php echo e($comment->id); ?>">
                                        <div class="flex gap-x-4">
                                            <figure class="shrink-0">
                                                <img src="<?php echo e(asset('mygp-images/logo-gp.png')); ?>" alt="Logo"
                                                    class="h-10 w-10 rounded-full">
                                            </figure>
                                            <div class="flex-grow">
                                                <div class="mb-1 flex items-baseline gap-2">
                                                    <h5 class="text-primary text-sm font-semibold dark:text-white">
                                                        <?php echo e($comment->user ? $comment->user->fullName() : 'Utilisateur supprimé'); ?>


                                                    </h5>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        <?php echo e($comment->created_at->locale('fr')->diffForHumans()); ?>

                                                    </span>
                                                </div>

                                                <div class="mb-2 text-sm text-gray-900 dark:text-gray-200 dark:text-white">
                                                    <?php echo e($comment->content); ?>

                                                </div>

                                                <div class="mb-3 flex items-center gap-4">
                                                    <button data-comment-id="<?php echo e($comment->id); ?>"
                                                        <?php ($liked = $comment->hasBeenLikedByUser()); ?> class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                            'like-button flex items-center gap-1 text-sm dark:text-gray-400 hover:text-gray-900' => true,
                                                            'liked' => $liked,
                                                            'text-gray-600' => !$liked,
                                                        ]); ?>">
                                                        <svg class="h-4 w-4 dark:text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                                            </path>
                                                        </svg>
                                                        <span
                                                            class="like-count dark:text-white"><?php echo e($comment->likes->count()); ?></span>
                                                    </button>
                                                    <a href="#"
                                                        class="reply-button text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:text-white"
                                                        data-comment-id="<?php echo e($comment->id); ?>">
                                                        RÉPONDEZ
                                                    </a>
                                                </div>

                                                <!-- Formulaire de réponse -->
                                                <?php if(auth()->guard()->check()): ?>
                                                    <div class="reply-form mb-4 hidden" id="reply-form-<?php echo e($comment->id); ?>">
                                                        <div class="flex gap-4">
                                                            <img src="<?php echo e(asset('mygp-images/logo-gp.png')); ?>" alt="Avatar"
                                                                class="h-8 w-8 rounded-full">
                                                            <div class="form-container flex-grow">
                                                                <textarea
                                                                    class="form-control w-full resize-none rounded-lg border p-3 text-base text-sm focus:border-[#ee1a3b] focus:outline-none focus:ring-0 focus:ring-[#ee1a3b]"
                                                                    rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                                                <div class="mt-2 flex justify-end gap-2">
                                                                    <button
                                                                        class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annulez</button>
                                                                    <button
                                                                        class="submit-reply-button rounded-lg bg-[#ee1a3b] px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                                                                        data-comment-id="<?php echo e($comment->id); ?>">
                                                                        Répondez
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        document.querySelectorAll('.cancel-reply-button').forEach(button => {
                                                            button.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                                const replyForm = this.closest('.reply-form');
                                                                if (replyForm) {
                                                                    const textarea = replyForm.querySelector('textarea');
                                                                    if (textarea) {
                                                                        textarea.value = '';
                                                                    }
                                                                    replyForm.classList.add('hidden');
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                <?php endif; ?>

                                                <!-- Réponses -->
                                                <div class="replies space-y-4">
                                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!$reply->deleted): ?>
                                                            <div
                                                                class="form-container flex flex gap-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-800">
                                                                <img src="<?php echo e($reply->user->profile_image ?? asset('mygp-images/logo-gp.png')); ?>"
                                                                    alt="Avatar" class="h-8 w-8 rounded-full">
                                                                <div class="flex-grow">
                                                                    <div class="mb-1 flex items-baseline gap-2">
                                                                        <span
                                                                            class="text-sm font-medium text-gray-900 dark:text-white">
                                                                            <?php echo e(isset($reply->user) ? $reply->user->fullName() : 'Utilisateur Anonyme'); ?>


                                                                        </span>
                                                                        <span class="text-xs text-gray-500">
                                                                            <?php echo e($reply->created_at->diffForHumans()); ?>

                                                                        </span>
                                                                    </div>
                                                                    <p
                                                                        class="mb-2 text-sm text-gray-800 dark:text-gray-200">
                                                                        <?php echo e($reply->content); ?>

                                                                    </p>
                                                                    <div class="flex items-center gap-4">
                                                                        <button <?php ($liked = $reply->hasBeenLikedByUser()); ?>
                                                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                                                'like-button flex items-center gap-1 text-sm dark:text-gray-400 hover:text-gray-900' => true,
                                                                                'liked' => $liked,
                                                                                'text-gray-600' => !$liked,
                                                                            ]); ?>"
                                                                            data-comment-id="<?php echo e($reply->id); ?>">
                                                                            <svg class="h-4 w-4" fill="none"
                                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                                                                </path>
                                                                            </svg>
                                                                            <span
                                                                                class="like-count"><?php echo e($reply->likes->count()); ?></span>
                                                                        </button>
                                                                        <a href="#"
                                                                            class="reply-button text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400"
                                                                            data-comment-id="<?php echo e($reply->id); ?>">
                                                                            RÉPONDEZ
                                                                        </a>
                                                                    </div>

                                                                    <!-- Formulaire de réponse pour les réponses -->
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <div class="reply-form mt-4 hidden overflow-hidden"
                                                                            id="reply-form-<?php echo e($reply->id); ?>">
                                                                            <div class="flex gap-4">
                                                                                <img src="<?php echo e(asset('mygp-images/logo-gp.png')); ?>"
                                                                                    alt="Avatar"
                                                                                    class="h-8 w-8 rounded-full">
                                                                                <div class="flex-grow">
                                                                                    <textarea
                                                                                        class="form-control w-full resize-none rounded-lg border p-3 text-base text-sm focus:border-[#ee1a3b] focus:outline-none focus:ring-0 focus:ring-[#ee1a3b]"
                                                                                        rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                                                                    <div class="mt-2 flex justify-end gap-2">
                                                                                        <button
                                                                                            class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annulez</button>
                                                                                        <button
                                                                                            class="submit-reply-button rounded-lg bg-[#ee1a3b] px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                                                                                            data-comment-id="<?php echo e($comment->id); ?>">
                                                                                            Répondez
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if(auth()->guard()->guest()): ?>
                                                                        <div class="mt-4 hidden text-sm"
                                                                            id="reply-form-<?php echo e($reply->id); ?>">
                                                                            <p class="text-gray-600">Vous devez être connecté
                                                                                pour
                                                                                répondre.</p>
                                                                            <a href="<?php echo e(route('login_page')); ?>"
                                                                                class="font-medium text-[#ee1a3b] hover:underline">
                                                                                Connectez-vous</a>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                initializeEventListeners();
                                initializeLikeButtons();
                            });

                            function initializeEventListeners() {
                                // Gestion des boutons de réponse
                                document.querySelectorAll('.reply-button').forEach(button => {
                                    if (!button.dataset.initialized) {
                                        button.dataset.initialized = 'true';
                                        button.addEventListener('click', handleReplyButtonClick);
                                    }
                                });

                                // Gestion des boutons d'annulation
                                document.querySelectorAll('.cancel-reply-button').forEach(button => {
                                    if (!button.dataset.initialized) {
                                        button.dataset.initialized = 'true';
                                        button.addEventListener('click', handleCancelReply);
                                    }
                                });

                                // Gestion des boutons de soumission
                                document.querySelectorAll('.submit-reply-button').forEach(button => {
                                    if (!button.dataset.initialized) {
                                        button.dataset.initialized = 'true';
                                        button.addEventListener('click', handleSubmitReply);
                                    }
                                });
                            }

                            function initializeLikeButtons() {
                                document.querySelectorAll('.like-button').forEach(button => {
                                    if (!button.dataset.initialized) {
                                        button.dataset.initialized = 'true';
                                        button.addEventListener('click', handleLikeClick);
                                    }
                                });
                            }

                            function handleReplyButtonClick(event) {
                                event.preventDefault();
                                const commentId = this.dataset.commentId;

                                // Cacher tous les autres formulaires
                                document.querySelectorAll('.reply-form').forEach(form => {
                                    if (form.id !== `reply-form-${commentId}`) {
                                        form.classList.add('hidden');
                                    }
                                });

                                const replyForm = document.getElementById(`reply-form-${commentId}`);
                                if (replyForm) {
                                    replyForm.classList.toggle('hidden');
                                    if (!replyForm.classList.contains('hidden')) {
                                        const textarea = replyForm.querySelector('textarea');
                                        if (textarea) {
                                            const parentName = this.closest('.flex-grow').querySelector('.text-sm.font-medium').textContent
                                                .trim();
                                            textarea.placeholder = `Répondre à @${parentfullName}...`;
                                            textarea.focus();
                                        }
                                    }
                                }
                            }

                            function handleCancelReply(e) {
                                e.preventDefault();
                                const replyForm = this.closest('.reply-form');
                                if (replyForm) {
                                    const textarea = replyForm.querySelector('textarea');
                                    if (textarea) {
                                        textarea.value = '';
                                    }
                                    replyForm.classList.add('hidden');
                                }
                            }

                            function handleSubmitReply() {
                                const commentId = this.dataset.commentId;
                                const replyForm = document.getElementById(`reply-form-${commentId}`);
                                const content = replyForm.querySelector('textarea').value;
                                const parentContainer = this.closest('.flex-grow');

                                if (!content.trim()) {
                                    alert('Veuillez entrer un message avant de répondre.');
                                    return;
                                }

                                fetch(`/comment/${commentId}/reply`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify({
                                            content: content,
                                            parent_id: commentId
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Trouver le bon conteneur de réponses
                                            let repliesContainer;
                                            if (parentContainer.querySelector('.replies')) {
                                                repliesContainer = parentContainer.querySelector('.replies');
                                            } else {
                                                repliesContainer = document.createElement('div');
                                                repliesContainer.className = 'replies space-y-4 ml-8 mt-4';
                                                parentContainer.appendChild(repliesContainer);
                                            }

                                            const newReply = createReplyElement(data);
                                            repliesContainer.insertAdjacentHTML('beforeend', newReply);

                                            // Réinitialiser le formulaire
                                            replyForm.querySelector('textarea').value = '';
                                            replyForm.classList.add('hidden');

                                            // Réinitialiser les événements
                                            initializeEventListeners();
                                            initializeLikeButtons();
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Erreur:', error);
                                        alert('Une erreur est survenue lors de l\'envoi de votre réponse.');
                                    });
                            }

                            function handleLikeClick() {
                                const commentId = this.dataset.commentId;
                                const likeCount = this.querySelector('.like-count');

                                fetch(`/comment/${commentId}/like`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        likeCount.textContent = data.like_count;
                                        if (data.liked)
                                            this.classList.add('liked').remove('text-gray-600');
                                        else
                                            this.classList.remove('liked').add('text-gray-600');
                                    })
                                    .catch(error => console.error('Erreur:', error));
                            }

                            function createReplyElement(data) {
                                return `
                                <div class="flex gap-4 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg flex">
                                    <img src="${data.user.profile_image || '/mygp-images/logo-gp.png'}" alt="Avatar" class="w-8 h-8 rounded-full">
                                    <div class="flex-grow">
                                        <div class="flex items-baseline gap-2 mb-1">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">${data.user.fullName}</span>
                                            <span class="text-xs text-gray-500">${data.created_at}</span>
                                        </div>
                                        <p class="text-sm text-gray-800 dark:text-gray-200 mb-2">${data.content}</p>
                                        <div class="flex items-center gap-4">
                                            <button class="like-button flex items-center gap-1 text-sm text-gray-600 hover:text-gray-900" data-comment-id="${data.id}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                                </svg>
                                                <span class="like-count">0</span>
                                            </button>
                                            <a href="#" class="reply-button text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900" data-comment-id="${data.id}">
                                                RÉPONDEZ
                                            </a>
                                        </div>
                                        <!-- Formulaire de réponse imbriqué -->
                                        <div class="overflow-hidden reply-form hidden mt-4" id="reply-form-${data.id}">
                                            <div class="flex gap-4">
                                                <img src="/mygp-images/logo-gp.png" alt="Avatar" class="w-8 h-8 rounded-full">
                                                <div class="flex-grow">
                                                    <textarea class="text-base form-control w-full border rounded-lg p-3 text-sm resize-none focus:ring-0 focus:ring-[#ee1a3b] focus:border-[#ee1a3b] focus:outline-none" rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                                    <div class="flex justify-end gap-2 mt-2">
                                                        <button class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annulez</button>
                                                        <button class="submit-reply-button px-4 py-2 text-sm font-medium text-white bg-[#ee1a3b] rounded-lg hover:bg-red-700" data-comment-id="${data.id}">Répondez</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            }
                        </script>

            </article>
        </div>
        <style>
            .yt-video-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
                color: #606060;
                font-size: 16px;
            }

            .yt-video-description {
                margin-bottom: 15px;
                font-size: 18px;
            }


            /* CSS pour masquer et afficher les icônes proprement */
            /* Bouton du menu burger */
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

            .disable-interaction {
                pointer-events: none;
                /* Empêche tout clic ou interaction */
                opacity: 0.5;
                /* Facultatif : Visuellement montrer que c'est désactivé */
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="<?php echo e(asset('assets/backoffice/js/core/jquery-3.7.1.min.js')); ?>"></script>

        <script src="https://cdn.kkiapay.me/k.js"></script>
        <script>
            <?php if(!App\Repositories\UserVideoRepository::canWatchPremiumVideo($video->id)): ?>
                document.addEventListener('DOMContentLoaded', function() {
                    const playButton = document.getElementById('playButton');
                    const videoPlayer = document.getElementById('videoPlayer');
                    const modal = document.getElementById('premiumModal');
                    const closeModalX = document.getElementById('closeModalX');
                    const payVideoButton = document.getElementById('payVideoButton');
                    const subscribeButton = document.getElementById('subscribeButton');

                    // Variable pour garder la trace du délai de 10 secondes
                    let modalTimeout;

                    const hoverVideo = () => {
                        videoPlayer.src =
                            "https://www.youtube.com/embed/<?php echo e($video->youtube_id ?? 'default_video_id'); ?>?autoplay=1&controls=1";
                        videoPlayer.classList.remove('hidden');
                        clearTimeout(modalTimeout);
                        modalTimeout = setTimeout(() => {
                            stopVideoAndShowModal();
                        }, 10000); // Affiche le modal après 10 secondes
                    };

                    const stopVideoAndShowModal = () => {
                        videoPlayer.src = ""; // Arrête la vidéo
                        showModal(); // Affiche le modal
                    };

                    if (playButton && videoPlayer && modal && closeModalX && payVideoButton && subscribeButton) {
                        // Lancer la vidéo automatiquement sans survol
                        hoverVideo();

                        closeModalX.addEventListener('click', hideModal);

                        payVideoButton.addEventListener('click', () => {
                            console.log("L'utilisateur souhaite payer pour la vidéo");
                        });

                        subscribeButton.addEventListener('click', () => {
                            console.log("L'utilisateur souhaite s'abonner");
                        });
                    } else {
                        console.error('Certains éléments nécessaires n\'ont pas été trouvés dans le DOM.');
                    }
                });

                function showModal() {
                    const modal = document.getElementById('premiumModal');
                    modal.classList.remove('hidden');
                    document.body.classList.add('no-scroll'); // Désactiver le défilement

                    gsap.fromTo(modal.firstElementChild, {
                        opacity: 0,
                        scale: 0.8
                    }, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.5,
                        ease: "back.out(1.7)"
                    });
                }

                function hideModal() {
                    const modal = document.getElementById('premiumModal');
                    gsap.to(modal.firstElementChild, {
                        opacity: 0,
                        scale: 0.8,
                        duration: 0.3,
                        ease: "power2.in",
                        onComplete: () => {
                            modal.classList.add('hidden');
                            document.body.classList.remove('no-scroll'); // Réactiver le défilement
                        }
                    });
                }
            <?php endif; ?>


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
            const slideContainer = document.querySelector('.slide-container'); // Conteneur du slide


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

            mobileMenuToggle.onclick = (event) => {
                // Empêche la propagation de l'événement
                event.stopPropagation();

                mobileMenuToggle.classList.toggle('active');

                if (mobileMenuToggle.classList.contains('active')) {
                    siteWrapper.classList.add('overflow-y-hidden');
                    iconOpen.classList.remove('visible'); // Cache l'icône menu
                    iconClose.classList.add('visible'); // Affiche l'icône close
                    mobileMenu.classList.remove('translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                    mobileMenu.classList.add('z-1000');
                    //mobileMenu.style.position = 'fixed';
                    //mobileMenu.style.zIndex = '1000';

                    // Informer explicitement le slide qu'aucun clic n'est détecté
                    if (slideContainer) {
                        slideContainer.classList.add('disable-interaction');
                    }
                } else {
                    siteWrapper.classList.remove('overflow-y-hidden');
                    iconOpen.classList.add('visible'); // Affiche l'icône menu
                    iconClose.classList.remove('visible'); // Cache l'icône close
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');

                    // Rétablir les interactions sur le slide
                    if (slideContainer) {
                        slideContainer.classList.remove('disable-interaction');
                    }
                }
            };
            // Empêcher tout clic en dehors du menu de déclencher des comportements non souhaités
            document.body.onclick = () => {
                if (mobileMenuToggle.classList.contains('active')) {
                    mobileMenuToggle.classList.remove('active');
                    siteWrapper.classList.remove('overflow-y-hidden');
                    iconOpen.classList.add('visible');
                    iconClose.classList.remove('visible');
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');

                    if (slideContainer) {
                        slideContainer.classList.remove('disable-interaction');
                    }
                }
            };
            document.addEventListener('DOMContentLoaded', function() {
                <?php if(auth()->guard()->check()): ?>
                const isLiked = <?php echo e($video && $video->isLikedBy(auth()->user()) ? 'true' : 'false'); ?>;
            <?php else: ?>
                const isLiked = false;
            <?php endif; ?>

            const videoId = <?php echo e(isset($video) ? $video->id : 'null'); ?>;

            if (isLiked) {
                const likeButton = document.getElementById(`like-button-${videoId}`);
                if (likeButton) {
                    likeButton.classList.add('liked');
                }
            }
            });

            function toggleLike(videoId) {
                fetch(`/videos/${videoId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        const likeButton = document.getElementById(`like-button-${videoId}`);
                        const likeCount = document.getElementById(`like-count-${videoId}`);

                        if (likeCount) {
                            likeCount.textContent = data.likes_count;
                        }

                        if (data.status === 'liked') {
                            likeButton.classList.add('liked');
                        } else {
                            likeButton.classList.remove('liked');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }


            setTimeout(() => {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('videos.incrementViews', ['videoId' => $video->id])); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {}
                });
            }, 20000);
        </script>
        <script>
            function copyVideoLink() {
                const url = '<?php echo e(request()->url()); ?>';
                navigator.clipboard.writeText(url).then(() => {
                    alert("Le lien de la vidéo a été copié dans le presse-papiers.");
                });
            }

            function shareOnFacebook() {
                const url = encodeURIComponent('<?php echo e(request()->url()); ?>');
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
            }

            function shareOnWhatsApp() {
                const url = encodeURIComponent('<?php echo e(request()->url()); ?>');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://api.whatsapp.com/send?text=${text} ${url}`, '_blank');
            }

            function shareOnInstagram() {
                const url = '<?php echo e(request()->url()); ?>';
                alert("Pour partager sur Instagram, copiez ce lien et collez-le dans votre message Instagram : \n" + url);
            }

            function shareOnX() {
                const url = encodeURIComponent('<?php echo e(request()->url()); ?>');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://twitter.com/share?url=${url}&text=${text}`, '_blank');
            }

            function shareOnSnapchat() {
                const url = encodeURIComponent('<?php echo e(request()->url()); ?>');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://www.snapchat.com/share/video?url=${url}&text=${text}`, '_blank');
            }

            function shareOnYouTube() {
                const url = '<?php echo e(request()->url()); ?>';
                alert("Pour partager cette vidéo sur YouTube, copiez le lien et collez-le dans une publication ou un commentaire : \n" +
                    url);
            }

            function shareOnTikTok() {
                const url = '<?php echo e(request()->url()); ?>';
                alert("Pour partager cette vidéo sur TikTok, copiez le lien et collez-le dans une publication ou un commentaire TikTok : \n" +
                    url);
            }

            if (navigator.userAgent.indexOf('Firefox') !== -1) {
                document.querySelectorAll('br').forEach(function(br) {
                    br.classList.add('firefox-br');
                });
            }
        </script>

        <div id="premiumModal"
            class="fixed inset-0 z-50 flex hidden h-full w-full items-center justify-center overflow-y-auto bg-gray-600 bg-opacity-50">
            <div class="relative m-auto flex w-full max-w-sm flex-col rounded-lg bg-white p-8 px-4 shadow-lg md:px-6">
                <button id="closeModalX" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="mx-auto h-16 w-16 text-red-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <?php if(isset($video) && $video->premium_video): ?>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900 md:mb-6 md:text-3xl lg:text-3xl">
                            Abonnement Premium Requis !
                        </h3>
                        <p class="mb-8 text-gray-600 md:mb-10 md:text-lg lg:text-xl">
                            Abonnez-vous ou optez pour un paiement unique de <?php echo e($video->single_price); ?> XOF pour accéder à
                            cette vidéo exclusive.
                        </p>

                        <div class="flex justify-center space-x-4">
                            <?php if(auth()->guard()->check()): ?>
                                <kkiapay-widget id="payVideoButton" amount="<?php echo e($video->single_price); ?>"
                                    key="<?php echo e(env('KKIAPAY_PUBLIC_API_KEY')); ?>" url="<?php echo e(asset('mygp-images/LogoGP.png')); ?>"
                                    position="center" data="user_id:<?php echo e(auth()->user()->id); ?>&video_id:<?php echo e($video->id); ?>"
                                    callback="<?php echo e(route('status-payment')); ?>" theme="#ee1a3b">
                                </kkiapay-widget>
                            <?php endif; ?>

                            <?php if(auth()->guard()->guest()): ?>
                                <button id="payVideoButton" onclick="window.location.href='<?php echo e(route('login_page')); ?>'"
                                    class="mb-2 mr-0 w-full rounded bg-[#222121] px-3 py-2 text-xs font-bold text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none sm:mb-0 sm:mr-2 sm:w-auto sm:px-4 sm:py-3 sm:text-sm md:px-6 md:text-base lg:text-lg">
                                    Connectez-vous et payez
                                </button>
                            <?php endif; ?>

                            <button id="subscribeButton" onclick="window.location.href='<?php echo e(route('sub-add')); ?>'"
                                class="mb-2 mr-0 w-full rounded bg-[#ee1a3b] px-3 py-2 text-xs font-bold text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none sm:mb-0 sm:mr-2 sm:w-auto sm:px-5 sm:py-3 sm:text-sm md:text-base lg:text-lg">
                                Abonnez-vous
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <style>
            /* Appliquer les modifications seulement sur les écrans de 767px et moins */
            @media (max-width: 768px) {

                /* Réduire davantage la hauteur de l'image de fond sur mobile */
                .bg-cover.bg-center.bg-no-repeat {
                    min-height: 180px;
                    /* Hauteur réduite */
                }

                .full-width-bg {
                    width: 110vw;
                    margin-left: calc(-50vw + 50%);
                    padding: 16px;
                    height: 168px;
                    /* Hauteur du fond blanc */
                    margin-top: -80px;
                    /* Ajustement pour éviter le chevauchement en haut */
                    margin-bottom: 110px;
                    /* Espace ajouté en bas */
                }

                .full-width-bg .content-padding {
                    padding-left: 13px;
                    padding-right: 13px;
                }

                .aspect-video {
                    margin-top: -3%;
                }
            }

            /* Adaptations pour iPads (768px à 1024px) */
            @media (min-width: 768px) and (max-width: 1024px) {
                .bg-cover.bg-center.bg-no-repeat {
                    min-height: 500px;

                }

                .full-width-bg {
                    width: 90%;
                    margin-left: auto;
                    margin-right: auto;
                    padding: 20px;
                    height: 150px;
                    margin-top: 80px;
                    /* Ajustement pour éviter le chevauchement en haut */
                    margin-bottom: 110px;
                }

                .full-width-bg .content-padding {
                    padding-left: 16px;
                    padding-right: 16px;
                }

                .aspect-video {
                    margin-top: -3%;
                }
            }

            /* Adaptations pour écrans à partir de 1025px */
            @media (min-width: 1025px) {
                .bg-cover.bg-center.bg-no-repeat {
                    min-height: 600px;
                    /* Ajustement de la hauteur pour écrans plus grands */
                    background-size: cover;
                    /* S'assurer que l'image couvre complètement le conteneur */
                }

                .full-width-bg {
                    width: 90%;
                    /* Réduire la largeur pour les grands écrans */

                    margin-left: auto;
                    margin-right: auto;
                    padding: 35px;
                    /* Ajustement du padding */
                    height: 218px;
                    /* Hauteur automatique pour s'adapter au contenu */
                }

                .full-width-bg .content-padding {
                    padding-left: 16px;
                    /* Ajustements de padding pour le contenu */
                    padding-right: 20px;
                }

                .aspect-video {
                    margin-top: -3%;
                }
            }

            .no-scroll {
                overflow: hidden;
            }
        </style>
        <script>
            let isLiked = false;

            function toggleLike(videoId) {
                const likeButton = document.getElementById(`like-button-${videoId}`);
                const likeCount = document.getElementById(`like-count-${videoId}`);
                <?php if(!Auth::check()): ?>
                    document.getElementById('loginModal').classList.remove('hidden');
                    return;
                <?php endif; ?>
                // Effectuer une requête AJAX pour ajouter ou retirer le like
                fetch(`/videos/${videoId}/toggle-like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur lors de la mise à jour du like');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Mettez à jour l'état du bouton et le compteur
                        isLiked = data.liked;
                        if (isLiked) {
                            likeButton.classList.add('liked');
                        } else {
                            likeButton.classList.remove('liked');
                        }
                        likeCount.textContent = data.likes_count;

                        // Afficher une notification
                        showNotification(isLiked ? 'Vous avez aimé cette vidéo !' : 'Vous avez retiré votre like.');
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        showNotification('Une erreur s\'est produite. Veuillez réessayer.');
                    });
            }

            function showNotification(message) {
                const notification = document.getElementById('notification');
                notification.textContent = message;

                notification.classList.remove('hide');
                void notification.offsetWidth; // Pour redémarrer l'animation
                notification.classList.add('show');

                setTimeout(() => {
                    notification.classList.add('hide');
                    notification.classList.remove('show');
                }, 3000);
            }

            function copyLink(videoId) {
                const videoUrl = window.location.origin + '/video-watch/' + videoId; // Construire l'URL de la vidéo
                navigator.clipboard.writeText(videoUrl).then(() => {
                    const copyButton = document.querySelector('#like-button-' + videoId).parentElement.querySelector(
                        '.fa-link').parentElement;
                    copyButton.classList.add('copy-success');

                    const textSpan = copyButton.querySelector('.yt-button-text');
                    const originalText = textSpan.textContent;
                    textSpan.textContent = 'Lien copié !';

                    showNotification('Le lien a été copié dans votre presse-papiers !');

                    setTimeout(() => {
                        copyButton.classList.remove('copy-success');
                        textSpan.textContent = originalText;
                    }, 2000);
                }).catch(err => {
                    console.error('Échec de la copie :', err);
                    showNotification('Erreur lors de la copie du lien');
                });
            }
        </script>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/pages/video-watch.blade.php ENDPATH**/ ?>