<?php $__env->startSection('content'); ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <main id="main-content" class="grow lg:pt-0">
        <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20">
            <div class="container">
                <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">CONNEXION</h1>
                <ol
                    class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                    <li class="px-[10px]"><a href="_yt1-index.html"></a></li>
                    <li class="px-[10px]"></li>
                </ol>
            </div>
        </div>
        </div>
        <div class="overflow-hidden form-container col-start-2 col-end-12 py-10 md:col-end-6 md:py-20 max-w-3xl mx-auto">
            <div class="bg-white dark:bg-gray-800 border border-gray-200 p-5 rounded-md shadow-lg form-container">
                <h2 class="font-bold text-2xl text-primary dark:text-white md:text-3.5xl mb-4 tracking-tight">Connexion</h2>
                <div class="mb-8 md:mb-14 md:leading-normal md:text-lg tracking-tighter pr-2">
                    <p>Si vous n'avez pas de compte, vous pouvez
                        inscrire maintenant en quelques secondes !
                    </p>
                </div>
                <style>
                    input[type="password"]:focus,
                    input[type="email"]:focus {
                        border-width: 0.5px;
                        border-color: #ee1a3b;
                        box-shadow: 0 0 0 1px #ee1a3b;
                        outline: none;
                    }

                    input,
                    textarea,
                    form {
                        max-width: 100%;
                        overflow-x: hidden;
                    }



                    @media (max-width: 768px) {

                        input,
                        button[type="submit"] {
                            font-size: 16px;
                            /* Prevent zoom on mobile */
                            padding: 12px 16px;
                        }

                        .form-container {
                            padding: 10px;
                        }
                    }
                </style>
                <form class="flex flex-col gap-y-7" action="<?php echo e(route('do_login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="overflow-hidden">
                        <input
                            class="text-base border border-gray-300 rounded-lg w-full px-7 py-4 focus:outline-none focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white"
                            type="email" name="email" id="user-email" placeholder="Adresse e-mail" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm font-bold text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="overflow-hidden">
                        <input
                            class="text-base border border-gray-300 rounded-lg w-full px-7 py-4 focus:outline-none focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white"
                            type="password" name="password" id="user-password" placeholder="Mot de passe" required
                            autocomplete="new-password">
                        <button type="button" id="togglePassword"
                            class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 4.5C7.25 4.5 3.23 7.83 1.52 12c1.71 4.17 5.73 7.5 10.48 7.5 4.74 0 8.77-3.33 10.48-7.5C20.77 7.83 16.75 4.5 12 4.5zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm-1-4a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm font-bold text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex justify-between flex-wrap gap-y-4">
                        <div>
                            <label class="flex items-center gap-x-3" for="user-rememberme">
                                <input name="remember" id="user-rememberme" type="checkbox"
                                    class="form-checkbox h-6 w-6 text-[#ee1a3b] border-gray-300 rounded focus:ring-[#ee1a3b] dark:border-white/10 dark:bg-gray-800">
                                <span class="text-sm font-bold text-primary dark:text-white">Se rappeler de moi</span>
                            </label>
                        </div>
                        <div>
                            <a href="<?php echo e(route('password.request')); ?>"
                                class="font-bold text-primary dark:text-white text-sm hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b] transition-colors">Mot
                                de passe oublié?</a>
                        </div>
                    </div>
                    <?php echo NoCaptcha::display(); ?>

                    <div class="mt-3">
                        <input
                            class="bg-[#ee1a3b] rounded-md hover:bg-opacity-90 font-bold text-white text-lg tracking-tight py-5 leading-normal mt-4 md:mt-8
                hover:cursor-pointer hover:bg-[#d0172f] transition-all duration-200 ease-in-out
                transform hover:-translate-y-1 block w-full"
                            type="submit" value="Connectez-vous">
                    </div>

                </form>

                <!-- Partie convertie en Tailwind CSS -->
                <div class="flex flex-col space-y-4 mt-8">
                    <div class="flex justify-between items-center">
                        <div class="mb-3">
                            <h6 class="text-base">Pas de compte ? Inscrivez-vous maintenant</h6>
                        </div>
                        <div class="mb-3">
                            <a class="border-2 font-bold border-black text-white bg-black px-4 py-2 rounded-lg flex items-center
                                   hover:cursor-pointer hover:bg-[#d0172f] hover:border-none hover:bg-opacity-90 hover:shadow-md transition duration-300"
                                href="<?php echo e(route('register_page')); ?>">
                                Inscription
                            </a>


                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <a class="border border-gray-300 text-gray-700 bg-white px-4 py-2 rounded-lg w-full inline-flex justify-center items-center hover:bg-gray-50 hover:shadow-md transition duration-300"
                                href="<?php echo e(route('google.redirect')); ?>">
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                        fill="#4285F4" />
                                    <path
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                        fill="#34A853" />
                                    <path
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                        fill="#FBBC05" />
                                    <path
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                        fill="#EA4335" />
                                    <path d="M1 1h22v22H1z" fill="none" />
                                </svg>
                                Connectez-vous avec Google
                            </a>
                        </div>
                        <div class="text-center">
                            <a class="border border-gray-300 text-text-gray-700 px-4 py-2 rounded-lg w-full inline-flex justify-center items-center
    hover:bg-gray-50 hover:shadow-md transition duration-300"
                                href="<?php echo e(route('facebook.login')); ?>">
                                <svg class="w-5 h-5 mr-2 text-[#1877f2]" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                        fill="currentColor" />
                                </svg>
                                Connectez-vous avec Facebook
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordField = document.getElementById('user-password');
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);

                // Change the icon based on the current state
                this.innerHTML = type === 'password' ?
                    `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 4.5C7.25 4.5 3.23 7.83 1.52 12c1.71 4.17 5.73 7.5 10.48 7.5 4.74 0 8.77-3.33 10.48-7.5C20.77 7.83 16.75 4.5 12 4.5zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm-1-4a1 1 0 110-2 1 1 0 010 2z" />
          </svg>` // Eye icon
                    :
                    `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 4.5C7.25 4.5 3.23 7.83 1.52 12c1.71 4.17 5.73 7.5 10.48 7.5 4.74 0 8.77-3.33 10.48-7.5C20.77 7.83 16.75 4.5 12 4.5zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm-1-4a1 1 0 110-2 1 1 0 010 2z" opacity="0.5" />
          </svg>`; // Eye-off icon
            });
        </script>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
    <?php echo NoCaptcha::renderJs(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\grandpublic\resources\views/auth/login.blade.php ENDPATH**/ ?>