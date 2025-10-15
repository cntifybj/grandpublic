<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Grand Public - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons
  ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/backoffice/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:300,400,500,600,700", "Lato:300,400,500,600,700", "Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{ asset('assets/backoffice/css/fonts.min.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/gp_dasboard.min.css') }}">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    @yield('page_styles')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('backoffice.partials.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    @include('backoffice.partials.header-mobile')
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('backoffice.partials.navbar', ['nb_notifs' => 22])
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    @yield('page_content')
                </div>
            </div>

        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backoffice/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- GP Dashboard JS -->
    <script src="{{ asset('assets/backoffice/js/gp_dasboard.min.js') }}"></script>


    @yield('page_scripts')

</body>

</html>
