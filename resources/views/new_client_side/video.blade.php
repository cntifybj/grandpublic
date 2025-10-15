{{-- <style>
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
    </style> --}}

<!DOCTYPE html>
<html lang="fr" class="h-full overflow-x-hidden">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <title>Valkivid - Single Post V1</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Streamer and Youtuber HTML Template">
    <meta name="author" content="Dan Fisher">
    <meta name="keywords" content="youtube, streamer, stream, creator">

    <!-- Favicons
  ================================================== -->
    <link rel="shortcut icon" href="assets/img/yt1/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/yt1/favicons/favicon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/yt1/favicons/favicon-152.png">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

    <!-- Google Web Fonts
  ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS
  ================================================== -->
    <!-- Vendor CSS-->
    <link href="{{ asset('assets/vendors/common/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/common/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template CSS-->
    <link href="{{ asset('assets/css/yt1/style.css') }}" rel="stylesheet">

</head>

<body
    class="antialiased tracking-tight font-base text-gray-500 text-base h-full bg-white dark:bg-gray-900 overflow-x-hidden">

    <div id="site-wrapper" class="flex flex-col h-full js-site-wrapper">


        <div
            class="header-wrapper relative bg-[url({{ asset('assets/img/yt1/samples/header-bg.jpg') }}')] bg-cover bg-top bg-no-repeat text-white md:pb-[330px]">
            <header id="site-header" class="relative z-20 text-white">
                @include('new_client_side.partials.header')
            </header>


            <div class="bg-gray-900/80 absolute inset-0 z-0"></div>
        </div>


        <!-- Mobile Menu -->
        <div
            class="js-mobile-menu p-t-[64px] fixed left-0 top-[64px] z-50 block h-[calc(100dvh-64px)] w-full translate-x-full overflow-auto bg-white dark:bg-gray-800 py-5 text-primary dark:text-white transition-transform duration-300 lg:hidden">
            <div class="container">
                <!-- Navigation (Mobile) -->
                <ul class="text-md flex flex-col font-bold">
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-index.html">
                            Home
                        </a>


                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-videos-grid-4.html">
                            Videos
                        </a>

                        <button
                            class="js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                            <svg role="img" class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                            </svg>
                        </button>

                        <ul
                            class="flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-videos-grid-3.html">
                                    Videos - 3 Cols
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-videos-grid-4.html">
                                    Videos - 4 Cols
                                </a>

                            </li>
                        </ul>

                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-blog-grid.html">
                            News
                        </a>

                        <button
                            class="js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                            <svg role="img" class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                            </svg>
                        </button>

                        <ul
                            class="flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-blog-grid.html">
                                    Blog Grid
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-blog-list.html">
                                    Blog List
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-single.html">
                                    Blog Post V1
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-single-2.html">
                                    Blog Post V2
                                </a>

                                <button
                                    class="js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                                    <svg role="img"
                                        class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                        <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                                    </svg>
                                </button>

                                <ul
                                    class="flex max-h-0 w-full flex-col overflow-hidden pl-4 transition-all duration-300">
                                    <li class="flex flex-wrap items-center gap-x-4">
                                        <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                            href="_yt1-single.html">
                                            Another Item
                                        </a>
                                    </li>
                                    <li class="flex flex-wrap items-center gap-x-4">
                                        <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                            href="_yt1-single-2.html">
                                            Other Level Item
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        </ul>

                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-about.html">
                            About
                        </a>


                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-events.html">
                            Events
                        </a>

                        <button
                            class="js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                            <svg role="img" class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                            </svg>
                        </button>

                        <ul
                            class="flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-single-event.html">
                                    Single Event
                                </a>

                            </li>
                        </ul>

                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-partners.html">
                            Partners
                        </a>


                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-contact.html">
                            Contact
                        </a>


                    </li>
                    <li
                        class="flex flex-wrap items-center gap-x-4 border-b border-b-gray-200 dark:border-b-gray-200/10">
                        <a class="flex-grow gap-x-1 py-4 leading-normal transition-colors hover:text-accent"
                            href="_yt1-shop-grid-3.html">
                            Shop
                        </a>

                        <button
                            class="js-mobile-submenu-toggle ml-auto inline-flex h-7 w-7 items-center justify-center transition-transform">
                            <svg role="img"
                                class="sub-menu-toggle h-2 w-2 rotate-90 fill-primary dark:fill-white">
                                <use xlink:href="assets/img/yt1/sprite.svg#arrow-right"></use>
                            </svg>
                        </button>

                        <ul
                            class="flex max-h-0 w-full flex-col overflow-hidden pl-4 text-sm transition-all duration-300 [&>li:last-child]:pb-4">
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-shop-grid-3.html">
                                    Shop V1
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-shop-grid-4.html">
                                    Shop V2
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-single-product.html">
                                    Single Product
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-cart.html">
                                    Cart
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-checkout.html">
                                    Checkout
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-login.html">
                                    Login
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-register.html">
                                    Register
                                </a>

                            </li>
                            <li class="flex flex-wrap items-center gap-x-4">
                                <a class="flex-grow gap-x-1 py-2 transition-colors hover:text-accent"
                                    href="_yt1-account.html">
                                    Account
                                </a>

                            </li>
                        </ul>

                    </li>
                </ul>
                <!-- Navigation (Mobile) / End -->
            </div>
        </div>
        <!-- Mobile Menu / End -->

        <main id="main-content" class="grow lg:pt-0">

            <section class="pb-24 lg:pb-[220px] md:-mt-[210px]">
                <div class="container">
                    <article
                        class="grid-col-4 grid gap-x-4 md:grid-cols-12 md:gap-x-6 lg:gap-x-[30px] isolate relative">
                        <div
                            class="-mx-16 md:mx-0 col-span-full md:col-start-2 md:col-end-12 bg-white dark:bg-gray-900 h-[210px] -z-10 absolute inset-x-0">
                        </div>

                        <header
                            class="col-span-full mb-5 flex flex-col items-start gap-y-6 pt-16 lg:pt-20 md:col-start-3 md:col-end-11 md:mb-14">
                            <a class="bg-accent px-3 py-1 text-xs font-bold uppercase leading-snug text-white transition-colors hover:bg-accent/90 md:text-sm"
                                href="#">
                                Previews
                            </a>
                            <h1
                                class="pb-1 text-2xl font-bold leading-tight tracking-tighter text-primary dark:text-white md:text-3xl lg:pr-20 lg:text-5xl lg:leading-none">
                                Next month I’ll be unboxing the exclusive “Last of Them II” deluxe version
                            </h1>

                            <ul
                                class="mb-4 flex flex-wrap justify-center divide-x divide-accent pt-1 text-xs leading-none tracking-tight md:mb-7 md:text-base">
                                <li class="px-2 leading-none first:pl-0">December 21st, 2022</li>
                                <li class="px-2 leading-none">Jack Master</li>
                                <li class="px-2 leading-none last:pr-0">3 Comments</li>
                            </ul>

                        </header>

                        <div
                            class="col-span-full md:col-start-3 md:col-end-11 grid-col-4 grid gap-x-4 md:grid-cols-8 md:gap-x6 lg:gap-x-[30px]">
                            <div class="mb-10 col-span-1 mt-3">
                                <ul class="flex md:flex-col gap-4 sticky top-6">
                                    <li class="md:flex-1">
                                        <a href=""
                                            class="relative flex h-11 w-11 items-center justify-center text-xs text-white transition-colors bg-social-facebook hover:bg-social-facebook/90">
                                            <svg class="h-4 w-4" fill="currentColor">
                                                <use xlink:href="assets/img/social-icons.svg#facebook"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="md:flex-1">
                                        <a href=""
                                            class="relative flex h-11 w-11 items-center justify-center text-xs text-white transition-colors bg-social-twitter hover:bg-social-twitter/90">
                                            <svg class="h-4 w-4" fill="currentColor">
                                                <use xlink:href="assets/img/social-icons.svg#twitter"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="md:flex-1">
                                        <a href=""
                                            class="relative flex h-11 w-11 items-center justify-center text-xs text-white transition-colors bg-primary hover:bg-primary/90">
                                            <svg class="h-4 w-4" fill="currentColor">
                                                <use xlink:href="assets/img/social-icons.svg#envelope-fill"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-span-full md:col-start-2 md:col-end-9">
                                <div class="vv-prose">
                                    <p class="!mt-0">Unboxing is the unpacking of products, especially high tech
                                        consumer products, where the process is captured on video and uploaded to
                                        the Internet. The item is then also explained in detail and also can
                                        sometimes be demonstrated as well. Yahoo Tech places the first unboxing
                                        video to be for the Nokia E61 cellphone in 2006.. According to Google
                                        Trends, searches for the term "unboxing" began to surface in the final
                                        quarter of 2006. Early unboxing videos focused mainly either on gadgets or
                                        fashion items. However, once the trend took off, unboxing videos were
                                        available for, as Yahoo's Deb Amien put it, "nearly every thing that is
                                        available for purchase." By 2014 the popularity of the videos were such that
                                        some companieshad been known to upload unboxing videos for their own
                                        products, whilst others sent products to uploaders for free.</p>

                                    <p>Some consider the popularity of this practice is due to the ability of
                                        showing the product exactly for what it is without any adulteration
                                        advertisers usually make around the product. Being able to see what the
                                        customer is getting "can contribute to the decision process." Some users
                                        have tried to make these unboxings more interesting by adding special
                                        effects or doing them in different ways, such as an underwater unboxing of a
                                        waterproof smartphone.</p>

                                    <h4>Diamond Order Box</h4>
                                    <p>The growth of E-commerce has also been a major factor contributing to the
                                        rise of unboxing. Direct-to-Consumer companies needed a way to better
                                        connect with their customers emotionally and create a positive buying
                                        experience. This has lead to many D2C companies investing in packaging
                                        design to serve as a marketing asset for their products. The more engaging
                                        and cool the packaging is, the more likely consumers will record unboxing
                                        videos of their product and ultimately drive more buyers to the company.</p>

                                    <figure class="col-span-full mb-8 md:col-start-2 md:col-end-12 md:mb-14">
                                        <a class="group relative block h-full overflow-hidden bg-gray-900"
                                            href="#">
                                            <img class="my-0 aspect-video w-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-75 lg:my-0"
                                                src="assets/img/yt1/samples/post-img-3.jpg" alt="">
                                            <span
                                                class="absolute top-1/2 left-1/2 flex aspect-square h-20 w-20 -translate-x-2/4 -translate-y-2/4 items-center justify-center rounded-full bg-accent">
                                                <svg role="img" class="mr-[-3px] h-[27px] w-[22px] fill-white">
                                                    <use xlink:href="assets/img/yt1/sprite.svg#play"></use>
                                                </svg>
                                            </span>
                                        </a>
                                    </figure>

                                    <p>Packaging manufacturers are also increasingly aware of the role of 'the
                                        unboxing trend' in their development, and are continually improving their
                                        technologies to meet the demand for higher quality printed packages. Boxes
                                        are no longer just a transportation tool - they are a valuable marketing
                                        billboard delivered right to the customers.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div
                            class="relative flex gap-x-6 bg-gray-100 py-8 leading-8 after:absolute after:inset-y-0 after:-left-1/2 after:w-1/2 after:bg-gray-100 dark:bg-gray-800 dark:after:bg-gray-800 md:py-[70px] md:text-lg lg:gap-x-9 col-span-full md:col-start-2 mb-20 md:col-end-12 lg:px-[100px] md:px-[66px] md:mb-28 lg:mb-40">
                            <figure class="shrink-0">
                                <img src="assets/img/yt1/samples/user-1-80x80.jpg" alt="Author Avatar">
                            </figure>

                            <div class="flex-grow">

                                <div class="mb-6 flex flex-wrap justify-between gap-4">
                                    <div>
                                        <h5
                                            class="mb-2 text-1.5xl font-bold leading-none text-primary dark:text-white">
                                            Jack Master</h5>
                                        <div class="text-base">Post Author</div>
                                    </div>
                                    <ul class="flex flex-wrap gap-4 md:gap-8">
                                        <li>
                                            <a class="white text-primary transition-colors hover:text-accent dark:text-white dark:hover:text-accent"
                                                href="#" title="Facebook">
                                                <svg class="h-4 w-4" fill="currentColor">
                                                    <use xlink:href="assets/img/social-icons.svg#facebook"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="white text-primary transition-colors hover:text-accent dark:text-white dark:hover:text-accent"
                                                href="#" title="Twitter">
                                                <svg class="h-4 w-4" fill="currentColor">
                                                    <use xlink:href="assets/img/social-icons.svg#twitter"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="white text-primary transition-colors hover:text-accent dark:text-white dark:hover:text-accent"
                                                href="#" title="Instagram">
                                                <svg class="h-4 w-4" fill="currentColor">
                                                    <use xlink:href="assets/img/social-icons.svg#instagram"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="white text-primary transition-colors hover:text-accent dark:text-white dark:hover:text-accent"
                                                href="#" title="Youtube">
                                                <svg class="h-4 w-4" fill="currentColor">
                                                    <use xlink:href="assets/img/social-icons.svg#youtube"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    I started the unboxing videos in 2012 and the channel kept growing bigger and bigger
                                    since. Hope you like all my videos!
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full md:col-start-3 md:col-end-11">
                            <h2
                                class="mb-10 text-3xl font-bold leading-none tracking-tighter text-primary dark:text-white md:mb-20 md:text-5xl lg:mb-28">
                                <span class="text-accent">3</span>
                                Comments
                            </h2>
                            <ol class="text-lg leading-8 tracking-tight">
                                <li class="mb-12 lg:mb-20">
                                    <div class="flex gap-x-7 md:gap-x-9">
                                        <figure class="shrink-0">
                                            <img src="assets/img/yt1/samples/user-2-80x80.jpg"
                                                alt="Comment Author Avatar">
                                        </figure>
                                        <div class="flex-grow">
                                            <div class="mb-6">
                                                <h5
                                                    class="mb-2 text-lg md:text-1.5xl font-bold leading-none tracking-tight text-primary dark:text-white">
                                                    Tony Parker</h5>
                                                <div class="text-sm md:text-base">27 minutes ago</div>
                                            </div>
                                            <div class="mb-7 leading-relaxed tracking-tighter md:text-lg md:leading-8">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempo incididunt ut labore et dolore.
                                            </div>
                                            <div class="flex gap-8">
                                                <a class="text-sm font-bold uppercase leading-none text-primary dark:text-white dark:hover:text-accent transition-colors hover:text-accent"
                                                    href="#">Reply</a>
                                                <a class="text-sm font-bold uppercase leading-none text-gray-300 dark:text-white/50 dark:hover:text-accent transition-colors hover:text-accent"
                                                    href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="mt-12 md:pl-5 lg:mt-20">
                                        <li class="mb-12 lg:mb-20">
                                            <div class="flex gap-x-7 md:gap-x-9">
                                                <figure class="shrink-0">
                                                    <img src="assets/img/yt1/samples/user-3-80x80.jpg"
                                                        alt="Comment Author Avatar">
                                                </figure>
                                                <div class="flex-grow">
                                                    <div class="mb-6">
                                                        <h5
                                                            class="mb-2 text-lg md:text-1.5xl font-bold leading-none tracking-tight text-primary dark:text-white">
                                                            Jessica Valentine</h5>
                                                        <div class="text-sm md:text-base">14 minutes ago</div>
                                                    </div>
                                                    <div
                                                        class="mb-7 leading-relaxed tracking-tighter md:text-lg md:leading-8">
                                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                                        fugiat nulla pariatur.
                                                    </div>
                                                    <div class="flex gap-8">
                                                        <a class="text-sm font-bold uppercase leading-none text-primary dark:text-white dark:hover:text-accent transition-colors hover:text-accent"
                                                            href="#">Reply</a>
                                                        <a class="text-sm font-bold uppercase leading-none text-gray-300 dark:text-white/50 dark:hover:text-accent transition-colors hover:text-accent"
                                                            href="#">Report</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-12 lg:mb-20">
                                    <div class="flex gap-x-7 md:gap-x-9">
                                        <figure class="shrink-0">
                                            <img src="assets/img/yt1/samples/user-4-80x80.jpg"
                                                alt="Comment Author Avatar">
                                        </figure>
                                        <div class="flex-grow">
                                            <div class="mb-6">
                                                <h5
                                                    class="mb-2 text-lg md:text-1.5xl font-bold leading-none tracking-tight text-primary dark:text-white">
                                                    Peter Stark</h5>
                                                <div class="text-sm md:text-base">3 hours ago</div>
                                            </div>
                                            <div class="mb-7 leading-relaxed tracking-tighter md:text-lg md:leading-8">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam.
                                            </div>
                                            <div class="flex gap-8">
                                                <a class="text-sm font-bold uppercase leading-none text-primary dark:text-white dark:hover:text-accent transition-colors hover:text-accent"
                                                    href="#">Reply</a>
                                                <a class="text-sm font-bold uppercase leading-none text-gray-300 dark:text-white/50 dark:hover:text-accent transition-colors hover:text-accent"
                                                    href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ol>
                        </div>
                        <!-- Modal pour le message d'abonnement -->
                        <div id="premiumModal"
                        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center hidden">
                        <div
                            class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg shadow-lg">
                            <button id="closeModalX"
                                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <div class="text-center">
                                <div class="mb-4">
                                    <svg class="w-16 h-16 text-red-500 mx-auto" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                @if (isset($video) && $video->premium_video)
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Abonnement Premium Requis !
                                    </h3>
                                    <p class="text-gray-600 mb-8">
                                        Accédez à l’intégralité de cette vidéo en vous abonnant à notre service
                                        premium ou choisissez l’option de paiement unique. Ne manquez pas nos
                                        contenus exclusifs, disponibles dès maintenant !

                                    </p>

                                    <div class="flex justify-center space-x-4">
                                        <button id="payVideoButton"
                                            class="bg-black text-white font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 hover:opacity-80"
                                            onclick="window.location.href='{{ route('sub-pay') }}'">
                                            Payer la vidéo
                                        </button>

                                        <button id="subscribeButton"
                                            class="bg-[#ee1a3b] text-white active:bg-[#ee1a3b] font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            onclick="window.location.href='{{ route('sub-add') }}'">
                                            S'abonner
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="yt-video-meta">
                        <span>
                            {{ isset($video) && $video->youtube_view_count ? $video->youtube_view_count : 0 }}
                            Vue{{ isset($video) && $video->youtube_view_count > 1 ? 's' : '' }}
                        </span>
                        <span>
                            {{ isset($video) && $video->publication_date ? \Carbon\Carbon::parse($video->publication_date)->format('d M, Y') : 'Date non disponible' }}
                        </span>
                    </div>
                    <p class="yt-video-description">
                        {{ isset($video) && $video->description ? $video->description : 'Description non disponible' }}
                    </p>


                    <div class="yt-button-container">
                        <button class="yt-button" onclick="toggleLike({{ isset($video) ? $video->id : 'null' }})"
                            id="like-button-{{ $video ? $video->id : 'default' }}">
                            <i class="fas fa-thumbs-up"></i>
                            <span id="like-count-{{ $video ? $video->id : 'default' }}">
                                {{ $video ? $video->likes->count() : 0 }}
                            </span>

                        </button>

                        <button class="yt-button" onclick="copyLink({{ $video ? $video->id : 'null' }})">
                            <i class="fas fa-link"></i>
                            <span class="yt-button-text">Copier le lien</span>
                        </button>
                    </div>

                    <div id="notification" class="notification"></div>
                        <div class="col-span-full md:col-start-2 md:col-end-9 mt-[-40px] md:mt-[-70px]">
                            <h2
                                class="mb-10 text-3xl font-bold leading-none tracking-tighter text-primary dark:text-white md:mb-20 md:text-5xl lg:mb-28">
                                <span class="text-[#ee1a3b]">{{ $video->comments->count() }}</span>
                                Commentaire{{ $video->comments->count() > 1 ? 's' : '' }}
                            </h2>
                            <div class="col-span-full md:col-start-3 md:col-end-11 mt-8 lg:mt-16">
                                <h2
                                    class="mb-10 text-3xl md:text-5xl font-bold leading-none tracking-tighter text-primary dark:text-white md:mb-20 lg:mb-28">
                                    Laisser un commentaire
                                </h2>
                                <!-- Affichage du message d'erreur -->
                                @if ($errors->has('message'))
                                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif

                                <!-- Formulaire de commentaire -->
                                <form id="commentForm" method="POST" action="{{ route('comments.store') }}"
                                    class="grid grid-cols-1 md:grid-cols-3 gap-7">
                                    @csrf
                                    <input type="hidden" name="video_id" value="{{ $video ? $video->id : '' }}">
                                    <div class="md:col-span-3">
                                        <textarea
                                            class="rounded-lg block border-base w-full px-4 py-2 leading-tight text-primary transition-all duration-150 placeholder:text-gray-500/60 focus:border-[#ee1a3b] focus:outline-0 focus:ring-0 dark:border-white/10 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-indigo-500 h-24 resize-none"
                                            name="content" id="post-comment" placeholder="Votre commentaire"></textarea>
                                    </div>

                                    <div class="md:col-span-3">
                                        <input
                                            class="bg-[#ee1a3b] rounded-md hover:bg-opacity-90 font-bold text-white text-lg tracking-tight py-5 leading-normal mt-4 md:mt-8
                                            hover:cursor-pointer hover:bg-[#d0172f] transition-all duration-200 ease-in-out
                                            transform hover:-translate-y-1 block w-full"
                                            type="submit" value="Commenter">
                                    </div>
                                </form>
                            </div>
                            <!-- Modal pour se connecter -->
                            <div id="loginModal" class="fixed z-10 inset-0 overflow-y-auto hidden"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-center justify-center min-h-screen">
                                    <div class="fixed inset-0 bg-black opacity-30"></div>
                                    <div
                                        class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                        <div class="p-6">
                                            <h3 class="text-lg font-medium text-gray-900">Connexion requise</h3>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Vous devez être connecté pour laisser un commentaire. Veuillez vous
                                                connecter
                                                pour continuer.
                                            </p>
                                            <div class="mt-4">
                                                <a href="{{ route('login_page', ['redirect' => request()->url()]) }}"
                                                    class="bg-[#ee1a3b] text-white py-2 px-4 rounded-md hover:bg-opacity-90">
                                                    Se connecter
                                                </a>
                                                <button onclick="closeModal()"
                                                    class="ml-4 bg-black text-white py-2 px-4 rounded-md hover:bg-gray-700">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

        </main>

        @include('new_client_side.partials.video_month')
        @include('new_client_side.partials.footer')
    </div>

    <!-- Scripts
================================================== -->
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/common/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/common/swiper/js/swiper-bundle.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/yt1/init.js') }}"></script>


    <script>
        document.getElementById('commentForm').onsubmit = function(event) {
            event.preventDefault(); // Empêche l'envoi du formulaire par défaut
            @if (!Auth::check()) // Vérifie si l'utilisateur n'est pas connecté
                document.getElementById('loginModal').classList.remove('hidden'); // Affiche le modal
            @else
                this.submit(); // Soumet le formulaire si l'utilisateur est connecté
            @endif
        };

        function closeModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }
    </script>
    <br><br>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeEventListeners();
            initializeLikeButtons();
        });

        function initializeEventListeners() {
            // Gestion des boutons de réponse
            document.querySelectorAll('.reply-button').forEach(button => {
                if (!button.dataset.initialized) {
                    button.dataset.initialized = 'true';
                    button.addEventListener('click', handleReplyButtonClick);
                }
            });

            // Gestion des boutons d'annulation
            document.querySelectorAll('.cancel-reply-button').forEach(button => {
                if (!button.dataset.initialized) {
                    button.dataset.initialized = 'true';
                    button.addEventListener('click', handleCancelReply);
                }
            });

            // Gestion des boutons de soumission
            document.querySelectorAll('.submit-reply-button').forEach(button => {
                if (!button.dataset.initialized) {
                    button.dataset.initialized = 'true';
                    button.addEventListener('click', handleSubmitReply);
                }
            });
        }

        function initializeLikeButtons() {
            document.querySelectorAll('.like-button').forEach(button => {
                if (!button.dataset.initialized) {
                    button.dataset.initialized = 'true';
                    button.addEventListener('click', handleLikeClick);
                }
            });
        }

        function handleReplyButtonClick(event) {
            event.preventDefault();
            const commentId = this.dataset.commentId;

            // Cacher tous les autres formulaires
            document.querySelectorAll('.reply-form').forEach(form => {
                if (form.id !== `reply-form-${commentId}`) {
                    form.classList.add('hidden');
                }
            });

            const replyForm = document.getElementById(`reply-form-${commentId}`);
            if (replyForm) {
                replyForm.classList.toggle('hidden');
                if (!replyForm.classList.contains('hidden')) {
                    const textarea = replyForm.querySelector('textarea');
                    if (textarea) {
                        const parentName = this.closest('.flex-grow').querySelector('.text-sm.font-medium').textContent
                            .trim();
                        textarea.placeholder = `Répondre à @${parentName}...`;
                        textarea.focus();
                    }
                }
            }
        }

        function handleCancelReply(e) {
            e.preventDefault();
            const replyForm = this.closest('.reply-form');
            if (replyForm) {
                const textarea = replyForm.querySelector('textarea');
                if (textarea) {
                    textarea.value = '';
                }
                replyForm.classList.add('hidden');
            }
        }

        function handleSubmitReply() {
            const commentId = this.dataset.commentId;
            const replyForm = document.getElementById(`reply-form-${commentId}`);
            const content = replyForm.querySelector('textarea').value;
            const parentContainer = this.closest('.flex-grow');

            if (!content.trim()) {
                alert('Veuillez entrer un message avant de répondre.');
                return;
            }

            fetch(`/comment/${commentId}/reply`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        content: content,
                        parent_id: commentId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Trouver le bon conteneur de réponses
                        let repliesContainer;
                        if (parentContainer.querySelector('.replies')) {
                            repliesContainer = parentContainer.querySelector('.replies');
                        } else {
                            repliesContainer = document.createElement('div');
                            repliesContainer.className = 'replies space-y-4 ml-8 mt-4';
                            parentContainer.appendChild(repliesContainer);
                        }

                        const newReply = createReplyElement(data);
                        repliesContainer.insertAdjacentHTML('beforeend', newReply);

                        // Réinitialiser le formulaire
                        replyForm.querySelector('textarea').value = '';
                        replyForm.classList.add('hidden');

                        // Réinitialiser les événements
                        initializeEventListeners();
                        initializeLikeButtons();
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de l\'envoi de votre réponse.');
                });
        }

        function handleLikeClick() {
            const commentId = this.dataset.commentId;
            const likeCount = this.querySelector('.like-count');

            fetch(`/comment/${commentId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        likeCount.textContent = data.likes;
                        this.classList.toggle('text-[#ee1a3b]');
                    }
                })
                .catch(error => console.error('Erreur:', error));
        }

        function createReplyElement(data) {
            return `
                <div class="flex gap-4 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg flex">
                    <img src="${data.user.profile_image || '/mygp-images/logo-gp.png'}" alt="Avatar" class="w-8 h-8 rounded-full">
                    <div class="flex-grow">
                        <div class="flex items-baseline gap-2 mb-1">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">${data.user.name}</span>
                            <span class="text-xs text-gray-500">${data.created_at}</span>
                        </div>
                        <p class="text-sm text-gray-800 dark:text-gray-200 mb-2">${data.content}</p>
                        <div class="flex items-center gap-4">
                            <button class="like-button flex items-center gap-1 text-sm text-gray-600 hover:text-gray-900" data-comment-id="${data.id}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                </svg>
                                <span class="like-count">0</span>
                            </button>
                            <a href="#" class="reply-button text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900" data-comment-id="${data.id}">
                                RÉPONDRE
                            </a>
                        </div>
                        <!-- Formulaire de réponse imbriqué -->
                        <div class="reply-form hidden mt-4" id="reply-form-${data.id}">
                            <div class="flex gap-4">
                                <img src="/mygp-images/logo-gp.png" alt="Avatar" class="w-8 h-8 rounded-full">
                                <div class="flex-grow">
                                    <textarea class="form-control w-full border rounded-lg p-3 text-sm resize-none focus:ring-0 focus:ring-[#ee1a3b] focus:border-[#ee1a3b] focus:outline-none" rows="2" placeholder="Ajoutez une réponse..."></textarea>
                                    <div class="flex justify-end gap-2 mt-2">
                                        <button class="cancel-reply-button px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Annuler</button>
                                        <button class="submit-reply-button px-4 py-2 text-sm font-medium text-white bg-[#ee1a3b] rounded-lg hover:bg-red-700" data-comment-id="${data.id}">Répondre</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    </script>



    <script>
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.dataset.commentId;

                fetch(`/comment/${commentId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.liked) {
                            button.classList.add(
                                'text-red-500'); // Change la couleur pour indiquer le like
                        } else {
                            button.classList.remove(
                                'text-red-500'); // Réinitialise la couleur si annulé
                        }
                        button.querySelector('.like-count').innerText = data.like_count;
                    })
                    .catch(error => console.error('Erreur:', error));
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="{{ asset('assets/backoffice/js/core/jquery-3.7.1.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playButton = document.getElementById('playButton');
            const videoPlayer = document.getElementById('videoPlayer');
            const modal = document.getElementById('premiumModal');
            const closeModalX = document.getElementById('closeModalX');
            const payVideoButton = document.getElementById('payVideoButton');
            const subscribeButton = document.getElementById('subscribeButton');

            // Variable pour garder la trace du délai de 10 secondes
            let modalTimeout;

            const hoverVideo = () => {
                videoPlayer.src =
                    "https://www.youtube.com/embed/{{ $video->youtube_id ?? 'default_video_id' }}?autoplay=1&controls=1";
                videoPlayer.classList.remove('hidden');
                clearTimeout(modalTimeout);
                modalTimeout = setTimeout(() => {
                    stopVideoAndShowModal();
                }, 10000); // Affiche le modal après 10 secondes
            };

            const stopVideoAndShowModal = () => {
                videoPlayer.src = ""; // Arrête la vidéo
                showModal(); // Affiche le modal
            };

            if (playButton && videoPlayer && modal && closeModalX && payVideoButton && subscribeButton) {
                // Lancer la vidéo automatiquement sans survol
                hoverVideo();

                closeModalX.addEventListener('click', hideModal);

                payVideoButton.addEventListener('click', () => {
                    console.log("L'utilisateur souhaite payer pour la vidéo");
                });

                subscribeButton.addEventListener('click', () => {
                    console.log("L'utilisateur souhaite s'abonner");
                });
            } else {
                console.error('Certains éléments nécessaires n\'ont pas été trouvés dans le DOM.');
            }
        });

        function showModal() {
            const modal = document.getElementById('premiumModal');
            modal.classList.remove('hidden');
            document.body.classList.add('no-scroll'); // Désactiver le défilement

            gsap.fromTo(modal.firstElementChild, {
                opacity: 0,
                scale: 0.8
            }, {
                opacity: 1,
                scale: 1,
                duration: 0.5,
                ease: "back.out(1.7)"
            });
        }

        function hideModal() {
            const modal = document.getElementById('premiumModal');
            gsap.to(modal.firstElementChild, {
                opacity: 0,
                scale: 0.8,
                duration: 0.3,
                ease: "power2.in",
                onComplete: () => {
                    modal.classList.add('hidden');
                    document.body.classList.remove('no-scroll'); // Réactiver le défilement
                }
            });
        }


        // Color Switcher
        var themeToggleBtn = document.getElementById('theme-toggle');

        // Change the toggle state based on previous change
        if (localStorage.getItem('yt1-color-theme') === 'dark') {
            themeToggleBtn.checked = true;
            document.documentElement.classList.add('dark');
        } else {
            themeToggleBtn.checked = false;
            document.documentElement.classList.remove('dark');
        }

        themeToggleBtn.addEventListener('change', function() {

            // if set via local storage previously
            if (localStorage.getItem('yt1-color-scheme')) {
                if (localStorage.getItem('yt1-color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('yt1-color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('yt1-color-theme', 'light');
                }
                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('yt1-color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('yt1-color-theme', 'dark');
                }
            }
        });


        // Assurez-vous que Material Icons est inclus dans votre projet via un CDN
        const loadGoogleIcons = () => {
            const link = document.createElement('link');
            link.href = "https://fonts.googleapis.com/icon?family=Material+Icons";
            link.rel = "stylesheet";
            document.head.appendChild(link);
        };

        loadGoogleIcons();

        // Sélection des éléments
        const mobileMenuToggle = document.querySelector('.js-menu-toggle');
        const siteWrapper = document.querySelector('.js-site-wrapper');
        const mobileMenu = document.querySelector('.js-mobile-menu');

        // Création des icônes dynamiquement
        const iconOpen = document.createElement('span');
        iconOpen.classList.add('material-icons', 'visible'); // Par défaut, visible
        iconOpen.textContent = 'menu'; // Icône de menu burger

        const iconClose = document.createElement('span');
        iconClose.classList.add('material-icons'); // Par défaut, cachée
        iconClose.textContent = 'close'; // Icône de fermeture

        // Ajout des icônes dans le bouton
        mobileMenuToggle.appendChild(iconOpen);
        mobileMenuToggle.appendChild(iconClose);

        // Toggle pour afficher le menu et changer les icônes
        mobileMenuToggle.onclick = () => {
            mobileMenuToggle.classList.toggle('active');

            if (mobileMenuToggle.classList.contains('active')) {
                siteWrapper.classList.add('overflow-y-hidden');
                iconOpen.classList.remove('visible'); // Cache l'icône menu
                iconClose.classList.add('visible'); // Affiche l'icône close
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
            } else {
                siteWrapper.classList.remove('overflow-y-hidden');
                iconOpen.classList.add('visible'); // Affiche l'icône menu
                iconClose.classList.remove('visible'); // Cache l'icône close
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
            }
        };


        function toggleLike(videoId) {
            fetch(`/videos/${videoId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    const likeButton = document.getElementById(`like-button-${videoId}`);
                    const likeCount = document.getElementById(`like-count-${videoId}`);

                    if (likeCount) {
                        likeCount.textContent = data.likes_count;
                    }

                    if (data.status === 'liked') {
                        likeButton.classList.add('liked');
                    } else {
                        likeButton.classList.remove('liked');
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        setTimeout(() => {
            $.ajax({
                type: "POST",
                url: "{{ route('videos.incrementViews', ['videoId' => $video->id]) }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {}
            });
        }, 20000);
    </script>
</body>

</html>
