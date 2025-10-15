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
            <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">VOTRE COMPTE</h1>
            <ol
                class="relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
                <li class="px-[10px]"><a href="#"></a></li>
                <li class="px-[10px]"></li>
            </ol>
        </div>
    </div>
    </div>
 <br>
 <br>
 <br>
 <br>
 <style>
    .hhidden {
        display: none;
    }

    .text-primary {
        color: #1a202c;
    }

    .hover\:bg-[#ee1a3b]-dark:hover {
        background-color: #3a7cbd;
    }

    .transition-smooth {
        transition: all 0.3s ease;
    }

    .shadow-custom {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .card-hover:hover {
        transform: translateY(-5px);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
</style>

 <section id="main-content" class="grow lg:pt-0">
    <section class="pt-14 pb-24 lg:pb-52 lg:pt-35">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-12 gap-y-12 md:gap-x-6 lg:gap-x-7.5 content-start">

                <!-- Sidebar avec informations utilisateur -->
                <aside class="col-span-full md:col-span-4">
                    <div class="sticky lg:top-8 xl:top-10 bg-white dark:bg-gray-800 shadow-custom rounded-lg p-6 transition-smooth card-hover">
                        <div class="mb-6 text-center">
                            <img src="https://st3.depositphotos.com/6672868/14595/v/380/depositphotos_145959903-stock-illustration-user-profile-symbol.jpg" alt="Photo de profil de James Spiegel" class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-[#ee1a3b]">
                            <h2 class="mb-1 text-2xl font-bold text-primary dark:text-white"><?php echo e(Auth::user()->fullName()); ?></h2>
                        </div>
                        <na class="py-1">
                            <ul class="flex flex-col gap-y-4 font-bold leading-tight lg:gap-y-6 lg:text-lg">
                                <li>
                                    <a class="flex items-center text-lg transition-all text-primary opacity-100 hover:text-[#ee1a3b] dark:text-white dark:hover:text-[#ee1a3b]" href="#info" onclick="showSection('info')">
                                        <i class="fas fa-user-circle mr-2"></i> Informations personnelles
                                    </a>
                                </li>
                                <li>
                                    <a class="hidden flex items-center text-lg transition-all opacity-60 hover:opacity-100 hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]" href="#videos" onclick="showSection('videos')">
                                        <i class="fas fa-video mr-2"></i> Vidéos payées
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center text-lg transition-all opacity-60 hover:opacity-100 hover:text-[#ee1a3b] dark:hover:text-[#ee1a3b]" href="#form" onclick="showSection('form')">
                                        <i class="fas fa-edit mr-2"></i> Modifiez le profil
                                    </a>
                                </li>
                            </ul>
                        </na>
                    </div>
                </aside>
<style>
     input[type="text"]:focus,
     input[type="email"]:focus,
        input[type="password"]:focus {
            border-width: 0.5px;
            border-color: #ee1a3b;
            box-shadow: 0 0 0 1px #ee1a3b;
            outline: none;
        }
</style>
                <!-- Contenu Principal -->
                <div class="col-span-full md:col-span-8">
                    <h2 class="hidden mb-8 text-3xl font-bold tracking-tight text-primary dark:text-white">Votre profil</h2>
                    <div id="content-area" class="bg-white dark:bg-gray-800 shadow-custom rounded-lg p-8 transition-smooth">
                     <!-- Section Informations Personnelles -->
                     <div id="info" class="section-content hhidden fade-in">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold mb-6 text-[#ee1a3b]">
                            Vos informations personnelles
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <p class="font-semibold mb-2">Nom :</p>
                                <p><?php echo e(Auth::user()->fullName()); ?></p> <!-- Affichage du nom de l'utilisateur -->
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold mb-2">Email :</p>
                                <p><?php echo e(Auth::user()->email); ?></p> <!-- Affichage de l'email de l'utilisateur -->
                            </div>
                        
                            <div class="hidden">
                                <p class="font-semibold mb-2">Statut de compte :</p>
                                <p><span class="bg-[#ee1a3b] text-white px-2 py-1 rounded-lg text-sm"></span></p>
                            </div>
                            <div>
                                <p class="font-semibold mb-2">Date d'inscription :</p>
                                <p><?php echo e(\Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('d F Y')); ?></p>
                                <!-- Date d'inscription -->
                            </div>
                        </div>
                    </div>

                        <!-- Section Vidéos Payées -->
                        <div id="videos" class="hidden section-content hhidden fade-in">
                            <h3 class="text-2xl font-bold mb-6 text-[#ee1a3b]">Vidéos payées</h3>
                            <div class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <img src="https://via.placeholder.com/300x200" alt="Miniature de la vidéo" class="w-full h-40 object-cover rounded-lg mb-4">
                                    <h4 class="font-bold mb-2">Introduction à la programmation</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Achetée le 20 mai 2023</p>
                                </div>
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <img src="https://via.placeholder.com/300x200" alt="Miniature de la vidéo" class="w-full h-40 object-cover rounded-lg mb-4">
                                    <h4 class="font-bold mb-2">Design UX avancé</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Achetée le 1 juin 2023</p>
                                </div>
                            </div>
                        </div>

                        <!-- Formulaire de Profil -->
                        <div id="form" class="section-content hhidden fade-in">
                            <h3 class="text-2xl font-bold mb-6 text-[#ee1a3b]">Modifiez le profil</h3>
                            <form class="grid grid-cols-6 gap-x-7 gap-y-7 md:gap-x-7 lg:gap-x-[30px]" action="<?php echo e(route('profile.update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                
                                <div class="col-span-full md:col-span-3">
                                    <label for="user-first-name" class="block mb-2 font-semibold">Nom </label>
                                    <input class="border border-gray-300 bg-white dark:bg-gray-800 text-primary dark:text-white rounded-md w-full px-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 placeholder-gray-500" type="text" name="first_name" id="user-first-name" value="<?php echo e(Auth::user()->first_name); ?>" required>
                                </div>
                                <div class="col-span-full md:col-span-3">
                                    <label for="user-last-name" class="block mb-2 font-semibold">Prénom</label>
                                    <input class="border border-gray-300 bg-white dark:bg-gray-800 text-primary dark:text-white rounded-md w-full px-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 placeholder-gray-500" type="text" name="last_name" id="user-last-name" value="<?php echo e(Auth::user()->last_name); ?>" required>
                                </div>

                                <div class="col-span-full md:col-span-3">
                                    <label for="user-email" class="block mb-2 font-semibold">Email</label>
                                    <input class="border border-gray-300 bg-white dark:bg-gray-800 text-primary dark:text-white rounded-md w-full px-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 placeholder-gray-500" type="email" name="email" id="user-email" value="<?php echo e(Auth::user()->email); ?>" required>
                                </div>
                                
                                <div class="col-span-full md:col-span-3">
                                    <label for="user-change-password" class="block mb-2 font-semibold">Nouveau mot de passe</label>
                                    <input class="border border-gray-300 bg-white dark:bg-gray-800 text-primary dark:text-white rounded-md w-full px-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 placeholder-gray-500" type="password" name="password" id="user-change-password" placeholder="••••••••">
                                </div>
                                <div class="col-span-full md:col-span-3">
                                    <label for="user-repeat-password" class="block mb-2 font-semibold">Confirmez le mot de passe</label>
                                    <input class="border border-gray-300 bg-white dark:bg-gray-800 text-primary dark:text-white rounded-md w-full px-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 placeholder-gray-500" type="password" name="password_confirmation" id="user-repeat-password" placeholder="••••••••">
                                </div>
                                <div class="col-span-full pt-8">
                                    <button class="block w-full bg-[#ee1a3b] py-4 text-lg font-bold leading-normal text-white transition-colors hover:bg-[#ee1a3b]-dark rounded-md" type="submit">
                                        Enregistrez les modifications
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showSection(section) {
                const sections = document.querySelectorAll('.section-content');
                sections.forEach(s => {
                    s.classList.add('hhidden');
                    s.classList.remove('fade-in');
                });
        
                const selectedSection = document.getElementById(section);
                if (selectedSection) {
                    selectedSection.classList.remove('hhidden');
                    setTimeout(() => {
                        selectedSection.classList.add('fade-in');
                    }, 30);
        
                    // Commenté pour ne pas mettre à jour l'URL
                    // history.pushState(null, '', `#${section}`);
        
                    // Update active link
                    const links = document.querySelectorAll('na a');
                    links.forEach(link => {
                        link.classList.remove('text-[#ee1a3b]', 'opacity-100');
                        link.classList.add('opacity-60');
                    });
                    const activeLink = document.querySelector(`na a[href="#${section}"]`);
                    if (activeLink) {
                        activeLink.classList.add('text-[#ee1a3b]', 'opacity-100');
                        activeLink.classList.remove('opacity-60');
                    }
                } else {
                    console.warn(`Section "${section}" not found.`);
                }
            }
        
           
            const defaultSection = 'info'; 
            showSection(defaultSection);
        

            window.addEventListener('hashchange', () => {
                const section = window.location.hash.slice(1);
                showSection(section);
            });
        </script>                
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/pages/account.blade.php ENDPATH**/ ?>