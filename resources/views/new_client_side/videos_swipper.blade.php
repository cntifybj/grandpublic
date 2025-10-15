<section class="py-8 md:py-14 lg:py-16 xl:py-[75px]">
    <div class="container">

        <div
            class="mb-8 flex flex-wrap items-end justify-between gap-y-6 sm:mb-12 sm:flex-row md:mb-16 lg:mb-20 xl:mb-24 xl:gap-y-12">
            <div class="flex flex-col-reverse gap-y-2 sm:gap-y-3 md:gap-y-4 lg:gap-y-5 xl:gap-y-6">
                <h3
                    class="leadin-none text-2xl font-bold tracking-tight text-primary dark:text-white sm:text-3xl md:text-3xl lg:text-4xl xl:text-5xl xl:leading-none">
                    {{ strtoupper($category) }}</h3>
            </div>

            <div class="flex">
                <div
                    class="js-vv-videos-featured-swiper-btn-prev relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white text-primary before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-left before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-[#ee1a3b] hover:before:origin-right hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-[#ee1a3b]">
                    <svg class="h-2 w-2" fill="currentColor">
                        <use xlink:href="assets/img/yt1/sprite.svg#chevron-left"></use>
                    </svg>
                </div>
                <div
                    class="js-vv-videos-featured-swiper-btn-next relative isolate flex h-[50px] w-[40px] items-center justify-center bg-white text-primary before:absolute before:inset-y-0 before:left-0 before:-z-10 before:block before:w-full before:origin-right before:scale-x-0 before:bg-gray-100 before:transition-transform before:duration-300 hover:cursor-pointer hover:text-[#ee1a3b] hover:before:origin-left hover:before:scale-x-100 dark:bg-gray-800 dark:text-white dark:before:bg-gray-700 dark:hover:text-[#ee1a3b]">
                    <svg class="h-2 w-2" fill="currentColor">
                        <use xlink:href="assets/img/yt1/sprite.svg#chevron-right"></use>
                    </svg>
                </div>
            </div>
        </div>

        <div class="swiper js-vv-latest-videos-swiper md:w-[1106px] lg:w-[1278px] xl:w-[1970px]">

            <div class="swiper-wrapper">
                @foreach ($videos as $video)
                    <div class="swiper-slide">
                        <div class="h-full">
                            <figure class="mb-6 aspect-video">
                                <a class="group relative block h-full overflow-hidden bg-gray-900"
                                    href="{{ route('video-watch', ['slug' => $video->slug]) }}" target="_self">
                                    <img class="w-full h-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
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
                                    class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6 flex justify-between items-center">
                                    {{ $video->title }}
                                    @if ($video->premium_video)
                                        <span class="ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                                            </svg>
                                        </span>
                                    @endif
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
</section>
