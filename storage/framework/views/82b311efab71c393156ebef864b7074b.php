<!DOCTYPE html>
<html lang="fr">

<head>

    <title>GRAND PUBLIC - <?php echo $__env->yieldContent('pageTitle', 'Partageons les Grands Moments'); ?></title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link rel="preload" href="styles.css" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="script.js" as="script">
    <link rel="preload" href="font.woff2" as="font">

    <?php echo $__env->yieldContent('head'); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5/5hH8mH8W4Ke/t30wbUdy9n8M1cH/rfR61d3y5AWT4Y8OXx+V3Tp0KiZECYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="/mygp-images/gp-miniLOGO.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-CvZx5V28V6UtvHD2zAsMRclg9Bai8OckN7oGEyo22tV2LyD6Q5uOXCBLkq6wcn2Zp2GxHvBwwi20QNGFptE2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="assets/vendors/common/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendors/common/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="<?php echo e(asset('assets/css/yt1/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/my-gp.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-zsP0/L3kc5mMF0ESqN0PcdY1mfYhT1Zryr24E+OB5Q7l+QiFybS2TVB9lqZ1diK8F+0EmC5f4RY6clSCwi9uqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php echo $__env->yieldContent('page_css'); ?>


</head>

<body
    class="overflow-x-hidden antialiased tracking-tight text-gray-500 text-base h-full bg-white dark:bg-gray-900">

    <style>
        html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        body {
            font-family: 'Gotham';
            font-weight: 300;
            font-style: normal;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 100vw;
        }

        /* Pour les images responsives */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Pour les conteneurs */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        input,
        textarea,
        select {
            font-size: 16px;
            overflow-x: hidden;
        }

        /**
.code-block {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    border-left: 4px solid #007bff;
    margin: 10px 0;
}

h3 {
    color: #2c3e50;
    margin-top: 30px;
}**/
        .custom-image-popup {
            padding: 5px !important;
            /* Ajoute un contour blanc */
            background: white;
            /* Fond blanc pour le contour */
            border-radius: 5px;
            /* Coins arrondis */
            max-width: 100%;
            /* Limite la largeur à 100% de l'écran */
            max-height: 100%;
            /* Limite la hauteur à 100% de l'écran */
            overflow: hidden;
            /* Empêche les débordements */
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);  Légère ombre */
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .custom-image-popup img {
            width: 100%;
            /* L'image occupe tout l'espace du popup */
            height: 100%;
            /* Respecte le ratio de l'image */
            display: block;
            transform: translateY(-8px);


        }

        body.no-scroll {
            position: fixed;
            /* Fixe le body */
            width: 100%;
            /* Conserve la largeur */
            overflow: hidden;
            /* Empêche le défilement */
        }
    </style>

    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function getCurrentTimeInMinutes() {
                return Math.floor(Date.now() / 60000);
            }

            function getNextPopupIndex(currentIndex) {
                return (currentIndex + 1) % images.length; // Boucle cyclique entre 0 et images.length - 1
            }

            function shouldShowNextPopup() {
                const lastPopupTime = localStorage.getItem('lastPopupTime');
                const currentTime = getCurrentTimeInMinutes();

                if (!lastPopupTime) return true; // Si aucun popup n'a encore été affiché
                return (currentTime - parseInt(lastPopupTime)) >= 15; // Attendre strictement 15 minutes
            }

            function showPopup(imageIndex) {
                document.body.classList.add('no-scroll');

                Swal.fire({
                    imageUrl: images[imageIndex],
                    imageAlt: 'Image promotionnelle',
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'custom-image-popup'
                    },
                    didOpen: () => {
                        const popupElement = Swal.getPopup();
                        popupElement.style.padding = '0';

                        // Marquer le popup comme affiché
                        localStorage.setItem('lastPopupTime', getCurrentTimeInMinutes().toString());
                        localStorage.setItem('currentPopupIndex', imageIndex.toString());
                    },
                    willClose: () => {
                        document.body.classList.remove('no-scroll');
                    }
                });
            }

            function checkAndShowPopup() {
                const currentIndex = parseInt(localStorage.getItem('currentPopupIndex') || '-1');
                const nextIndex = getNextPopupIndex(currentIndex);

                // Vérifier si on peut afficher le popup suivant
                if (shouldShowNextPopup()) {
                    showPopup(nextIndex);
                }
            }

            const images = <?php echo json_encode($popUpImagesUrl); ?>;

            if (images.length != 0)
                document.addEventListener('DOMContentLoaded', function() {
                    // Vérifier 2 secondes après le chargement initial
                    setTimeout(checkAndShowPopup, 2000);

                    // Vérifier toutes les 60 secondes
                    setInterval(checkAndShowPopup, 60000);
                });
        </script>

    </main>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('assets/my-gp.js')); ?>"></script>

    <!-- Vendors JS -->
    <script src="assets/vendors/common/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendors/common/swiper/js/swiper-bundle.min.js"></script>

    <!-- Template JS -->
    <script src="assets/js/common.js"></script>
    <script src="assets/js/yt1/init.js"></script>

    <?php echo $__env->yieldContent('page_js'); ?>
</body>

</html>
<?php /**PATH D:\projects\grandpublic\resources\views/layouts/app.blade.php ENDPATH**/ ?>