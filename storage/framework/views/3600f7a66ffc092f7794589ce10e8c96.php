<div>
    
    <div class="page-heading pt-6 pb-10 text-center md:pt-12 md:pb-20">
        <div class="container">
            <div class="h-auto object-contain p-6 w-full md:w-[85%] lg:w-[75%] xl:w-[65%] mx-auto mt-32 md:mt-100 mb-0 slide-container"
                id="slideContainer">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $advisoriesImagesUrl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide"
                        style="background-image: url('<?php echo e($url); ?>'); transform: translateX(<?php echo e(100 * $index); ?>%)">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    
    <section class="bg-[#111827] pt-14 pb-14">
        <h1 class="titre text-[#ee1a3b] text-center text-3xl font-bold leading-tight tracking-tight md:text-5xl mb-14">
            PORTRAIT
        </h1>

        <div class="container">
            <div class="relative mb-14 flex flex-col md:flex-row md:justify-between">
                
                <ul
                    class="relative z-10 items-start md:items-stretch flex flex-col py-4 md:py-0 md:flex-row md:gap-x-4 lg:gap-x-8 xl:gap-x-10 md:min-h-[100px] lg:min-h-[120px] mb-10 md:mb-0">
                    <li class="flex relative">
                        <a wire:click.prevent="setFilter('all')"
                            class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base <?php echo e($filter === 'all' ? 'opacity-100 text-primary border-b-3 border-[#ee1a3b]' : 'opacity-40'); ?> dark:text-white/90 cursor-pointer">
                            Toutes
                        </a>
                    </li>
                    <li class="flex">
                        <a wire:click.prevent="setFilter('recent')"
                            class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base <?php echo e($filter === 'recent' ? 'opacity-100 text-primary border-b-3 border-[#ee1a3b]' : 'opacity-40'); ?> dark:text-white/90 cursor-pointer">
                            Récentes
                        </a>
                    </li>
                    <li class="flex">
                        <a wire:click.prevent="setFilter('old')"
                            class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base <?php echo e($filter === 'old' ? 'opacity-100 text-primary border-b-3 border-[#ee1a3b]' : 'opacity-40'); ?> dark:text-white/90 cursor-pointer">
                            Anciennes
                        </a>
                    </li>
                    <li class="flex">
                        <a wire:click.prevent="setFilter('recommended')"
                            class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base <?php echo e($filter === 'recommended' ? 'opacity-100 text-primary border-b-3 border-[#ee1a3b]' : 'opacity-40'); ?> dark:text-white/90 cursor-pointer">
                            Recommandées
                        </a>
                    </li>
                    <li class="flex">
                        <a wire:click.prevent="setFilter('max_views')"
                            class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base <?php echo e($filter === 'max_views' ? 'opacity-100 text-primary border-b-3 border-[#ee1a3b]' : 'opacity-40'); ?> dark:text-white/90 cursor-pointer">
                            Plus vues
                        </a>
                    </li>
                </ul>

                
                <div
                    class="relative z-10 flex items-center justify-between flex-grow pr-0 pb-5 md:pb-0 md:gap-x-4 lg:gap-x-6 lg:pr-4">
                    <div class="relative flex-grow max-w-xs md:max-w-md lg:max-w-lg group">
                        <input type="text" wire:model.live.debounce.300ms="search"
                            class="w-full h-12 pl-12 pr-4 text-sm text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 border-2 border-transparent rounded-lg outline-none transition-all duration-300 ease-in-out placeholder-gray-400 dark:placeholder-gray-500 focus:bg-white dark:focus:bg-gray-900 focus:border-[#ee1a3b] focus:shadow-[0_0_0_2px_rgba(238,26,59,0.1)]"
                            placeholder="Recherchez une vidéo">

                        <div
                            class="absolute left-4 top-1/2 -translate-y-1/2 transition-transform duration-300 group-focus-within:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 group-focus-within:text-[#ee1a3b] transition-colors duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>

                    <ul class="flex gap-2 pt-2 md:self-center md:pt-0">
                        <li>
                            <a wire:click.prevent="setGridCols(3)" class="cursor-pointer">
                                <svg role="img"
                                    class="h-6 w-6 <?php echo e($gridCols === 3 ? 'fill-[#ee1a3b]' : 'dark:fill-white'); ?>">
                                    <use xlink:href="assets/img/yt1/sprite.svg#grid"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a wire:click.prevent="setGridCols(4)" class="cursor-pointer">
                                <svg role="img"
                                    class="h-6 w-6 <?php echo e($gridCols === 4 ? 'fill-[#ee1a3b]' : 'dark:fill-white'); ?>">
                                    <use xlink:href="assets/img/yt1/sprite.svg#grid-sm"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="absolute inset-0 -left-full bg-white dark:bg-gray-800 shadow-3xl"></div>
            </div>

            <div class="mb-32"></div>

            
            <!--[if BLOCK]><![endif]--><?php if($search && $videos->count() === 0): ?>
                <div class="flex justify-center items-center my-6">
                    <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 shadow-md text-center">
                        <p class="text-lg font-semibold text-gray-700">
                            Aucun résultat trouvé pour <span class="font-bold text-primary">"<?php echo e($search); ?>"</span>
                        </p>
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php if(!$search && $videos->count() === 0): ?>
                <div class="flex justify-center items-center my-20">
                    <div class="bg-gray-100 border border-gray-300 rounded-lg p-6 shadow-md text-center">
                        <p class="text-xl font-semibold text-gray-700">Aucune vidéo disponible</p>
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <div class="grid grid-cols-12 gap-y-14 sm:gap-x-[30px] min-h-[500px] mt-[-100px]"
                wire:loading.class="opacity-50">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = is_countable($videos) ? $videos : $videos->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="col-span-full sm:col-span-6 <?php echo e($gridCols === 3 ? 'lg:col-span-4' : 'lg:col-span-3'); ?> video-item flex flex-col">
                        <figure class="relative mb-6">
                            <a class="group block h-full overflow-hidden bg-gray-900"
                                href="<?php echo e(route('video-watch', $video->slug)); ?>">
                                <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                    src="<?php echo e($video->video_thumbnail); ?>" alt="<?php echo e($video->title); ?>">

                                <span
                                    class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b] w-[60px]">
                                    <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                                        <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                    </svg>
                                </span>
                            </a>
                        </figure>
                        <div class="flex flex-col">
                            <h3
                                class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6 flex justify-between items-center">
                                <?php echo e($video->title); ?>

                                <!--[if BLOCK]><![endif]--><?php if($video->premium_video): ?>
                                    <span class="ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-6 h-6 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                        </svg>
                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2"><?php echo e($video->description); ?></p>
                            <ul class="flex justify-between leading-tight tracking-tight text-sm">
                                <li><?php echo e($video->views); ?> vues</li>
                                <li><?php echo e(\Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y')); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            
            <!--[if BLOCK]><![endif]--><?php if($videos->count() > 0 && $videos->hasPages()): ?>
                <nav class="flex items-center justify-center space-x-2 mt-10">
                    <?php echo e($videos->links()); ?>

                </nav>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <div wire:loading class="fixed top-4 right-4 bg-[#ee1a3b] text-white px-4 py-2 rounded-lg shadow-lg">
                Chargement...
            </div>
        </div>

        <div class="pb-24"></div>
    </section>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('livewire:navigated', () => {
            const slides = document.querySelectorAll('.slide');
            let currentIndex = 0;

            setInterval(() => {
                currentIndex = (currentIndex + 1) % slides.length;
                slides.forEach((slide, index) => {
                    slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
                });
            }, 5000);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\projects\grandpublic\resources\views/livewire/video-filter.blade.php ENDPATH**/ ?>