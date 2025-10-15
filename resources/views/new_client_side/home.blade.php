<!DOCTYPE html>
<html lang="fr" class="h-full overflow-x-hidden">

<head>
    <title>Grand Public - @yield('pageTitle', 'Events People Lifestyle Business My Gp')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Streamer and Youtuber HTML Template">
    <meta name="author" content="Dan Fisher">
    <meta name="keywords" content="youtube, streamer, stream, creator">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5/5hH8mH8W4Ke/t30wbUdy9n8M1cH/rfR61d3y5AWT4Y8OXx+V3Tp0KiZECYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="/mygp-images/logo-gp.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-CvZx5V28V6UtvHD2zAsMRclg9Bai8OckN7oGEyo22tV2LyD6Q5uOXCBLkq6wcn2Zp2GxHvBwwi20QNGFptE2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Web Fonts ====================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Template CSS-->
    <link href="{{ asset('assets/css/yt1/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/my-gp.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-zsP0/L3kc5mMF0ESqN0PcdY1mfYhT1Zryr24E+OB5Q7l+QiFybS2TVB9lqZ1diK8F+0EmC5f4RY6clSCwi9uqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('head')

    <!-- CSS ================================================== -->
    <!-- Vendor CSS-->
    <link href="{{ asset('assets/vendors/common/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/common/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">


    <style>
        .logo-wrapper {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 1px white;
            /* Ajuste l'épaisseur selon tes besoins */
            border-radius: 50%;
            /* Crée un cercle autour de l'image */
            padding: 1px;
            /* Espace entre le logo et le contour */
            background-color: white;
            /* Facultatif : ajoute un fond blanc */
        }

        .logo {
            border-radius: 50%;
            /* Pour que le logo épouse la forme du cercle */
        }
    </style>
</head>

<body
    class="antialiased tracking-tight font-base text-gray-500 text-base h-full bg-white dark:bg-gray-900 overflow-x-hidden">

    <div id="site-wrapper" class="flex flex-col h-full js-site-wrapper">

        <!-- Header Swipper -->
        <div class="header-wrapper bg-accent text-white relative z-30">
            <!-- NavBar -->
            <header id="site-header" class="text-white absolute inset-x-0 z-20">
                @include('new_client_side.partials.header')
            </header>
            <!-- End NavBar -->

            <div class="h-[500px] md:h-[640px] lg:h-[880px] bg-primary relative z-10">

                @include('new_client_side.swipper')

                <!-- Pagination Swipper -->
                <div
                    class="vv-hero-swiper-pagination js-vv-hero-swiper-pagination vv-pagination-circle-bullets absolute right-4 lg:right-10 top-1/2 !left-auto -translate-y-[calc(50%+40px)] !bottom-auto z-20 flex !w-4 lg:-translate-y-[calc(50%+70px)] flex-col gap-[10px]">
                </div>
                <!-- End Pagination Swipper -->

                <!-- Social Links Header -->
                @include('new_client_side.social_links_header')
                <!-- End Social Links Header -->

            </div>
        </div>
        <!-- End Header Swipper -->


        <!-- Mobile Menu -->
        @include('new_client_side.partials.mobile_navbar')
        <!-- Mobile Menu / End -->

        <main id="main-content" class="grow lg:pt-0">

            @if ($latest_videos && $latest_videos->count() > 0)
                @include('new_client_side.latest_videos')
            @endisset

            <section>
                <div class="container">
                    @foreach ($videosByCategory as $category => $videos)
                        @include('new_client_side.videos_swipper')
                    @endforeach
                </div>

                <section class="dark">
                    <div class="relative isolate mt-[-150px] py-14 md:py-32 lg:py-44 xl:py-48">
                        <div class="relative flex aspect-[1000/560] w-full flex-col items-center justify-between">
                            <div class="flex flex-col flex-wrap items-center justify-center gap-y-6 xl:gap-y-12">

                            </div>

                            <div class="flex gap-4 md:gap-5">
                                <img class="w-8 shrink-0 self-start rounded-full md:w-10"
                                    src="{{ asset('mygp-images/logo-gp.png') }}" alt="logo gp">
                                <div class="flex-1 text-primary dark:text-white">
                                    <div
                                        class="font-bold leading-none text-primary dark:text-white md:text-lg md:leading-snug">
                                        Grand Public</div>
                                    <div class="hidden text-xs leading-tighter md:text-sm">sur Youtube</div>
                                </div>
                            </div>
                            <!-- Image de fond couvrant toute la section -->
                            <div class="absolute inset-0 -z-10 h-full w-full">
                                <div class="absolute inset-0 -z-10 bg-cover bg-center bg-no-repeat opacity-90 ease-out transition-transform duration-[8000ms] group-[.swiper-slide-active]:scale-110"
                                    style="background-image: url('{{ asset('mygp-images/gp-view.jpg') }}')">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </section>

            <section class="md:pb-6 lg:pb-8 xl:pb-10">
                @include('new_client_side.baniere')
            </section>
    </main>

    @include('new_client_side.partials.video_month')
    @include('new_client_side.partials.footer')

</div>
<!-- Scripts ================================================== -->
<!-- Vendors JS -->
<script src="{{ asset('assets/vendors/common/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/common/swiper/js/swiper-bundle.min.js') }}"></script>

<!-- Template JS -->
<script src="{{ asset('assets/js/common.js') }}"></script>
<script src="{{ asset('assets/js/yt1/init.js') }}"></script>

</body>

</html>
