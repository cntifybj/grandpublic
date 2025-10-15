@foreach ($videos as $video)
    <div class="col-span-full sm:col-span-6 lg:col-span-4 video-item flex flex-col">
        <figure class="relative mb-6">
            <a class="group block h-full overflow-hidden bg-gray-900"
                href="{{ route('video-watch', ['slug' => $video->slug]) }}">
                <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75"
                    src="{{ $video->video_thumbnail }}" alt="{{ $video->title }}">

                @if (!isset($searchTerm))
                    <span
                        class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-[#ee1a3b] w-[60px]">
                        <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                            <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                        </svg>
                    </span>
                @endif
            </a>
        </figure>
        <div class="flex flex-col">
            <h3
                class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6 flex justify-between items-center">
                {{ $video->title }}
                @if ($video->premium_video)
                    <span class="ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 11h14v10H5V11z" />
                        </svg>
                    </span>
                @endif
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                {{ $video->description }} <!-- Ajoutez la description ici -->
            </p>
            <ul class="flex justify-between leading-tight tracking-tight text-sm">
                <li>{{ $video->youtube_view_count }} vues</li> <!-- Vues au début -->
                <li>{{ \Carbon\Carbon::parse($video->publication_date)->translatedFormat('d F Y') }}
                </li>
                <!-- Date de publication à la fin -->
            </ul>
        </div>
    </div>
@endforeach


{{ $videos->links() }}
