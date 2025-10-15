@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/fileinput.min.css') }}" />
@endsection

@section('page_content')
    <div class="container px-5">
        <h5 class="text-center mb-5 h3">Formulaire de Création</h5>

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création de publicités sur la plateforme Grand Public.
        </p>

        <form method="POST" action="{{ route('backoffice.advisories.store') }}" id="addAdvisoryForm"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3 custom-form-input">
                <label for="titleCreate" class="form-label">Titre</label>
                <input type="text" id="titleCreate" class="form-control" name="title" placeholder="Entrez son titre">
                <div class="alert alert-danger" error-input="title"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="isVideo" class="form-label">Vidéo ou Image</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isVideo" id="isVideo_1Create" value="1" />
                    <label class="form-check-label" for="isVideo_1Create">Vidéo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isVideo" id="isVideo_0Create" checked=""
                        value="0" />
                    <label class="form-check-label" for="isVideo_0Create">Image</label>
                </div>

                <div class="alert alert-danger" error-input="isVideo"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="positionCreate">Position</label>
                <select class="form-select"id="positionCreate" name="position">
                    <option selected value="">Sélectionner la position de la publicité</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->value }}" in-video="{{ $position->inVideo() }}">
                            {{ $position->label() }}
                        </option>
                    @endforeach
                </select>
                <div class="alert alert-danger" error-input="position"></div>
            </div>

            <div class="mb-3 custom-form-input">

                <label for="adFileCreate" class="form-label">Fichier Publicitaire</label>

                <input id="adFileCreate" name="file" type="file" class="file" data-show-preview="false"
                    data-msg-placeholder="Sélectionner le fichier d'aperçu...">

                <div class="alert alert-danger" error-input="file"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="visible" class="form-label">Visible</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_1Create" value="1" />
                    <label class="form-check-label" for="visible_1Create">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_0Create" checked=""
                        value="0" />
                    <label class="form-check-label" for="visible_0Create">Non</label>
                </div>

                <div class="alert alert-danger" error-input="visible"></div>
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
        </form>

    </div>
@endsection

@section('page_scripts')
    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


    <!-- Bootstrap File Input JS -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js') }}"></script>


    <!-- JQuery Validate Plugin -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <script>
        $(function() {

            // Reset du formulaire
            resetFormAdd()

            // Ajout de la méthode de validation des extensions
            jQuery.validator.addMethod(
                "extension",
                function(value, element, param) {
                    if (!value) return true; // Pas de fichier, validation acceptée si non obligatoire
                    const extensions = param.split(",");
                    const fileExtension = value.split(".").pop().toLowerCase();
                    return extensions.includes(fileExtension);
                },
                "Le fichier doit avoir une extension valide ({0})."
            );
            // Validation client du formulaire d'ajout
            $("#addAdvisoryForm").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    position: {
                        required: true
                    },
                    isVideo: {
                        required: true
                    },
                    file: {
                        required: true,
                        extension: "jpg,jpeg,png,mp4,avi,mkv"
                    },
                    visible: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "Le titre est obligatoire.",
                        minlength: "Le titre doit contenir au moins 3 caractères.",
                        maxlength: "Le titre ne doit pas dépasser 255 caractères."
                    },
                    position: {
                        required: "Veuillez sélectionner une position pour la publicité."
                    },
                    isVideo: {
                        required: "Veuillez indiquer si le fichier est une vidéo ou une image."
                    },
                    file: {
                        required: "Veuillez sélectionner un fichier publicitaire.",
                        extension: "Le fichier doit être une image (jpg, jpeg, png) ou une vidéo (mp4, avi, mkv)."
                    },
                    visible: {
                        required: "Veuillez indiquer si la publicité est visible."
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault()
                    $(form).find('div.alert').addClass('d-none');

                    const formData = new FormData(form);

                    $.ajax({
                        url: $(form).attr('action'), // Endpoint pour ajouter les données
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            showNotif('success', '<strong>Succès</strong>',
                                'fab fa-youtube', response.message);
                            // Reset du form d'ajout
                            resetFormAdd();
                        },
                        error: function(response) {
                            for (const [key, value] of Object.entries(response.responseJSON[
                                    'errors'])) {
                                $(`div[error-input="${key}"]`).html(value.join('<br>'))
                                    .removeClass('d-none');
                            }
                        }
                    });
                },
                highlight: function(element) {
                    $(element).closest('.custom-form-input').find('div.alert').removeClass('d-none');
                },
                unhighlight: function(element) {
                    $(element).closest('.custom-form-input').find('div.alert').addClass('d-none');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.custom-form-input').find('div.alert').text(error.text());
                }
            });

            // Afficher ou masquer les options "position" en fonction du choix vidéo ou image
            $('input[name="isVideo"]').on('change', function() {
                const isVideo = $(this).val() === "1";
                $('#positionCreate option').each(function() {
                    const inVideo = $(this).attr('in-video') === "1";
                    if (isVideo && !inVideo && $(this).val() != '') {
                        $(this).hide(); // Masquer les options non vidéo
                    } else if (!isVideo && inVideo) {
                        $(this).hide(); // Masquer les options spécifiques à la vidéo
                    } else {
                        $(this).show(); // Afficher les options pertinentes
                    }
                });
                $('#positionCreate').val(''); // Réinitialiser la sélection
            });

        })



        // fonction générique pour gérer les notifications
        function showNotif(type = 'success', title = '<strong>Success!</strong>', icon = 'fa fa-bell', message =
            'Your password has been successfully changed.') {

            $.notify({
                title,
                icon,
                message
            }, {
                type,
                allow_dismiss: true,
                delay: 3000,
                placement: {
                    from: "top",
                    align: "left"
                },
                animate: {
                    enter: 'animated fadeInLeft',
                    exit: 'animated fadeOutLeft'
                }
            })

        }

        function resetFormAdd() {
            $('#addAdvisoryForm div.alert').addClass('d-none')
            $('#addAdvisoryForm').trigger('reset')
        }
    </script>
@endsection
