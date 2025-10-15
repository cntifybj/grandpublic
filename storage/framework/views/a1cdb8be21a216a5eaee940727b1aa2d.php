<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php if(auth()->guard()->check()): ?>
        <main id="main-content" class="grow lg:pt-0">
            <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20">
                <div class="container">
                    <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">PAIEMENT</h1>
                    <ol
                        class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                        <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                        <li class="px-[10px]"></li>
                    </ol>
                </div>
            </div>
            </div>
            <main id="main-content" class="grow lg:pt-0 pb-14">
                <!-- Formulaire de paiement -->
                <div class="max-w-6xl mx-auto dark:text-white rounded-lg shadow-md overflow-hidden mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <!-- Détails de l'abonnement -->
                        <div class="p-6 border-b md:border-b-0 md:border-r border-gray-200">
                            <h2 class="text-2xl font-bold mb-4">Abonnement <?php echo e($subscription['name']); ?></h2>
                            <p class="text-3xl font-bold mb-4"><?php echo e($subscription['price']); ?>XOF <span
                                    class="text-sm font-normal">chaque <?php echo e($subscription['duration']); ?></span></span></p>

                            <div class="text-sm font-normal mt-7"><?php echo e($subscription['short_description']); ?></div>
                        </div>

                        <style>
                            @keyframes fadeIn {
                                from {
                                    opacity: 0;
                                }

                                to {
                                    opacity: 1;
                                }
                            }

                            @keyframes slideIn {
                                from {
                                    transform: translateY(-20px);
                                    opacity: 0;
                                }

                                to {
                                    transform: translateY(0);
                                    opacity: 1;
                                }
                            }

                            .loader {
                                border: 5px solid #f3f3f3;
                                border-top: 5px solid #db4234;
                                border-radius: 50%;
                                width: 50px;
                                height: 50px;
                                animation: spin 1s linear infinite;
                            }

                            @keyframes spin {
                                0% {
                                    transform: rotate(0deg);
                                }

                                100% {
                                    transform: rotate(360deg);
                                }
                            }

                            .success-message {
                                position: fixed;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                opacity: 0;
                                visibility: hidden;
                                color: white;
                                padding: 20px;
                                border-radius: 5px;
                                text-align: center;
                                animation: showHideMessage 10s forwards;
                            }

                            @keyframes showHideMessage {

                                0%,
                                100% {
                                    opacity: 0;
                                    visibility: hidden;
                                }

                                10%,
                                90% {
                                    opacity: 1;
                                    visibility: visible;
                                }
                            }

                            .overlay {
                                background-color: rgba(0, 0, 0, 0.5);
                                transition: opacity 0.3s ease;
                            }

                            .payment-form {
                                display: none;
                                animation: slideDown 0.3s ease-out;
                            }

                            @keyframes slideDown {
                                from {
                                    opacity: 0;
                                    transform: translateY(-10px);
                                }

                                to {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }

                            input[type="tel"]:focus,
                            input[type="email"]:focus {
                                border-width: 0.5px;
                                border-color: #ee1a3b;
                                box-shadow: 0 0 0 1px #ee1a3b;
                                outline: none;
                            }
                        </style>

                        <!-- Formulaire de paiement -->
                        <div class="p-6">
                            
                                

                                <kkiapay-widget amount="<?php echo e($subscription['price']); ?>"
                                    key="<?php echo e(env('KKIAPAY_PUBLIC_API_KEY')); ?>" url="<?php echo e(asset('mygp-images/LogoGP.png')); ?>"
                                    position="center" data="user_id:<?php echo e(auth()->user()->id); ?>&subscription_id:<?php echo e($subscription['id']); ?>"
                                    callback="<?php echo e(route('status-payment')); ?>" theme="#ee1a3b">
                                </kkiapay-widget>


                                
                            <style>
                                .payment-form {
                                    display: none;
                                    animation: slideDown 0.3s ease-out;
                                }

                                @keyframes slideDown {
                                    from {
                                        opacity: 0;
                                        transform: translateY(-10px);
                                    }

                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }
                            </style>
                            <!-- Overlay -->
                            <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

                            <!-- Loader -->
                            <div id="center-loader"
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 hidden">
                                <div class="loader"></div>
                            </div>

                            <!-- Message de succès -->
                            <div id="success-message"
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-lg shadow-xl z-50 hidden success-message"
                                style="max-width: 400px; width: 90%;">
                                <div class="text-center relative">
                                    <svg class="mx-auto h-10 w-10 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <h3 class="mt-2 text-lg font-medium text-gray-900">Paiement réussi !</h3>
                                    <p class="mt-1 text-sm text-gray-500">Merci pour votre abonnement. Vous recevrez bientôt un
                                        email de confirmation.</p>
                                    <div class="mt-4">
                                        <button type="button" onclick="goToHomePage()"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#ee1a3b] text-base font-medium text-white hover:bg-[#ee1a3b]-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                            Aller à l'accueil
                                        </button>
                                    </div>
                                    <button onclick="hideSuccessMessage()"
                                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
            </main>

            <script>
                function handlePayment(event) {
                    event.preventDefault();

                    if (getFormattedNumber() && validateEmail()) {
                        document.getElementById('phone_number').value = getFormattedNumber()
                        event.target.submit()
                    }

                    /* const overlay = document.getElementById('overlay');
                    const centerLoader = document.getElementById('center-loader');

                    overlay.classList.remove('hidden');
                    centerLoader.classList.remove('hidden');

                    setTimeout(() => {
                        centerLoader.classList.add('hidden');
                        showSuccessMessage();

                        // Supprimez le message de succès après 5 secondes
                        setTimeout(() => {
                            hideSuccessMessage();
                        }, 5000); // 5000 millisecondes (5 secondes) pour afficher le message
                    }, 2000);

                    return false; */
                }

                function showSuccessMessage() {
                    document.getElementById('success-message').classList.remove('hidden');
                }

                function hideSuccessMessage() {
                    document.getElementById('overlay').classList.add('hidden');
                    const successMessage = document.getElementById('success-message');

                    // Ajoutez une transition pour la fermeture du message
                    successMessage.classList.add('fade-out');

                    // Attendez que la transition soit terminée avant de cacher le modal
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                        document.getElementById('payment-form').reset();
                    }, 300); // 300 millisecondes pour correspondre à la durée de la transition
                }

                function goToHomePage() {
                    window.location.href = "<?php echo e(route('home')); ?>";
                }
            </script>
        </main>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
    <script src="<?php echo e(asset('assets/backoffice/js/core/jquery-3.7.1.min.js')); ?>"></script>
    <script>
        const iti = window.intlTelInput($("#phone_number")[0], {
            initialCountry: "bj", // Pays par défaut
            preferredCountries: ["tg", "ci", "ne"],
            separateDialCode: true, // Sépare l'indicatif du numéro
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js"
        })

        // Fonction pour valider le numéro
        function isValidPhoneNumber() {
            return iti.isValidNumber(); // Renvoie true si le numéro est valide
        }

        // Fonction pour récupérer le numéro formaté en E.164
        function getFormattedNumber() {
            if (isValidPhoneNumber()) {
                // Si le numéro est valide, le formater
                const formattedNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);
                return formattedNumber;
            } else {
                return null;
            }
        }


        function validateEmail() {
            const emailInput = document.getElementById('email').value;

            // Expression régulière pour valider l'email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            return emailPattern.test(emailInput)
        }
    </script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/subscription/sub-pay.blade.php ENDPATH**/ ?>