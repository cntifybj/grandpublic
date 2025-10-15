<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Grand Public DashBoard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Grand Public DashBoard">
    <meta name="keywords" content="Grand Public DashBoard">
    <meta name="author" content="Max Magic">

    <!-- Favicons
  ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <!-- [Font] Family -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/backoffice/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/gp_dasboard.min.css') }}">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/backoffice/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
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

</head>

<body class="bg-light">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('assets/backoffice/img/gp_dasboard/grandpublic_wall.jpg')}}'); background-size: cover;">
        <div class="bg-white p-4 rounded shadow" style="width: 350px;">

            <div class="text-center">
                <img src="{{ asset('assets/favicon/LogoGP-80x80.png') }}" alt="img">
            </div>

            <h3 class="text-center">Connexion</h3>
            <form action="{{ route('backoffice.auth.do_login') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email Address"
                        name="email">
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password"
                            placeholder="Entrez son mot de passe">
                        <button class="btn btn-outline-secondary togglePassword" type="button">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>


                @error('login')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="d-flex mt-1 justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input input-primary" type="checkbox" id="remember" name="remember"
                            checked="">
                        <label class="form-check-label text-muted" for="remember">Se souvenir de
                            moi
                            ?</label>
                    </div>
                    <p>
                        <a class="text-secondary f-w-400 mb-0" href="#">Mot de passe oublié?</a>
                    </p>

                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary shadow px-sm-4">Connexion</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/backoffice/js/core/jquery-3.7.1.min.js') }}"></script>
    <script>
        // Toggle du password
        $('.togglePassword').on('click', function() {
            const passwordInput = $(this).parent().find('input[name="password"]')

            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password'
            passwordInput.attr('type', type)

            // Changer l'icône œil ouvert/fermé
            $(this).find('i').toggleClass('fa-eye fa-eye-slash')
        })
    </script>
</body>

</html>
