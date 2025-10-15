@if (Request::is('/'))
    <br><br>
@endif
<footer id="site-footer" class="dark">
    <div class="bg-black dark:bg-black py-12 sm:py-16 md:py-24 leading-8">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-y-12 gap-x-7">
                <div class="col-span-full md:col-span-4 lg:col-span-3">
                    <!-- Widget: Info -->
                    <div class="footer-widget">
                        <!-- Espace Newsletter -->
                        <div class="newsletter-container mb-8 w-full">
                            <p
                                class="dark:text-white text-sm text-lg sm:text-lg md:text-xxl font-bold mb-10 mt-0 text-center">
                                ABONNEZ-VOUS À VOTRE NEWSLETTER</p> <!-- Réduction de la marge supérieure -->
                            <div id="mc_embed_signup" class="overflow-hidden">
                                <form
                                    action="https://grandpublic.us12.list-manage.com/subscribe/post-json?u=a0bb4e01d6ed15c81cd26efae&amp;id=7b730dad4c&amp;c=?"
                                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                    class="validate">
                                    <div id="mc_embed_signup_scroll">
                                        <div class="mc-field-group mb-2">
                                            <input type="email" name="EMAIL"
                                                class="text-base required email w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#ee1a3b] dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                                id="mce-EMAIL" placeholder="Votre e-mail" value="">
                                        </div>
                                        <div aria-hidden="true" style="position: absolute; left: -5000px;">
                                            <input type="text" name="b_a0bb4e01d6ed15c81cd26efae_7b730dad4c"
                                                tabindex="-1" value="">
                                        </div>
                                        <div class="clear foot">
                                            <button type="button" onclick="validateForm()" id="mc-embedded-subscribe"
                                                class="bg-[#ee1a3b] text-base w-full text-white px-4 py-3 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-[#d0172f] font-semibold">
                                                <span id="button-text">Abonnez-vous</span>
                                                <span id="spinner" class="spinner" style="display: none;"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="success-message" class="success-message">Inscription réussie! Merci de
                                        votre abonnement.</div>
                                    <div id="error-message" class="error-message"></div>
                                </form>

                            </div>
                        </div>

                        <!-- Badge Mailchimp -->
                        <p style="margin: 0px auto;" class="hidden">
                            <a href="http://eepurl.com/i1MANM" title="Mailchimp - email marketing made easy and fun">
                                <span style="display: inline-block; background-color: transparent; border-radius: 4px;">
                                    <img class="refferal_badge"
                                        src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg"
                                        alt="Intuit Mailchimp"
                                        style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;">
                                </span>
                            </a>
                        </p>
                    </div>
                </div>


                <div class="col-span-full md:col-span-4">
                    <!-- Widget: Unbox Links -->
                    <div>
                        <p
                            class="dark:text-white text-sm text-lg sm:text-lg md:text-xxl font-bold mb-10 mt-0 text-start">
                            LIENS RAPIDES</p>
                        <ul class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm font-bold leading-normal">
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('portrait') }}">
                                    PORTRAIT
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('contact') }}">
                                    CONTACT
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('events') }}">
                                    EVENTS
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('sub-add') }}">
                                    PREMIUM
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('opinion') }}">
                                    OPINION
                                </a>
                            </li>

                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('mentions.legales') }}">
                                    MENTIONS LÉGALES
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('insolite') }}">
                                    INSOLITE
                                </a>
                            </li>

                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('conditions.utilisation') }}">
                                    CONDITIONS D'UTILISATION
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('about') }}">
                                    À PROPOS
                                </a>
                            </li>
                            <li>
                                <a class="transition-colors text-primary hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]"
                                    href="{{ route('politique.confidentialite') }}">
                                    POLITIQUE DE CONFIDENTIALITÉ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Widget: Unbox Links / End -->
                </div>

                <div class="col-span-full md:col-span-4">
                    <!-- Widget: Subs Live Count -->
                    <div class="flex flex-col items-center md:items-start">
                        <h5 class="mb-5 mt-[4px] font-bold leading-none">
                            <img src="{{ asset('mygp-images/logo-gp.png') }}" alt="Logo" class="h-12 mb-2">
                        </h5>
                        <p class="mb-4 text-lg leading-6 tracking-tighter dark:text-white text-center md:text-left">
                            contact@grandpublic.online
                        </p>
                        <style>
                            @-moz-document url-prefix() {
                                #site-footer {
                                    margin-top: 40px;
                                    /* Pousse le footer vers le bas de 50px sur Firefox */
                                }
                            }

                            .success-message {
                                color: green;
                                margin-top: 12px;
                                display: none;
                                padding: 16px;
                                border-radius: 8px;

                                font-weight: 600;
                                border: 1px solid #99f6e4;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                                animation: slideIn 0.3s ease-out;
                            }

                            @keyframes slideIn {
                                from {
                                    transform: translateY(-10px);
                                    opacity: 0;
                                }

                                to {
                                    transform: translateY(0);
                                    opacity: 1;
                                }
                            }

                            .error-message {
                                color: #d32f2f;
                                margin-top: 10px;
                                display: none;
                                padding: 10px;
                                border-radius: 4px;
                                font: bold;
                            }

                            .spinner {
                                display: inline-block;
                                width: 20px;
                                height: 20px;
                                border: 3px solid rgba(255, 255, 255, .3);
                                border-radius: 50%;
                                border-top-color: #fff;
                                animation: spin 1s ease-in-out infinite;
                                margin-left: 8px;
                                vertical-align: middle;
                            }

                            @keyframes spin {
                                to {
                                    transform: rotate(360deg);
                                }
                            }

                            /* Masquer uniquement le message "This field is required" */
                            div.mce_inline_error,
                            #mce-error-response {
                                display: none !important;
                            }

                            @-moz-document url-prefix() {
                                @media (max-width: 767px) {

                                    /* Ajustez la largeur maximale pour cibler les mobiles */
                                    .newsletter-container {
                                        padding-top: 50px;
                                        /* Ajustez selon la hauteur nécessaire pour Firefox mobile */
                                    }
                                }
                            }

                            input,
                            textarea,
                            form {

                                overflow-x: hidden;
                            }

                            .social-icons {
                                display: flex;
                                gap: 0.5rem;
                                flex-wrap: wrap;
                            }

                            .social-icon {
                                width: 40px;
                                height: 40px;
                                border-radius: 50%;
                                border: 2px solid white;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                /*transition: all 0.3s ease;*/

                            }


                            .social-icon i,
                            .social-icon svg {
                                font-size: 20px;
                                color: #000;
                                /*transition: all 0.3s ease;*/
                            }


                            .social-icon:hover {

                                border-color: #ee1a3b;

                            }

                            .social-icon:hover i,
                            .social-icon:hover svg {

                                border-color: #ee1a3b;
                                color: #ee1a3b;
                            }

                            /* Mode sombre */
                            @media (prefers-color-scheme: dark) {
                                .social-icon {
                                    border-color: #fff;
                                }

                                .social-icon i,
                                .social-icon svg {
                                    color: #fff;
                                }

                                .social-icon:hover {
                                    background-color: #fff;
                                }

                                .social-icon:hover i,
                                .social-icon:hover svg {
                                    color: #000;
                                }
                            }

                            @media (max-width: 640px) {
                                .social-icon {
                                    width: 35px;
                                    height: 35px;
                                }

                                .social-icon i,
                                .social-icon svg {
                                    font-size: 16px;
                                }
                            }
                        </style>

                        <div class="social-icons ">
                            <!-- YouTube -->
                            <a href="https://www.youtube.com/@Grandpublic2024" class="social-icon" aria-label="YouTube">
                                <i class="fab fa-youtube dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/grandpublicofficiel/" class="social-icon "
                                aria-label="Facebook">
                                <i class="fab fa-facebook-f dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/grandpublic1/" class="social-icon"
                                aria-label="Instagram">
                                <i class="fab fa-instagram dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>
                            <!-- X (Twitter) -->
                            <a href="https://x.com/grandpublictv?lang=fr" class="social-icon" aria-label="X">
                                <svg class="h-5 w-5  dark:text-white hover:text-[#ee1a3b]" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </a>



                            <!-- WhatsApp -->
                            <a href="#" class="social-icon" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>

                            <!-- Snapchat -->
                            <a href="" class="social-icon" aria-label="Snapchat">
                                <i class="fab fa-snapchat dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>

                            <!-- TikTok -->
                            <a href="https://www.tiktok.com/@grandpublic" class="social-icon" aria-label="TikTok">
                                <i class="fab fa-tiktok dark:text-white hover:text-[#ee1a3b]"></i>
                            </a>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-800  "></div>

    <!-- Copyright -->
    <div class="bg-gray-800 text-center text-white text-sm py-4">
        <p>&copy; Copyright {{ date('Y') }} - <a href="http://maxafrica.com" target="_blank"
                rel="noopener noreferrer">MAXAFRICA</a> - Tous droits réservés.</p>
    </div>

    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
    <script type="text/javascript">
        (function($) {
            window.fnames = new Array();
            window.ftypes = new Array();
            fnames[0] = 'EMAIL';
            ftypes[0] = 'email';
            fnames[1] = 'FNAME';
            ftypes[1] = 'text';
            fnames[2] = 'LNAME';
            ftypes[2] = 'text';
            fnames[3] = 'ADDRESS';
            ftypes[3] = 'address';
            fnames[4] = 'PHONE';
            ftypes[4] = 'phone';
            fnames[5] = 'BIRTHDAY';
            ftypes[5] = 'birthday';
        }(jQuery));
        var $mcj = jQuery.noConflict(true);
    </script>
    <script>
        function jsonp(url) {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                const callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());

                window[callbackName] = function(data) {
                    delete window[callbackName];
                    document.body.removeChild(script);
                    resolve(data);
                };

                script.src = url + (url.indexOf('?') >= 0 ? '&' : '?') + 'c=' + callbackName;
                script.onerror = () => {
                    delete window[callbackName];
                    document.body.removeChild(script);
                    reject(new Error('JSONP request failed'));
                };

                document.body.appendChild(script);
            });
        }

        async function validateForm() {
            const emailInput = document.getElementById('mce-EMAIL');
            const form = document.getElementById('mc-embedded-subscribe-form');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const buttonText = document.getElementById('button-text');
            const spinner = document.getElementById('spinner');
            const submitButton = document.getElementById('mc-embedded-subscribe');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            successMessage.style.display = 'none';
            errorMessage.style.display = 'none';

            if (!emailInput.value.trim()) {
                errorMessage.textContent = 'Le champ email est obligatoire.';
                errorMessage.style.display = 'block';
                return;
            }

            if (!emailRegex.test(emailInput.value)) {
                errorMessage.textContent = 'Format d\'adresse email non valide. Veuillez vérifier votre saisie.';
                errorMessage.style.display = 'block';
                return;
            }

            try {
                submitButton.disabled = true;
                buttonText.textContent = 'Envoi en cours...';
                spinner.style.display = 'inline-block';

                const formData = new FormData(form);
                const queryString = new URLSearchParams(formData).toString();
                const jsonpUrl = form.action + '&' + queryString;

                const response = await jsonp(jsonpUrl);

                if (response.result === 'success') {
                    successMessage.style.display = 'block';
                    emailInput.value = '';
                } else {
                    // Traduction des messages d'erreur de Mailchimp
                    let errorMsg;
                    if (response.msg.includes('already subscribed')) {
                        errorMsg = 'Cette adresse email est déjà inscrite à notre newsletter.';
                    } else if (response.msg.includes('looks fake or invalid')) {
                        errorMsg = 'Cette adresse email semble invalide. Veuillez saisir une adresse email valide.';
                    } else {
                        errorMsg = 'Une erreur est survenue. Veuillez réessayer ultérieurement.';
                    }
                    errorMessage.textContent = errorMsg;
                    errorMessage.style.display = 'block';
                }
            } catch (error) {
                errorMessage.textContent = 'Une erreur technique est survenue. Veuillez réessayer plus tard.';
                errorMessage.style.display = 'block';
            } finally {
                submitButton.disabled = false;
                buttonText.textContent = "S'abonner";
                spinner.style.display = 'none';
            }
        }
    </script>
</footer>
