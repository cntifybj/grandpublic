@extends('layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="min-h-screen">
        <main id="main-content" class="grow lg:pt-0">
            <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20 bg-[#ee1a3b]">
                <div class="container">
                    <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl text-white">CONTACT
                    </h1>
                    <ol
                        class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                        <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                        <li class="px-[10px]"></li>
                    </ol>
                </div>
            </div>
            <!-- <div class="overflow-hidden bg-white dark:bg-gray-900">   -->
            <div class="bg-white dark:bg-gray-900">
                <div class="pt-14 pb-24 lg:pb-52 lg:pt-40">
                    <div class="container">
                        <div
                            class="overflow-hidden relative -mt-20 mb-14 grid grid-cols-12 gap-x-5 gap-y-10 md:gap-x-[30px] bg-white dark:bg-gray-800 shadow-3xl lg:-mt-[200px] lg:mb-40 py-10 md:py-20 lg:py-22 xl:py-24 isolate">
                            <div class="col-start-2 col-end-12 md:col-end-6 md:pb-16">
                                <h2
                                    class="font-bold text-primary dark:text-white text-2xl md:text-3xl md:leading-none mb-4 lg:text-4xl xl:text-5xl leading-none tracking-tight xl:tracking-tight xl:mb-10">
                                    Une idée en tête
                                    <span class="text-[#ee1a3b]">tête</span>?<br>
                                    Parlons-en !
                                </h2>
                                <div class="lg:text-lg tracking-tighter lg:leading-8 lg:pr-10 ">
                                    <p class="text-gray-500">Que ce soit une suggestion, une question, ou simplement un
                                        avis, nous sommes à votre écoute. Envoyez-nous un message et partagez vos idées.
                                        Nous sommes impatients de discuter avec vous !</p>
                                </div>
                            </div>
                            <style>
                                input,
                                textarea,
                                form {

                                    overflow-x: hidden;
                                }

                                textarea:focus {
                                    border-width: 1px;
                                    border-color: #ee1a3b;
                                    box-shadow: 0 0 0 1px #ee1a3b;
                                    outline: none;
                                }
                            </style>
                            <div class="overflow-hidden col-start-2 md:col-start-6 col-end-12">
                                <form id="contactForm" class="overflow-x-hidden grid grid-cols-1 md:grid-cols-2 gap-7"
                                    method="POST" action="{{ route('user_message.store') }}">
                                    @csrf

                                    <div class="custom-form-input md:col-span-full lg:col-span-1">
                                        <input
                                            class="border-gray-300 text-base rounded-lg border-base bg-[length:14px_14px,_46px_46px] bg-[position:right_26px_center,_right_10px_center] bg-no-repeat font-bold leading-8 tracking-tight text-primary transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-[#ee1a3b] w-full px-7 py-4"
                                            type="text" name="name" id="name" value="" placeholder="Nom"
                                            required>
                                           
                                        </div>
                                        <div class="custom-form-input md:col-span-full lg:col-span-1">
                                            <input
                                                class="border-gray-300 text-base rounded-lg border-base bg-[length:14px_14px,_46px_46px] bg-[position:right_26px_center,_right_10px_center] bg-no-repeat font-bold leading-8 tracking-tight text-primary transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-[#ee1a3b] w-full px-7 py-4"
                                                type="email" name="email" id="email" value=""
                                                placeholder="Email" required>
                
                                            </div>
                                            <div class="custom-form-input col-span-full">
                                                <textarea
                                                    class="rounded-lg block border-base w-full px-7 py-4 leading-8 tracking-tight text-primary transition-all duration-150 placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-[#ee1a3b] h-40 md:h-52"
                                                    name="message" id="message" placeholder="Entrez votre message" required></textarea>
                                                </div>
                                                <div class="col-span-full">
                                                    <input
                                                        class="border-gray-300 text-base bg-[#ee1a3b] rounded-md hover:bg-opacity-90 font-bold text-white text-lg tracking-tight py-5 leading-normal mt-4 md:mt-8 
                    hover:cursor-pointer hover:bg-[#d0172f] transition-all duration-200 ease-in-out 
                    transform hover:-translate-y-1 block w-full"
                                                        type="submit" value="Envoyez">
                                                </div>
                                </form>
                            </div>

                            <img class="w-27 h-24 hidden pointer-events-none md:block absolute -z-10 left-0 bottom-0"
                                src="mygp-images/logo-gp.png" alt="logo gp">
                        </div>
                        <!-- Ajoutez ceci juste avant la fermeture de la balise </div> qui contient le formulaire -->

                        <div id="modern-notification" class="modern-notification">
                            <div class="notification-wrapper">
                                <div class="notification-icon">
                                    <svg viewBox="0 0 24 24" width="32" height="32">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"
                                            fill="#fff" />
                                    </svg>
                                </div>
                                <div class="notification-content">
                                    <p class="notification-title">Succès!</p>
                                    <p class="notification-message">Votre message a été envoyé avec succès</p>
                                </div>
                            </div>
                        </div>

                        <style>
                            input[type="submit"] {
                                display: block;
                                visibility: visible;
                                opacity: 100;
                                background-color: #ee1a3b;
                            }

                            .modern-notification {
                                position: fixed;
                                top: 30px;
                                right: -400px;
                                background: linear-gradient(45deg, #00b09b, #96c93d);
                                padding: 4px;
                                border-radius: 12px;
                                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                                transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                                opacity: 0;
                                z-index: 9999;
                            }

                            .modern-notification.show {
                                right: 30px;
                                opacity: 1;
                            }

                            .notification-wrapper {
                                display: flex;
                                align-items: center;
                                gap: 15px;
                                background: rgba(255, 255, 255, 0.1);
                                padding: 15px 25px;
                                border-radius: 8px;
                                backdrop-filter: blur(10px);
                            }

                            .notification-icon {
                                background: rgba(255, 255, 255, 0.2);
                                border-radius: 50%;
                                width: 45px;
                                height: 45px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                flex-shrink: 0;
                            }

                            .notification-content {
                                color: white;
                            }

                            .notification-title {
                                font-weight: 600;
                                font-size: 1.1rem;
                                margin: 0 0 2px 0;
                            }

                            .notification-message {
                                margin: 0;
                                font-size: 0.95rem;
                                opacity: 0.9;
                            }

                            @keyframes slideIn {
                                from {
                                    transform: translateX(100%) scale(0.8);
                                }

                                to {
                                    transform: translateX(0) scale(1);
                                }
                            }

                            @keyframes slideOut {
                                to {
                                    transform: translateX(100%) scale(0.8);
                                }
                            }
                        </style>

                        <div class="grid grid-cols-12 gap-x-6 md:gap-x-[30px] gap-y-8">
                            <div class="col-span-full sm:col-span-6 lg:col-span-4 social-section">
                                <div class="">
                                    <h3
                                        class="mb-4 text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-3.5xl font-bold tracking-tight text-primary dark:text-white lg:mb-8 xl:mb-14 xl:tracking-tighter">
                                        Réseaux sociaux</h3>
                                    <div class="icon-container">
                                        <ul class="flex flex-wrap gap-2 sm:gap-3">
                                            <!-- YouTube -->
                                            <li>
                                                <a href="https://www.youtube.com/@Grandpublic2024" title="YouTube"
                                                    class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-youtube"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- Facebook -->
                                            <li>
                                                <a href="https://www.facebook.com/grandpublicofficiel/" title="Facebook"
                                                    class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- Instagram -->
                                            <li>
                                                <a href="https://www.instagram.com/grandpublic1/" title="Instagram"
                                                    class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-instagram"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- X (Twitter) -->
                                            <li>
                                                <a href="https://x.com/grandpublictv?lang=fr" title="X" class="group">
                                                    <span class="icon-circle">
                                                        <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24"
                                                            fill="currentColor">
                                                            <path
                                                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>

                                            <!-- WhatsApp -->
                                            <li>
                                                <a href="#" title="WhatsApp" class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- Snapchat -->
                                            <li>
                                                <a href="" title="Snapchat" class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-snapchat"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- TikTok -->
                                            <li>
                                                <a href="https://www.tiktok.com/@grandpublic" title="TikTok"
                                                    class="group">
                                                    <span class="icon-circle">
                                                        <i class="fab fa-tiktok"></i>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>

                                        <style>
                                            @media screen and (max-width: 1024px) {
                                                .social-section {
                                                    margin-top: 1vh !important;
                                                }
                                            }

                                            .icon-circle {
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                width: 35px;
                                                height: 35px;
                                                border-radius: 50%;
                                                background-color: white;
                                                border: 1px solid #1f2937;
                                                color: #1f2937;
                                                /*transition: all 0.3s ease;*/
                                            }

                                            .dark .icon-circle {
                                                background-color: #1f2937;
                                                border-color: white;
                                                color: white;
                                            }

                                            .icon-circle i,
                                            .icon-circle svg {
                                                font-size: 16px;
                                                /**transition: color 0.3s ease;**/
                                            }

                                            .group:hover .icon-circle {

                                                border-color: #ee1a3b;
                                                color: #ee1a3b;
                                            }

                                            @media (min-width: 1023px) {
                                                .icon-circle {
                                                    width: 40px;
                                                    height: 40px;
                                                }

                                                .icon-container {
                                                    width: 100vh;
                                                }

                                                .icon-circle i,
                                                .icon-circle svg {
                                                    font-size: 18px;
                                                }
                                            }

                                            @media (prefers-color-scheme: dark) {
                                                .icon-circle {
                                                    background-color: #1f2937;
                                                    border-color: white;
                                                    color: white;
                                                }
                                            }

                                            @media screen and (max-width: 1024px) {
                                                .social-section {
                                                    margin-top: 100px !important;
                                                    /* Ajustez ou supprimez la marge */
                                                }
                                            }
                                        </style>
                                    </div>
                                @endsection


                                @section('page_js')
                                    <script src="{{ asset('assets/backoffice/js/core/jquery-3.7.1.min.js') }}"></script>
                                    <!-- JQuery Validate Plugin -->
                                    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

                                    <script>
                                        // Initialisation de la validation avec jQuery Validate
                                        $('#contactForm').validate({
                                            // Quand il y a une/plusieurs erreur(s)
                                            highlight: function(element) {
                                                $(element).closest('.custom-form-input').find('div[role="alert"]').removeClass('hidden')
                                            },
                                            // Quand il n'y a aucune erreur
                                            unhighlight: function(element) {
                                                $(element).closest('.custom-form-input').find('div[role="alert"]').addClass('hidden')
                                            },
                                            errorPlacement: function(error, element) {
                                                $(element).closest('.custom-form-input').find('div.custom-form-error').text(error
                                                    .text())
                                            },
                                            rules: {
                                                name: {
                                                    required: true,
                                                    minlength: 4,
                                                    maxlength: 100
                                                },
                                                email: {
                                                    required: true,
                                                    email: true
                                                },
                                                message: {
                                                    required: true
                                                },
                                            },
                                            messages: {
                                                name: {
                                                    required: "Veuillez entrer votre nom.",
                                                    minlength: "Veuillez entrer un nom de 4 caractères minimum.",
                                                    maxlength: "Veuillez entrer un nom de 100 caractères maximum."
                                                },
                                                email: {
                                                    required: "Veuillez entrer votre adresse email.",
                                                    email: "Veuillez entrer une adresse email valide."
                                                },
                                                message: "Veuillez entrer un message valide."
                                            },
                                            submitHandler: function(form) {

                                                $(form).find('div[role="alert"]').addClass('hidden')
                                                const formData = new FormData(form)

                                                $.ajax({
                                                    url: $(form).attr('action'), // Endpoint pour ajouter les données
                                                    type: 'POST',
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(response) {
                                                        const notification = $('#modern-notification');

                                                        // Simuler l'envoi du formulaire
                                                        setTimeout(() => {
                                                            notification.addClass('show');

                                                            // Réinitialiser le formulaire
                                                            form.reset();

                                                            // Masquer la notification
                                                            setTimeout(() => {
                                                                notification.removeClass('show');
                                                            }, 5000);
                                                        }, 500);
                                                    },
                                                    error: function(response) {
                                                        for (const [key, value] of Object.entries(response.responseJSON[
                                                                'errors'])) {
                                                            $(`span[error-input="${key}"]`).html(value.join('<br>'))
                                                                .removeClass('hidden')
                                                        }
                                                    }
                                                })
                                            }
                                        });
                                    </script>
                                @endsection
