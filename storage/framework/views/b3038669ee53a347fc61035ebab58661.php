<?php $__env->startSection('content'); ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <style>
        .container {
            margin: 0 auto;
            padding: 0 20px;
            /* Ajouter du padding pour créer de l'espace dans la container */
        }

        .about-section {
            font-family: "Gotham";
            padding: 0;
            max-width: 100%;
            /* S'assurer que la section occupe toute la largeur */
        }

        .about-flex-row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: flex-start;
            margin: 0;
            /* Supprimer les marges */
            padding: 0;
            /* Supprimer le padding */
        }

        .about-flex-col {
            flex: 1;
            min-width: 300px;
        }

        .about-section h2 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .about-subtitle {
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .about-section p {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .about-image-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-image {
            width: 100%;
            height: auto;
            /* Pour garantir le respect du ratio de l'image */
            max-width: 100%;
            /* S'assure que l'image ne dépasse pas la largeur de son conteneur */
            max-height: 100vh;
            /* Limite la hauteur de l'image à la hauteur de la fenêtre */
            object-fit: contain;
            /* Maintient l'image entière dans le conteneur sans la déformer */
            border-radius: 8px;
            /* Vous pouvez ajuster la valeur selon vos préférences */
        }

        /* Réduction de la hauteur de l'image pour les grands écrans */
        @media (min-width: 1024px) {
            .about-image-container {
                height: 620px;
                width: 600px;
            }

            .about-image-container img {
                height: 100%;
            }
        }


        @media (max-width: 768px) {
            .about-flex-row {
                flex-direction: column;
                /* Passer en colonne pour les petits écrans */
            }

            .about-image-container {
                order: -1;
                /* L'image en premier sur mobile */
                margin-bottom: 20px;
            }

            .about-section h2 {
                font-size: 2rem;
            }
        }
    </style>
    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20"> <!-- Taille augmentée légèrement -->
            <div class="container">
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">À PROPOS</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <br>
        <div class="pt-14 pb-24 lg:pb-52 lg:pt-10">
            <div class="container">
                <section class="about-section">
                    <div class="about-flex-row">
                        <div class="about-flex-col dark:text-white">
                            <hgroup class="mb-6">
                                <h2 class="text-2xl md:text-3xl font-semibold mb-2 dark:text-white">Bienvenue à tous,<h2>
                                        <p class="about-subtitle text-sm dark:text-white">Grandpublic, votre plateforme internet 100% vidéo, fait
                                            son retour avec une refonte totale de son contenu, entièrement orienté vers VOUS
                                            :
                                            <br>Au menu, 4 grandes rubriques :
                                        </p>
                            </hgroup>
                            <div class="space-y-4 text-sm">
                                <p><span class="font-bold">PORTRAIT :</span>
                                    Rencontrez des personnes fascinantes et découvrez leurs parcours inspirants
                                </p>
                                <p><span class="font-bold">EVENTS :</span>
                                    Transportez-vous au cœur des grands évènements comme si vous y étiez
                                </p>
                                <p><span class="font-bold">OPINION :</span>
                                    Partagez des avis et des réflexions sur les questions d’actualité
                                </p>
                                <p><span class="font-bold">INSOLITE :</span>
                                    Vivez des moments extraordinaires à travers des témoignages hors du commun.
                                </p>

                                <p>Grand Public, c'est aussi une application mobile innovante, qui allie des contenus vidéo
                                    captivants et des interactions sociales uniques.
                                    <br>
                                    Dans my GP, votre réseau social sur GRAND PUBLIC, retrouvez :

                                </p>
                                <p><span class="font-bold">CHAT :</span>
                                    pour discuter en communauté sur des sujets d'intérêts
                                </p>
                                <p><span class="font-bold">BIZZ :</span>
                                    pour partager des annonces de particulier à particulier
                                </p>
                                <p><span class="font-bold">DATING :</span>
                                    pour rencontrer votre âme sœur et vivre de grands moments de bonheur.
                                </p>
                                <p>Rendez-vous sur <a href="<?php echo e(env('APP_URL')); ?>"
                                        class="text-blue-600 hover:underline">grandpublic.online.</a></p>

                                <p class="font-bold dark:text-white">GRAND PUBLIC, PARTAGEONS LES GRANDS MOMENTS !</p>
                            </div>
                        </div>
                        <div class="about-flex-col">
                            <div class="about-image-container">
                                <img src="mygp-images/pageAbout.jpg" alt="grandpublic logo" class="about-image">
                            </div>
                        </div>
                    </div>
                </section>
                <br>
                <br>
                <br><br><br>
                <section class="mission-section" style="margin-bottom: 0; padding-bottom: 0;">
                    <div class="grid grid-cols-12 gap-x-5 gap-y-10 md:gap-x-6 lg:gap-x-[30px]">
                        <div class="col-span-full">
                            <hgroup class="flex flex-col-reverse gap-y-2 md:gap-y-3 mb-6 md:mb-28 dark:text-white"
                                style="margin-bottom: 0;">
                                <p style="margin-bottom: 0;" class="text-sm">Notre ambition est de créer une plateforme où
                                    les histoires authentiques et les idées innovantes se rencontrent. À travers nos vidéos
                                    exclusives, nous voulons inspirer, informer et engager notre audience en mettant en
                                    lumière des parcours de vie uniques, des opinions diversifiées, et des expériences
                                    enrichissantes.
                                </p>
                                <p style="margin-bottom: 0;" class="text-sm">Nous croyons au pouvoir du partage et à l’importance de donner
                                    une voix à des récits qui méritent d’être entendus. Notre mission est de vous offrir un
                                    accès privilégié à des contenus qui suscitent la réflexion, éveillent les passions, et
                                    ouvrent de nouvelles perspectives.</p>
                                <h2 class="text-2xl font-semibold leading-none text-primary dark:text-white md:text-3xl lg:text-4xl lg:tracking-tighter xl:text-5xl"
                                    style="margin-bottom: 0;">
                                    Notre mission chez Grand Public
                                </h2>
                            </hgroup>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <style>
            /* Réduction de l'espace en bas pour tous les écrans */
            .mission-section,
            .mission-section>div,
            .mission-section hgroup,
            .mission-section p:last-child {
                margin-bottom: 0 !important;
                padding-bottom: 0 !important;
            }

            /* Ciblage des écrans larges pour une réduction supplémentaire */
            @media (min-width: 1024px) {
                .mission-section {
                    margin-bottom: -50px !important;
                    /* Ajuste ici pour réduire encore l’espace */
                    padding-bottom: -50px !important;
                }

                .mission-section hgroup {
                    margin-bottom: -50px !important;
                }
            }
        </style>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/pages/about.blade.php ENDPATH**/ ?>