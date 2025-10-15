<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification d'email</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-red': '#ee1a3b',
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-white rounded-lg shadow-xl p-8 mt-10">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <img src="https://grandpublic.online/mygp-images/logo-gp.png" alt="Logo grand public"
                    class="h-11 w-11 mx-auto mb-4">
                <h1 class="text-2xl font-bold text-gray-800">Vérifiez votre adresse email</h1>
            </div>

            <!-- Content -->
            <div class="text-center mb-8">
                <p class="text-gray-600 mb-6">
                    Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en
                    cliquant sur le bouton ci-dessous ? Si vous n'avez pas créé de compte, vous pouvez ignorer cet
                    email.
                </p>
            </div>

            <!-- Button -->
            <div class="text-center mb-8">
                <a href="<?php echo e(route('verify-email', ['token' => $token])); ?>"
                    class="inline-block px-8 py-4 bg-custom-red text-white font-semibold rounded-lg shadow-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-custom-red focus:ring-offset-2 transition-all duration-300"
                    target="_blank">
                    Vérifiez votre adresse email
                </a>
            </div>

        </div>

        <!-- Additional Info -->
        <div class="text-center mt-8 text-sm text-gray-500">
            <p>© 2024 Max Magic. Tous droits réservés.</p>

        </div>
    </div>
</body>

</html>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/mails/verify-email.blade.php ENDPATH**/ ?>