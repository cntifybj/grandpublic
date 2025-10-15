<?php $__env->startSection('page_styles'); ?>
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/fileinput.min.css')); ?>" />

    <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container mt-4">
        <div class="row">
            <?php $__currentLoopData = $advisories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advisory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card" advisory-id="<?php echo e($advisory->id); ?>">
                        <!-- Affichage de l'image ou de la vidéo -->
                        <?php if($advisory->isVideo): ?>
                            <video class="card-img-top" controls>
                                <source src="<?php echo e(Storage::url($advisory->file)); ?>" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        <?php else: ?>
                            <img src="<?php echo e(Storage::url($advisory->file)); ?>" class="card-img-top"
                                alt="Advisory #<?php echo e($advisory->id); ?>">
                        <?php endif; ?>

                        <div class="card-body">
                            <!-- Infos principales -->
                            <p class="fs-6 mb-1 text-info">
                                Titre : <span class="advisory-title text-danger"><?php echo e($advisory->title); ?></span><br>
                                Position : <span
                                    class="advisory-position text-danger"><span class="d-none"><?php echo e($advisory->position); ?></span><?php echo e(App\Enums\AdPosition::from($advisory->position)->label()); ?></span><br>
                                Statut de visibilité :
                                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'ms-2 badge rounded-pill visibility-status' => true,
                                    'text-bg-success' => $advisory->visible,
                                    'text-bg-warning' => !$advisory->visible,
                                ]); ?>">
                                    <?php if($advisory->visible): ?>
                                        Visible
                                    <?php else: ?>
                                        Masqué
                                    <?php endif; ?>
                                </span>
                            </p>
                            <!-- Boutons -->
                            <button type="button" class="btn btn-dark btn-rounded btn-sm" data-bs-toggle="offcanvas"
                                data-bs-target="#editAdvisory" aria-controls="editAdvisory">Modifier</button>
                            <button type="button" class="btn btn-danger btn-rounded btn-sm delete-ad">Supprimer</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Offcanvas d'édition -->
        <?php echo $__env->make('backoffice.pages.advisory.formUpdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('backoffice.pages.advisory.modalsConfirmDelete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
    <!-- Bootstrap Notify -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

    <!-- Bootstrap File Input JS -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js')); ?>"></script>

    <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>

    <!-- JQuery Validate Plugin -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js')); ?>"></script>

    <script>
        //#region Configuration générale

        const CURRENTURL = window.location.href
        let advisoryId

        let advisory_card = null


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


        function loadPreview(fileUrl, isVideo) {
            const previewImage = $('#previewImage');
            const previewVideo = videojs('previewVideo'); // Initialiser l'instance vidéo de video.js

            if (isVideo) {
                let extension = 'mp4'
                if (fileUrl.split(".").pop().toLowerCase() != 'mp4') extension = 'x-matroska'


                // Afficher la vidéo
                previewImage.addClass('d-none');

                // Changer la source vidéo avec l'API de video.js
                previewVideo.src({
                    type: `video/${extension}`,
                    src: fileUrl
                });
                previewVideo.removeClass('d-none');
            } else {
                // Afficher l'image
                previewVideo.addClass('d-none');
                previewImage.removeClass('d-none');
                previewImage.attr('src', fileUrl);
            }
        }
        //#endregion



        //#region Form d'édition

        // Pré-remplir les champs
        $('button[data-bs-target="#editAdvisory"]').on('click', function() {
            // Réinitialiser le formulaire
            $('#editAdvisoryForm').trigger('reset');
            $('#editAdvisoryForm div.alert').addClass('d-none');

            // Récupérer les données de la carte
            const advisoryCard = $(this).closest('div.card');
            advisoryId = advisoryCard.attr('advisory-id');
            const title = advisoryCard.find('.advisory-title').text().trim();
            const position = advisoryCard.find('.advisory-position span.d-none').text().trim();
            const isVisible = advisoryCard.find('.visibility-status').hasClass('text-bg-success');

            const isVideo = advisoryCard.find('video').length > 0;
            const fileUrl = isVideo ?
                advisoryCard.find('video source').attr('src') :
                advisoryCard.find('img').attr('src');

            // Remplir les champs
            $('#editAdvisoryForm input[name="title"]').val(title);
            $('#editAdvisoryForm select[name="position"]').val(position);
            $('#editAdvisoryForm input[name="visible"][value="' + (isVisible ? '1' : '0') + '"]').prop('checked',
                true);
            $('#editAdvisoryForm input[name="isVideo"][value="' + (isVideo ? '1' : '0') + '"]').prop('checked',
                true);

            // Charger l'aperçu dans le conteneur de prévisualisation
            loadPreview(fileUrl, isVideo);
        });

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

        // Validation client du formulaire d'édition
        $("#editAdvisoryForm").validate({
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
                    extension: "Le fichier doit être une image (jpg, jpeg, png) ou une vidéo (mp4, avi, mkv)."
                },
                visible: {
                    required: "Veuillez indiquer si la publicité est visible."
                }
            },
            submitHandler: function(form) {
                $(form).find('div.alert').addClass('d-none');

                const formData = new FormData(form);

                $.ajax({
                    url: `${CURRENTURL}/${advisoryId}`, // Endpoint pour ajouter les données
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

        //#endregion


        let advisoryIdToDelete = null;
        let advisoryCardToDelete = null;

        // Quand l'utilisateur clique sur "Supprimer"
        $(document).on('click', '.delete-ad', function() {
            const advisoryCard = $(this).closest('.card');
            advisoryIdToDelete = advisoryCard.attr('advisory-id');
            advisoryCardToDelete = advisoryCard;

            if (!advisoryIdToDelete) {
                showAlertModal('Erreur', 'ID de la publicité introuvable.');
                return;
            }

            // Ouvre le modal de confirmation
            $('#deleteConfirmationModal').modal('show');
        });

        // Quand l'utilisateur confirme la suppression
        $('#confirmDeleteButton').on('click', function() {
            if (!advisoryIdToDelete) {
                showAlertModal('Erreur', 'Impossible de trouver la publicité à supprimer.');
                return;
            }

            const deleteUrl = `${CURRENTURL}/${advisoryIdToDelete}`; // URL RESTful de suppression

            // Requête AJAX pour supprimer
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Jeton CSRF
                },
                success: function(response) {
                    // Suppression réussie
                    $('#deleteConfirmationModal').modal('hide');
                    showAlertModal('Succès', response.message ||
                        'La publicité a été supprimée avec succès.');
                    advisoryCardToDelete.remove(); // Retire la carte de l'interface
                },
                error: function(xhr) {
                    // Gestion des erreurs
                    $('#deleteConfirmationModal').modal('hide');
                    if (xhr.status === 500) {
                        showAlertModal('Erreur',
                            'Une erreur interne est survenue. Veuillez réessayer.');
                    } else if (xhr.status === 422) {
                        showAlertModal('Erreur', 'Suppression impossible. Données invalides.');
                    } else {
                        showAlertModal('Erreur', 'Impossible de supprimer cette publicité.');
                    }
                },
            });
        });

        // Fonction pour afficher les modals d'alerte
        function showAlertModal(title, message) {
            $('#alertModalLabel').text(title);
            $('#alertModalMessage').text(message);
            $('#alertModal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/advisory/index.blade.php ENDPATH**/ ?>