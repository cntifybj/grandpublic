<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Grand Public - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicons
  ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/favicon/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('assets/favicon/site.webmanifest')); ?>">

    <!-- Fonts and icons -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/webfont/webfont.min.js')); ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:300,400,500,600,700", "Lato:300,400,500,600,700", "Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["<?php echo e(asset('assets/backoffice/css/fonts.min.css')); ?>"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/plugins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/gp_dasboard.min.css')); ?>">

    

    <?php echo $__env->yieldContent('page_styles'); ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php echo $__env->make('backoffice.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <?php echo $__env->make('backoffice.partials.header-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php echo $__env->make('backoffice.partials.navbar', ['nb_notifs' => 22], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <?php echo $__env->yieldContent('page_content'); ?>
                </div>
            </div>

        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('assets/backoffice/js/core/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/core/bootstrap.min.js')); ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>

    <!-- GP Dashboard JS -->
    <script src="<?php echo e(asset('assets/backoffice/js/gp_dasboard.min.js')); ?>"></script>


    <?php echo $__env->yieldContent('page_scripts'); ?>

</body>

</html>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/layouts/main.blade.php ENDPATH**/ ?>