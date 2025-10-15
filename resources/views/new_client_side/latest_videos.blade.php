<section class="">
    <div class="container">
        <div class="relative z-30 -mt-20 flex flex-col py-10 md:flex-row md:justify-between lg:-mt-[180px]">

            <div class="relative">

                <div class="swiper js-vv-videos-featured-swiper md:w-[1236px] lg:w-[1278px] xl:w-[2068px]">

                    <div class="swiper-wrapper">
                        @foreach ($latest_videos as $video)
                            <div class="swiper-slide">
                                <div>
                                    <figure class="mb-6">
                                        <a class="group relative block h-full overflow-hidden bg-gray-900"
                                            href="{{ route('video-watch', ['slug' => $video->slug]) }}" target="_self">
                                            <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                                                src="{{ $video->video_thumbnail }}" alt="{{ $video->title }}">
                                            <span
                                                class="absolute top-1/2 left-1/2 flex aspect-square w-[60px] -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b]">
                                                <svg role="img" class="ml-[3px] h-5 w-4 fill-white">
                                                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </figure>
                                    <div>
                                        <h3
                                            class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6">
                                            {{ $video->title }}
                                        </h3>
                                        <ul class="flex text-sm leading-tight tracking-tighter">
                                            <li class="mr-2">{{ $video->youtube_view_count }} vues</li>
                                            <li class="ml-auto">
                                                {{ \Carbon\Carbon::parse($video->publication_date)->format('d M, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

            <div class="absolute left-0 -top-[10px] z-10 min-[1330px]:-left-20 min-[1330px]:translate-x-0">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex">
                        <div
                            class="js-vv-videos-featured-swiper-btn-prev relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white text-primary before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-left before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-accent hover:before:origin-right hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-accent">
                            <svg class="h-[10px] w-[10px]" fill="currentColor">
                                <use xlink:href="assets/img/yt1/sprite.svg#chevron-left"></use>
                            </svg>
                        </div>
                        <div
                            class="js-vv-videos-featured-swiper-btn-next relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white text-primary before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-right before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-accent hover:before:origin-left hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-accent">
                            <svg class="h-[10px] w-[10px]" fill="currentColor">
                                <use xlink:href="assets/img/yt1/sprite.svg#chevron-right"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="shadow-3xl absolute inset-y-0 -left-10 -right-full bg-white dark:bg-gray-800 min-[1330px]:-left-20">
            </div>
        </div>
    </div>
</section>
