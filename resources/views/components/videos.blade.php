@extends('layouts.app')
@section('content')
<br>
<br>


<div class="page-heading pt-8 pb-12 text-center md:pt-16 md:pb-28 bg-red-500">
  <div class="container">
    <h1 class="relative mb-3 text-3xl font-bold leading-tight tracking-tight md:text-5xl">Vidéos</h1>
    <ol class="hidden relative flex flex-wrap justify-center divide-x-2 divide-white text-xs font-bold uppercase leading-none">
      <li class="px-[10px]"><a href="_yt1-index.html">Accueil</a></li>
      <li class="px-[10px]">Vidéos</li>
    </ol>
  </div>
</div>

<main id="main-content" class="grow lg:pt-0">

  <section class="pt-14 pb-24 lg:pb-52 lg:pt-40">
    <div class="container">
      <div class="relative -mt-20 mb-14 flex flex-col md:flex-row md:justify-between lg:-mt-[200px] lg:mb-40">

        <ul class="relative z-10 items-start md:items-stretch flex flex-col py-4 md:py-0 md:flex-row md:gap-x-6 lg:gap-x-12 xl:gap-x-14 md:min-h-[100px] lg:min-h-[120px]">
          <li class="flex after:absolute after:h-1 md:after:bottom-0 after:bottom-1 after:bg-accent after:inset-x-0 relative">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-100 text-primary lg:text-primary dark:text-white dark:lg:text-white" href="#">
              Les plus récentees
            </a>
          </li>
          <li class="flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Les plus anciennes
            </a>
          </li>
          <li class="flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Populaires
            </a>
          </li>
          <li class="flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Plus aimées
            </a>
          </li>
          <li class="flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Autres
          </li>
          <li class="hidden flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Technology
            </a>
          </li>
          <li class="hidden flex">
            <a class="flex items-center py-2 font-bold transition-all hover:text-primary dark:hover:text-white hover:opacity-100 text-sm lg:text-base opacity-40 dark:text-white/90" href="#">
              Toys
            </a>
          </li>
        </ul>
        <div class="hidden relative z-10 flex justify-between gap-x-4 pr-6 pb-5 md:pb-0 md:gap-x-6 lg:gap-x-10 lg:pr-[60px]">

          <ul class="flex gap-4 lg:gap-6 pt-2 md:self-center md:pt-0">
            <li>
              <a class="group" href="_yt1-videos-grid-3.html">
                <svg role="img" class="h-6 w-6 fill-accent dark:fill-accent">
                  <use xlink:href="assets/img/yt1/sprite.svg#grid"></use>
                </svg>
              </a>
            </li>
            <li>
              <a class="group" href="_yt1-videos-grid-4.html">
                <svg role="img" class="h-6 w-6 fill-primary group-hover:fill-accent transition-colors dark:fill-white dark:group-hover:fill-accent">
                  <use xlink:href="assets/img/yt1/sprite.svg#grid-sm"></use>
                </svg>
              </a>
            </li>
          </ul>

        </div>

        <div class="absolute inset-0 -left-full bg-white dark:bg-gray-800 shadow-3xl"></div>
      </div>

      <div class="grid grid-cols-12 gap-y-14 sm:gap-x-[30px]">
        <div class="col-span-full sm:col-span-6 lg:col-span-4">
          <figure class="mb-6">
            <a class="group relative block h-full overflow-hidden bg-gray-900 glightbox" href="https://www.youtube.com/watch?v&#x3D;XE0fU9PCrWE">
              <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75" src="assets/img/yt1/samples/video-1-370x208.jpg" alt="Top 10 Best Places in Japan to get Deluxe Edition Boxes!">

              <span class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-accent w-[60px]">
                  <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                  </svg>
                </span>
            </a>
          </figure>
          <div>
            <h3 class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6">VIDEO 1</h3>
            <ul class="flex leading-tight tracking-tighter [&>li:not(:last-child)]:after:content-['-'] [&>li]:after:mx-1 text-sm">
              <li>
                734K
                views
              </li>
              <li>
                6 hours ago
              </li>
            </ul>
          </div>
        </div>
        <div class="col-span-full sm:col-span-6 lg:col-span-4">
          <figure class="mb-6">
            <a class="group relative block h-full overflow-hidden bg-gray-900 glightbox" href="https://www.youtube.com/watch?v&#x3D;XE0fU9PCrWE">
              <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75" src="assets/img/yt1/samples/video-2-370x208.jpg" alt="Ranking the Best Sunglasses Bundles for this Summer!">

              <span class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-accent w-[60px]">
                  <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                  </svg>
                </span>
            </a>
          </figure>
          <div>
            <h3 class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6">VIDEO 2</h3>
            <ul class="flex leading-tight tracking-tighter [&>li:not(:last-child)]:after:content-['-'] [&>li]:after:mx-1 text-sm">
              <li>
                204K
                views
              </li>
              <li>
                7 hours ago
              </li>
            </ul>
          </div>
        </div>
        <div class="col-span-full sm:col-span-6 lg:col-span-4">
          <figure class="mb-6">
            <a class="group relative block h-full overflow-hidden bg-gray-900 glightbox" href="https://www.youtube.com/watch?v&#x3D;XE0fU9PCrWE">
              <img class="aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75" src="assets/img/yt1/samples/video-3-370x208.jpg" alt="We Unbox the “Power Computer Bundle” for Gaming">

              <span class="absolute top-1/2 left-1/2 flex aspect-square -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-accent w-[60px]">
                  <svg role="img" class="fill-white ml-[3px] h-5 w-4">
                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                  </svg>
                </span>
            </a>
          </figure>
          <div>
            <h3 class="mb-3 font-bold leading-tight text-primary dark:text-white lg:text-lg lg:leading-6">VIDEO 3</h3>
            <ul class="flex leading-tight tracking-tighter [&>li:not(:last-child)]:after:content-['-'] [&>li]:after:mx-1 text-sm">
              <li>
                190K
                views
              </li>
              <li>
                13 hours ago
              </li>
            </ul>
          </div>
        </div>


      <div class="flex items-center justify-center mt-10 md:mt-20 lg:mt-28">
        <div class="vv-preloader-spikes-roll relative h-10 w-16 animate-spike-roll bg-spike-roll bg-no-repeat"></div>
      </div>
    </div>
  </section>

</main>

@endsection