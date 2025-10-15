@extends('layouts.app')

@section('head')
    @if (isset($video))
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:title" content="{{ "$video->title - Grand Public" }}">
        <meta property="og:description" content="{{ $video->description ?? 'Une vidéo Grand Public' }}">
        <meta property="og:image" content="{{ $video->video_thumbnail }}">
    @endif

@section('content')
    <div>

        <div class="relative bg-cover bg-center bg-no-repeat bg-height-mobile md:min-h-[600px]">

            <div class="relative z-10 container mx-auto px-4 h-full flex flex-col justify-center items-start">
                <div
                    class="h-auto object-contain p-6 w-full md:w-[85%] lg:w-[75%] xl:w-[65%] mx-auto mt-32 md:mt-100 mb-0 slide-container">

                </div>
                <script>
                    const images = [

                        'https://valkivid.dan-fisher.dev/assets/img/yt1/samples/about-youtube-img.jpg',
                        'https://valkivid.dan-fisher.dev/assets/img/yt1/samples/about-youtube-img.jpg'

                    ];

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
                    class="dark:bg-gray-900 bg-white p-6 rounded-none relative top-32 sm:top-25 md:top-18 lg:top-20 xl:top-15 min-h-[220px] h-fit flex flex-col justify-center full-width-bg md:w-[80%] lg:w-[70%] xl:w-[60%] md:ml-10 lg:ml-16 xl:ml-20 mb-10 md:mb-0 content-padding">


                    <div class="mb-4 flex justify-start">
                        <a class="font-bold text-[#d81a3b] text-2xl lg:text-4xl uppercase"
                            href="{{ route($video->category) }}">
                            {{ $video->category }}
                        </a>

                    </div>

                    <h1
    class="pb-1 text-2xl font-bold leading-tight tracking-tighter text-primary dark:text-white md:text-3xl lg:pr-20 lg:text-5xl lg:leading-none">
    {{ $video->title ?? 'Titre Indisponible' }}
</h1>

                </div>
            </div>
        </div>
    </div>


    <style>
        .slide-container {
            position: relative;
            overflow: hidden;
            height: 160px;
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
        <div class=" container">
            <article
                class="grid-col-4 grid gap-x-4 md:grid-cols-12 md:gap-x-6 lg:gap-x-[30px] isolate relative article-spacing-mobile ml-1 md:ml-5 lg:ml-10 xl:ml-9">
                <div
                    class="-mx-16 md:mx-0 col-span-full md:col-start-2 md:col-end-12 bg-white dark:bg-gray-900 h-[210px] -z-10 absolute inset-x-0">
                </div>
                <style>
                    /* Ajout d'espacement en haut de l'élément article pour les écrans mobiles */
                    @media (max-width: 991px) {
                        .article-spacing-mobile {
                            margin-top: 30px;
                            /* Ajustez cette valeur selon l'espacement souhaité */
                        }
                    }
                </style>
                <section
                    class="hidden col-span-full mb-5 flex flex-col items-start gap-y-6 pt-16 lg:pt-20 md:col-start-3 md:col-end-11 md:mb-14">
                    <a class="bg-[#ee1a3b] px-3 py-1 text-xs font-bold uppercase leading-snug text-white transition-colors hover:bg-[#ee1a3b]/90 md:text-sm"
                        href="{{ route($video->category) }}">{{ $video->category }}</a>
                    <h1
                        class="relative z-10 pb-2 text-xl font-bold leading-tight tracking-tighter text-primary dark:text-white md:text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl lg:pr-20 lg:pl-8">
                        {{ $video->title }}
                    </h1>

                </section>

                <div class="col-span-full md:col-start-2 md:col-end-12 grid grid-cols-8 gap-x-4 md:gap-x-6 lg:gap-x-[30px]">
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
                        <div class="vv-prose ">
                            <!-- Conteneur pour la vidéo -->
                            <div class=" relative aspect-video bg-black rounded-lg overflow-hidden shadow-xl group">
                                <!-- Vignette de la vidéo avec bouton de lecture -->
                                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 group-hover:scale-110 "
                                    style="background-image: url('{{ $video->video_thumbnail }}');">
                                </div>

                                <div
                                    class="absolute inset-0 bg-black bg-opacity-40 transition-opacity duration-300 hover:bg-opacity-20">
                                </div>
                                <button id="playButton"
                                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full p-4 shadow-lg transition-transform duration-300 hover:scale-110 focus:outline-none hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>

                                <iframe id="videoPlayer" class="absolute inset-0 w-full h-full" frameborder="0"
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
                                    const baseUrl = "https://www.youtube.com/embed/{{ $video->youtube_id ?? 'default_youtube_id' }}";
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
                                    {{ isset($video) && $video->youtube_view_count ? $video->youtube_view_count : 0 }}
                                    Vue{{ isset($video) && $video->youtube_view_count > 1 ? 's' : '' }}
                                </span>
                                <span>
                                    {{ isset($video) && $video->publication_date ? \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') : 'Date non disponible' }}
                                </span>
                            </div>
                            <p class="yt-video-description">
                                {{ isset($video) && $video->description ? $video->description : 'Description non disponible' }}
                            </p>
                            <style>
                                @media (max-width: 992px) {
                                    .icon-offset-mobile {
                                        margin-left: -17px;
                                        /* Ajustez cette valeur pour déplacer vers la gauche */
                                    }
                                }
                            </style>
                            <div class="icon-offset-mobile mb-10 col-span-1 mt-3 relative pl-[-100px]">

                                <ul class="flex justify-start gap-2 sticky top-6 mt-0">
                                    <!-- YouTube -->

                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnYouTube()"
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-youtube text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Facebook -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnFacebook()"
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-facebook-f text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Instagram -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnInstagram()"
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-instagram text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- X (Twitter) -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnX()"
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <span class="flex items-center justify-center h-6 w-6">
                                                <svg class="dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b] h-6 w-6 md:h-8 md:w-8 dark:invert transition-[filter] duration-300"
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
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-whatsapp text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- Snapchat -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnSnapchat()"
                                            class="no-underline rounded-full flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-snapchat text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>
                                    <!-- TikTok -->
                                    <li class="flex-shrink-0">
                                        <a href="javascript:void(0);" onclick="shareOnTikTok()"
                                            class="no-underline rounded-full relative flex h-8 w-8 md:h-11 md:w-11 items-center justify-center text-xs border transition-colors dark:border-white border-gray-800 bg-white dark:bg-gray-900 hover:border-[#ee1a3b] dark:hover:border-[#ee1a3b]">
                                            <i
                                                class="fab fa-tiktok text-xl md:text-2xl text-gray-800 dark:text-white hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="yt-button-container flex justify-start space-x-4 pl-[-100px]">
                                <button class="yt-button text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3"
                                    onclick="toggleLike({{ isset($video) ? $video->id : 'null' }})"
                                    id="like-button-{{ $video ? $video->id : 'default' }}">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span id="like-count-{{ $video ? $video->id : 'default' }}">
                                        {{ $video ? $video->likes->count() : 0 }}
                                    </span>
                                </button>

                                <button class="yt-button text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3"
                                    onclick="copyLink({{ $video ? $video->id : 'null' }})">
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
                                                class="banner-vertical hidden sm:block absolute top-0 right-[-35%] sm:right-[-40%] md:right-[-50%] lg:right-[-445px] w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px]">
                                                <img src="https://valkivid.dan-fisher.dev/assets/img/yt1/samples/about-youtube-img.jpg"
                                                    alt="Bannière verticale" class="h-auto w-auto max-w-full max-h-full object-contain">
                                            </div>
                                            -->

                    <div
                        class="col-span-full md:col-start-[-5px] md:col-end-9 mt-[-40px] md:mt-[-70px] md:-ml-1 lg:-ml-11 w-full md:w-3/4 mx-auto relative">
                        <!-- Bannière verticale -->
                        <div
                            class="banner-vertical hidden sm:block absolute top-0 right-[-35%] sm:right-[-40%] md:right-[-50%] lg:right-[-445px] w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px] h-[300px] sm:h-[400px] md:h-[500px] lg:h-[550px]">
                            <img alt="Bannière verticale" class="h-full w-full object-cover"
                                style="transform: none; transform-origin: center;">
                        </div>


                        <!-- Bannière horizontale (affichée sur mobiles uniquement) -->
                        <div class="block sm:hidden w-full mb-5">
                            <img alt="Bannière horizontale" class="h-auto w-full object-contain">
                        </div>
                        <h3
                            class="mb-10 text-lg sm:text-2xl md:text-3xl font-bold leading-none tracking-tighter text-primary dark:text-white md:mb-20 lg:mb-28">
                            <span class="text-[#ee1a3b]">{{ $video->comments->count() }}</span>
                            Commentaire{{ $video->comments->count() > 1 ? 's' : '' }}
                        </h3>

                        <div class="col-span-full md:col-start-3 md:col-end-11 mt-8 lg:mt-16">
                            <h3
                                class="mb-10 text-lg sm:text-2xl md:text-3xl font-bold leading-none tracking-tighter text-primary dark:text-white md:mb-20 lg:mb-28">
                                Laissez un commentaire
                            </h3>

                            <!-- Affichage du message d'erreur -->
                            @if ($errors->has('message'))
                                <div class="bg-red-500 text-white p-4 rounded mb-4">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif

                            <!-- Formulaire de commentaire -->
                            <form id="commentForm" method="POST" action="{{ route('comments.store') }}"
                                class="overflow-hidden form-container grid grid-cols-1 gap-7 mx-auto w-full sm:w-3/4 md:w-2/4 lg:w-2/5">
                                @csrf
                                <input class="text-base" type="hidden" name="video_id"
                                    value="{{ $video ? $video->id : '' }}">
                                <div class="md:col-span-3">
                                    <textarea
                                        class="text-base rounded-lg block border-base w-full px-4 py-2 leading-tight text-primary transition-all duration-150 placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-[#ee1a3b] h-24 resize-none"
                                        name="content" id="post-comment" placeholder="Votre commentaire"></textarea>
                                </div>

                                <div class="md:col-span-3">
                                    <input
                                        class="text-base bg-[#ee1a3b] rounded-md hover:bg-opacity-90 font-bold text-white text-lg tracking-tight py-5 leading-normal mt-4 md:mt-8
                                        hover:cursor-pointer hover:bg-[#d0172f] transition-all duration-200 ease-in-out
                                        transform hover:-translate-y-1 block w-full"
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
                                transition: opacity 0.5s ease-in-out;
                            }




                        </style>
                        <script>
                            const banners = [
                                'https://dcassetcdn.com/design_img/4083410/676145/34104483/3tws05nzkc3spevxtp1nmxw4a7_thumbnail.png',
                                'https://www.strategies.fr/sites/default/files/styles/compaign_page/public/agency/47DEQpj8HBSa-_TImW-5JCeuQeRkm5NMpJWZG3hSuFU/MERCEDES-bann-300x600.gif?itok=QlNmjlWy&m=1685609069',
                                'https://www.dentalespace.com/praticien/wp-content/uploads/2020/11/BANNIERE-DENTAL-ESPACE-300-x-600-SANTE.gif'
                            ];

                            let currentBannerIndex = 0;
                            const verticalBanner = document.querySelector('.banner-vertical img');
                            const horizontalBanner = document.querySelector('.block.sm\\:hidden img');

                            // Initialiser les images avec la première bannière
                            verticalBanner.src = banners[currentBannerIndex];
                            horizontalBanner.src = banners[currentBannerIndex];

                            function slideBanner() {
                                // Début du fondu
                                verticalBanner.style.opacity = '0';
                                horizontalBanner.style.opacity = '0';

                                setTimeout(() => {
                                    // Change l'image
                                    currentBannerIndex = (currentBannerIndex + 1) % banners.length;
                                    verticalBanner.src = banners[currentBannerIndex];
                                    horizontalBanner.src = banners[currentBannerIndex];

                                    // Réinitialiser l'opacité
                                    verticalBanner.style.opacity = '1';
                                    horizontalBanner.style.opacity = '1';
                                }, 500);
                            }

                            // Ajoute les styles initiaux
                            verticalBanner.style.transition = 'opacity 0.5s ease-in-out';
                            horizontalBanner.style.transition = 'opacity 0.5s ease-in-out';

                            // Lance le slideshow
                            setInterval(slideBanner, 5000);
                        </script>

                        <!-- Modal pour se connecter -->
                        <div id="loginModal" class="fixed z-10 inset-0 overflow-y-auto hidden"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="fixed inset-0 bg-black opacity-30"></div>
                                <div
                                    class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                    <div class="p-6">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Connexion requise
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Vous devez être connecté pour interagir. Veuillez vous connecter pour continuer.
                                        </p>
                                        <div class="mt-4">
                                            <a href="{{ route('login_page', ['redirect' => request()->url()]) }}"
                                                class="bg-[#ee1a3b] text-white py-2 px-4 rounded-md hover:bg-opacity-90">
                                                Connectez-vous
                                            </a>
                                            <button onclick="closeModal()"
                                                class="ml-4 bg-black text-white py-2 px-4 rounded-md hover:bg-gray-700">Fermez</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.getElementById('commentForm').onsubmit = function(event) {
                                event.preventDefault(); // Empêche l'envoi du formulaire par défaut
                                @if (!Auth::check()) // Vérifie si l'utilisateur n'est pas connecté
                                    document.getElementById('loginModal').classList.remove('hidden'); // Affiche le modal
                                @else
                                    this.submit(); // Soumet le formulaire si l'utilisateur est connecté
                                @endif
                            };

                            function closeModal() {
                                document.getElementById('loginModal').classList.add('hidden');
                            }
                        </script>
                        <br><br>


                        <ol class="text-lg leading-8 tracking-tight mt-30">
                            @foreach ($video->comments ?? [] as $comment)
                                @if (!$comment->parent_comment_id)
                                    <li class="mb-8 lg:mb-12" id="comment-{{ $comment->id }}">
                                        <div class="flex gap-x-4">
                                            <figure class="shrink-0">
                                                <img src="{{ asset('mygp-images/logo-gp.png') }}" alt="Logo"
                                                    class="w-10 h-10 rounded-full">
                                            </figure>
                                            <div class="flex-grow">
                                                <div class="flex items-baseline gap-2 mb-1">
                                                    <h5 class="text-sm font-semibold text-primary dark:text-white">
                                                        {{ $comment->user ? $comment->user->fullName() : 'Utilisateur supprimé' }}

                                                    </h5>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $comment->created_at->locale('fr')->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <div class="text-sm text-gray-900 dark:text-gray-200 mb-2 dark:text-white">
                                                    {{ $comment->content }}
                                                </div>

                                                <div class="flex items-center gap-4 mb-3">
                                                    <button data-comment-id="{{ $comment->id }}"
                                                        @php($liked = $comment->hasBeenLikedByUser()) @class([
                                                            'like-button flex items-center gap-1 text-sm dark:text-gray-400 hover:text-gray-900' => true,
                                                            'liked' => $liked,
                                                            'text-gray-600' => !$liked,
                                                        ])>
                                                        <svg class="w-4 h-4 dark:text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                                            </path>
                                                        </svg>
                                                        <span
                                                            class="like-count dark:text-white">{{ $comment->likes->count() }}</span>
                                                    </button>
                                                    <a href="#"
                                                        class="dark:text-white reply-button text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900"
                                                        data-comment-id="{{ $comment->id }}">
                                                        RÉPONDEZ
                                                    </a>
                                                </div>

                                                <!-- Formulaire de réponse -->
                                                @auth
                                                    <div class="reply-form hidden mb-4" id="reply-form-{{ $comment->id }}">
                                                        <div class="flex gap-4">
                                                            <img src="{{ asset('mygp-images/logo-gp.png') }}" alt="Avatar"
                                                                class="w-8 h-8 rounded-full">
                                                            <div class="flex-grow form-container">
                                                                <textarea
                                                                    class="text-base form-control w-full border rounded-lg p-3 text-sm resize-none focus:ring-0 focus:ring-[#ee1a3b] focus:border-[#ee1a3b] focus:outline-none"
                                                                    rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                                                <div class="flex justify-end gap-2 mt-2">
                                                                    <button
                                                                        class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annulez</button>
                                                                    <button
                                                                        class="submit-reply-button px-4 py-2 text-sm font-medium text-white bg-[#ee1a3b] rounded-lg hover:bg-red-700"
                                                                        data-comment-id="{{ $comment->id }}">
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
                                                @endauth

                                                <!-- Réponses -->
                                                <div class="replies space-y-4">
                                                    @foreach ($comment->replies as $reply)
                                                        <div
                                                            class="flex gap-4 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg flex form-container">
                                                            <img src="{{ $reply->user->profile_image ?? asset('mygp-images/logo-gp.png') }}"
                                                                alt="Avatar" class="w-8 h-8 rounded-full">
                                                            <div class="flex-grow">
                                                                <div class="flex items-baseline gap-2 mb-1">
                                                                    <span
                                                                        class="text-sm font-medium text-gray-900 dark:text-white">
                                                                        {{ isset($reply->user) ? $reply->user->fullName() : 'Utilisateur Anonyme' }}

                                                                    </span>
                                                                    <span class="text-xs text-gray-500">
                                                                        {{ $reply->created_at->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                                <p class="text-sm text-gray-800 dark:text-gray-200 mb-2">
                                                                    {{ $reply->content }}
                                                                </p>
                                                                <div class="flex items-center gap-4">
                                                                    <button @php($liked = $reply->hasBeenLikedByUser())
                                                                        @class([
                                                                            'like-button flex items-center gap-1 text-sm dark:text-gray-400 hover:text-gray-900' => true,
                                                                            'liked' => $liked,
                                                                            'text-gray-600' => !$liked,
                                                                        ])
                                                                        data-comment-id="{{ $reply->id }}">
                                                                        <svg class="w-4 h-4" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                                                            </path>
                                                                        </svg>
                                                                        <span
                                                                            class="like-count">{{ $reply->likes->count() }}</span>
                                                                    </button>
                                                                    <a href="#"
                                                                        class="reply-button text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900"
                                                                        data-comment-id="{{ $reply->id }}">
                                                                        RÉPONDEZ
                                                                    </a>
                                                                </div>

                                                                <!-- Formulaire de réponse pour les réponses -->
                                                                @auth
                                                                    <div class="overflow-hidden reply-form hidden mt-4"
                                                                        id="reply-form-{{ $reply->id }}">
                                                                        <div class="flex gap-4">
                                                                            <img src="{{ asset('mygp-images/logo-gp.png') }}"
                                                                                alt="Avatar" class="w-8 h-8 rounded-full">
                                                                            <div class="flex-grow">
                                                                                <textarea
                                                                                    class="text-base form-control w-full border rounded-lg p-3 text-sm resize-none focus:ring-0 focus:ring-[#ee1a3b] focus:border-[#ee1a3b] focus:outline-none"
                                                                                    rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                                                                <div class="flex justify-end gap-2 mt-2">
                                                                                    <button
                                                                                        class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annulez</button>
                                                                                    <button
                                                                                        class="submit-reply-button px-4 py-2 text-sm font-medium text-white bg-[#ee1a3b] rounded-lg hover:bg-red-700"
                                                                                        data-comment-id="{{ $comment->id }}">
                                                                                        Répondez
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endauth

                                                                @guest
                                                                    <div class="hidden mt-4 text-sm"
                                                                        id="reply-form-{{ $reply->id }}">
                                                                        <p class="text-gray-600">Vous devez être connecté pour
                                                                            répondre.</p>
                                                                        <a href="{{ route('login_page') }}"
                                                                            class="text-[#ee1a3b] font-medium hover:underline">
                                                                            Connectez-vous</a>
                                                                    </div>
                                                                @endguest
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
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
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="{{ asset('assets/backoffice/js/core/jquery-3.7.1.min.js') }}"></script>

        <script src="https://cdn.kkiapay.me/k.js"></script>
        <script>
            @if (!App\Repositories\UserVideoRepository::canWatchPremiumVideo($video->id))
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
                            "https://www.youtube.com/embed/{{ $video->youtube_id ?? 'default_video_id' }}?autoplay=1&controls=1";
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
            @endif


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

            document.addEventListener('DOMContentLoaded', function() {
                @auth
                const isLiked = {{ $video && $video->isLikedBy(auth()->user()) ? 'true' : 'false' }};
            @else
                const isLiked = false;
            @endauth

            const videoId = {{ isset($video) ? $video->id : 'null' }};

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
                    url: "{{ route('videos.incrementViews', ['videoId' => $video->id]) }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {}
                });
            }, 20000);
        </script>
        <script>
            function copyVideoLink() {
                const url = '{{ request()->url() }}';
                navigator.clipboard.writeText(url).then(() => {
                    alert("Le lien de la vidéo a été copié dans le presse-papiers.");
                });
            }

            function shareOnFacebook() {
                const url = encodeURIComponent('{{ request()->url() }}');
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
            }

            function shareOnWhatsApp() {
                const url = encodeURIComponent('{{ request()->url() }}');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://api.whatsapp.com/send?text=${text} ${url}`, '_blank');
            }

            function shareOnInstagram() {
                const url = '{{ request()->url() }}';
                alert("Pour partager sur Instagram, copiez ce lien et collez-le dans votre message Instagram : \n" + url);
            }

            function shareOnX() {
                const url = encodeURIComponent('{{ request()->url() }}');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://twitter.com/share?url=${url}&text=${text}`, '_blank');
            }

            function shareOnSnapchat() {
                const url = encodeURIComponent('{{ request()->url() }}');
                const text = encodeURIComponent("Découvrez cette vidéo captivante !");
                window.open(`https://www.snapchat.com/share/video?url=${url}&text=${text}`, '_blank');
            }

            function shareOnYouTube() {
                const url = '{{ request()->url() }}';
                alert("Pour partager cette vidéo sur YouTube, copiez le lien et collez-le dans une publication ou un commentaire : \n" +
                    url);
            }

            function shareOnTikTok() {
                const url = '{{ request()->url() }}';
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
            class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center hidden z-50">
            <div class="relative p-8 bg-white w-full max-w-sm m-auto flex-col flex rounded-lg shadow-lg md:px-6 px-4">
                <button id="closeModalX" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-16 h-16 text-red-500 mx-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    @if (isset($video) && $video->premium_video)
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 md:text-3xl md:mb-6 lg:text-3xl">
                            Abonnement Premium Requis !
                        </h3>
                        <p class="text-gray-600 mb-8 md:text-lg md:mb-10 lg:text-xl">
                            Abonnez-vous ou optez pour un paiement unique de {{ $video->single_price }} XOF pour accéder à
                            cette vidéo exclusive.
                        </p>

                        <div class="flex justify-center space-x-4">
                            @auth
                                <kkiapay-widget id="payVideoButton" amount="{{ $video->single_price }}"
                                    key="{{ env('KKIAPAY_PUBLIC_API_KEY') }}" url="{{ asset('mygp-images/LogoGP.png') }}"
                                    position="center" data="user_id:{{ auth()->user()->id }}&video_id:{{ $video->id }}"
                                    callback="{{ route('status-payment') }}" theme="#ee1a3b">
                                </kkiapay-widget>
                            @endauth

                            @guest
                                <button id="payVideoButton" onclick="window.location.href='{{ route('login_page') }}'"
                                    class="bg-[#222121] text-white font-bold text-xs sm:text-sm md:text-base lg:text-lg px-3 sm:px-4 md:px-6 py-2 sm:py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-0 sm:mr-2 mb-2 sm:mb-0 w-full sm:w-auto transition-all ease-linear duration-150">
                                    Connectez-vous et payez
                                </button>
                            @endguest

                            <button id="subscribeButton" onclick="window.location.href='{{ route('sub-add') }}'"
                                class="bg-[#ee1a3b] text-white font-bold text-xs sm:text-sm md:text-base lg:text-lg px-3 sm:px-5 py-2 sm:py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-0 sm:mr-2 mb-2 sm:mb-0 w-full sm:w-auto transition-all ease-linear duration-150">
                                Abonnez-vous
                            </button>
                        </div>
                    @endif
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
                @if (!Auth::check())
                    document.getElementById('loginModal').classList.remove('hidden');
                    return;
                @endif
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
@endsection
